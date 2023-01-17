<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transactions = Transaction::where('sender_id', Auth::id())->with('user')->latest()->take(5)->get();
        Log::info($transactions);
        return view('transaction-history', ['transactions' =>  $transactions]);
    }
}
