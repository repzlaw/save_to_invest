<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\WithdrawalBank;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\ResolveAccountRequest;
use App\Http\Requests\SaveBankDetailRequest;

class BankController extends Controller
{
    /**
     * connecting to paystack API to get all banks
     */
    public function getBanks()
    {
        $pay_stack_secret = Configuration::where('key','pay_stack_secret')->first();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$pay_stack_secret->value,
            'Cache-Control' => 'no-cache'
        ])->get("https://api.paystack.co/bank");

        return $response;
    }

    //get withdrawal bank details
    public function getWithdrawalBank(Request $request)
    {
        // dd($request->user_id);
        $details = WithdrawalBank::where('user_id',$request->user_id)->first();

        return $details;
    }

    //resolve account number
    public function resolveAccount(ResolveAccountRequest $request)
    {
        $bankDetail = explode(", ", $request->input('bank'));
        $pay_stack_secret = Configuration::where('key','pay_stack_secret')->first();

        /////////////connecting to paystack API to validate account number
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$pay_stack_secret->value,
            'Cache-Control' => 'no-cache'
        ])->get("https://api.paystack.co/bank/resolve?account_number=" . $request->input('account_number') . "&bank_code=" . $bankDetail[0]);

        return $response;
    }

    //save withdrawal bank
    public function saveWithdrawalBank(SaveBankDetailRequest $request)
    {
        $user_id = Auth::id();
        $password = Auth::user()->password;
        $bankDetail = explode(", ", $request->input('bank'));
        
        if (!Hash::check(request('password'), $password)) {
            return response()->json(['message'=>'incorrect password'], 422);
        }
        // dd($request->all());

        $save = WithdrawalBank::firstOrNew([
                    'user_id'=>$user_id
                ]);
                $save->account_name = $request->account_name;
                $save->bank_code = $bankDetail[0];
                $save->bank_name = $bankDetail[1];
                $save->account_number = $request->account_number;

        $save->save();

        return true;
    }

}
