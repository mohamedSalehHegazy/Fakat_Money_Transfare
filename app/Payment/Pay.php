<?php
namespace App\Payment;
use Illuminate\Support\Facades\Auth;
use DB;
class Pay{

    public function Send($dest_Id,$amount){
       
        return [
            'dest_Id'=>$dest_Id,
            'amount'=>$amount,
        ];
    }

}