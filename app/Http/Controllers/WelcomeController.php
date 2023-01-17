<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Illuminate\Support\Facades\DB;



class WelcomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $users = User::select("id", "lastname", "firstname")->with('accounts')->get();
        return view('welcome', ['users'=> $users]);
    }

    /**
     *   Make the exchange in the currency of the recipient
     *   When its currency is different from that of the issuer.
     *   Debit the receiver's account and credit the sender's account
     *   Validate update both accounts
     */

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), [
                'receiver_id' => 'required',
                'amount' => 'required'
            ]);

            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()->all()], 422);
            }

            $userId = Auth::id();

            $input = $request->all();
            Log::info($input);

            $currentAccount = Account::where('user_id', $userId)->first();

            $receiverAccount = Account::where('user_id', $input['receiver_id'])->first();

            $receiverAccount->amount += Currency::convert()->from($input['currency'])->to($receiverAccount->currency)->amount($input['amount'])->get();

            $receiverAccount->save();


            if($currentAccount->amount > $input['amount'])
            {
                $transaction = Transaction::create([
                    'sender_id' => $userId,
                    'receiver_id' => $input['receiver_id'],
                    'amount' => $input['amount'],
                    'currency' => $input['currency'],
                ]);

                $currentAccount->amount -=  $input['amount'];
                $currentAccount->save();

                DB::commit();

                return response()->json([
                    "success" => true,
                    "message" => "Transaction saved",
                    "data" => $transaction,
                    "code" => 200
                ], 200);
            }
            else{log::info("Yes");
                return response()->json([
                    "success" => false,
                    "message" => "Transaction not saved",
                    "code" => 406
                ], 406);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e);
            $response = ["message" => 'Error occured', 'success'=> false, 'errors'=> $e, 'code'=> 500];
            return response()->json($response, 500);
        }
    }

}
