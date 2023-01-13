<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'receiver_id' => ['required'],
            'receiver' => ['required'],
            'amount' => ['required', 'decimal'],
        ]);
    }


    public function store(Request $request)
    {
       Log::info($request->all());
    }
}
