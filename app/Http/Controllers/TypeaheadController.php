<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Log;


class TypeaheadController extends Controller
{
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = User::select("id", "lastname", "firstname")->where('lastname', 'LIKE', '%'. $query. '%')->orWhere('firstname', 'LIKE', '%'. $query. '%')->with('accounts')->get();

          $receivers = array();
          foreach($filterResult as $receiver)
          {
            $receivers['name'][] = $receiver->lastname. ' '. $receiver->firstname;
            $receivers['id'][] = $receiver->id;
            $receivers['currency'][] = $receiver->accounts[0]->currency;
          }

          return response()->json($receivers);
    }
}
