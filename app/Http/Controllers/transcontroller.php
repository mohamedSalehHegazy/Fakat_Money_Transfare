<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class transcontroller extends Controller
{
    
    public function show(Request $request)
    {
        $source_ID = auth()->user()->id;
        $sentTrans=DB::select('SELECT * FROM transactions WHERE source_id =?',[$source_ID]);
        $receivedTrans=DB::select('SELECT * FROM transactions WHERE dest_id =?',[$source_ID]);
        $transactions = array($sentTrans,$receivedTrans);
        // dd($transactions);
         return view('pages.Transactions',['transactions'=>$transactions]);
        //  table('transactions')->where('source_id'or'dest_id', $source_ID);
     
    }
}

        