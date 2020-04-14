<?php

namespace App\Http\Controllers;
// use App\Payment\Pay;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class payControl extends Controller
{


    public function store(Request $request)
    {
        $source_ID = auth()->user()->id;
        $source_Balance = auth()->user()->balance;
        $request->validate(
            [
            'dest_Id'=>'required',
            'amount'=>'required',
            ]);
         $dest_Id =$request->except(['_token']);
         $dest_Id=$request['dest_Id'];
         
         $dest_Balance = DB::table('users')->where('id',$dest_Id)->value('balance');
         
         $amount =$request->except(['_token']);
         $amount=$request['amount'];
        $flag=false;
         $all_ID = DB::table('users')->pluck('id');
         foreach($all_ID as $user_ID){
            if($dest_Id==$user_ID){
            $flag=true;
            break;
            }
         }
        
            if(($source_ID!=$dest_Id)&&($source_Balance >= $amount)&&($flag==true)){
                $source_Balance =  $source_Balance - $amount;
                $dest_Balance =  $dest_Balance + $amount;
                DB::table('transactions')->insert(
                    ['source_ID' => $source_ID, 'dest_Id' => $dest_Id, 'amount' => $amount]
                );
                DB::table('users')
                ->where('id', $source_ID)
                ->update(['balance' => $source_Balance] );
                DB::table('users')
                ->where('id', $dest_Id)
                ->update(['balance' => $dest_Balance] );
                return back()->with('success','Money Has Been Sent');
            
        }
        else{
            return back()->with('faild','You Do Not Have Enough Money Or Wrong ID');
        }
      
        
        
    }
}
