<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class UsersGetRequestController extends Controller
{
    // PURCHASE PRODUCT FUNCTION
    public function PurchaseProduct(){
       
        return view('components.sections',[
            'purchase_product' => true,
            'product' => DB::table('products')->where('id',request()->input('id'))->first()
        ]);
    }
    // PURCHASE PRODUCT CONFIRM
    public function PurchaseProductConfirm(){
         if(DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->exists()){
            return response()->json([
                'message' => 'You already have an active asset,you can only purchase one asset at a time',
                'status' => 'error'
                ]);
        }
        $product=DB::table('products')->where('id',request()->input('id'))->first();
        if(Auth::guard('users')->user()->deposit < $product->price){
            return response()->json([
                'message' => 'Insufficient Balance,deposit funds to purchase',
                'status' => 'error'
            ]);
        }
        if($product->type == 'premium' && !DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->where('json->type','starter')->exists()){
            return response()->json([
                'message' => 'You must purchase a starter product before purhasing any premium product',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'deposit' => DB::raw('deposit - '.$product->price.''),
            'updated' => Carbon::now()
        ]);
        DB::table('transactions')->insert([
            'amount' => $product->price,
            'class' => 'debit',
            'type' => 'purchase',
            'json' => json_encode($product),
            'user_id' => Auth::guard('users')->user()->id,
            'description' => ''.$product->name.' Purchase',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        DB::table('purchased')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'json' => json_encode($product),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        // REFERRAL TO BE ADDED
        $first_ref=Auth::guard('users')->user()->ref ?? '';
        $referral_settings=json_decode(DB::table('settings')->where('key','referral_settings')->first()->json ?? '{}');
        $first_level=($referral_settings->first_level * $product->price)/100;
    //    FIRST LEVEL
        if($first_ref !== ''){
                DB::table('users')->where('username',$first_ref)->update([
                    'withdrawal' =>  DB::raw('withdrawal + '.$first_level.''),
                    'updated' => Carbon::now()
                ]);
                 DB::table('transactions')->insert([
            'amount' => $first_level,
            'class' => 'credit',
            'type' => 'commission',
            'json' => json_encode([
                'level' => 'first',
                'user_id' => Auth::guard('users')->user()->id,
                
            ]),
            'user_id' => DB::table('users')->where('username',$first_ref)->first()->id,
            'description' => 'First level referral commission',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        // SECOND LEVEL
        $second_ref=DB::table('users')->where('username',$first_ref)->first()->ref ?? '';
         $second_level=($referral_settings->second_level * $product->price)/100;
        if($second_ref !== ''){
              DB::table('users')->where('username',$second_ref)->update([
                    'withdrawal' => DB::raw('withdrawal + '.$second_level.''),
                    'updated' => Carbon::now()
                ]);
                 DB::table('transactions')->insert([
            'amount' => $second_level,
            'class' => 'credit',
            'type' => 'commission',
            'json' => json_encode([
                'level' => 'second',
                'user_id' => Auth::guard('users')->user()->id,
                
            ]),
            'user_id' => DB::table('users')->where('username',$second_ref)->first()->id,
            'description' => 'Second level referral commission',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        }
        // THIRD LEVEL
        $third_ref=DB::table('users')->where('username',$second_ref)->first()->ref ?? '';
         $third_level=($referral_settings->third_level * $product->price)/100;
        if($third_ref !== ''){
              DB::table('users')->where('username',$third_ref)->update([
                    'withdrawal' => DB::raw('withdrawal + '.$third_level.''),
                    'updated' => Carbon::now()
                ]);
                 DB::table('transactions')->insert([
            'amount' => $third_level,
            'class' => 'credit',
            'type' => 'commission',
            'json' => json_encode([
                'level' => 'third',
                'user_id' => Auth::guard('users')->user()->id,
                
            ]),
            'user_id' => DB::table('users')->where('username',$third_ref)->first()->id,
            'description' => 'Third level referral commission',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        }
        }
        

        // REFERRAL TO BE ADDED
         DB::table('notifications')->insert([
        'message' => ucfirst(Auth::guard('users')->user()->username).' Just purchased a product',
        'date' => Carbon::now()
    ]);
        return response()->json([
            'message' => 'Product purchase successfull',
            'status' => 'success',
            'url' => url('users/products')
        ]);
    }

    // deposit complete 
    public function DepositComplete(){
       if(!request()->has('reference')){
        return redirect('users/wallet');
       }
       if(!DB::table('transactions')->where('uniqid',request()->input('reference'))->where('user_id',Auth::guard('users')->user()->id)->where('status','initiated')->exists()){
        return redirect()->to('users/wallet');
       }
       $paystack=Http::withToken(env('PSTCK_SECRET_KEY'))->get('https://api.paystack.co/transaction/verify/'.request()->input('reference').'');
       if($paystack->successful()){
        $data=$paystack->json();
        if(isset($data['data']['status']) && $data['data']['status'] == 'success'){
            DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('uniqid',request()->input('reference'))->update([
                'status' => 'success',
                'json' => json_encode([
                    'gateway' => 'paystack',
                    'details' => [

                    ]
                ])
                
            ]);
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'deposit' => DB::raw('deposit + '.($data['data']['amount']/100).''),
                'updated' => Carbon::now()
            ]);
            return redirect('users/wallet');
        }else{
              return redirect('users/wallet');
        }
       }else{
          return redirect('users/wallet');
       }
    }
    // get paystack banks
    public function GetBanks(){
        $banks=Http::withToken(env('PSTCK_SECRET_KEY'))->get('https://api.paystack.co/bank',[
            'country' => 'nigeria'
        ]);
        if($banks->successful()){
           return $banks->json();
        }else{
            return dd($banks->body());
        }
    }
    // auto verify
    public function AutoVerify(){
        foreach(Banks()->data as $data){
           if($data->id == request()->input('bank_id')){
            $bank_code=$data->code;
            $bank_name=$data->name;
           }
        }
        $response=Http::withToken(env('PSTCK_SECRET_KEY'))->get('https://api.paystack.co/bank/resolve',[
            'account_number' => request()->input('account_number'),
            'bank_code' => $bank_code
        ]);
        if($response->successful()){
           $data=json_decode(json_encode($response->json()));
           return response()->json([
            'message' => 'Account verification succcessfull',
            'status' => 'success',
            'account_name' => $data->data->account_name,
            'bank_name' => $bank_name
           ]);
        }else{
            return response()->json([
                'message' => 'Invalid account.Please check the account information and try again.',
                'status' => 'error'
            ]);
        }
    }
    // public function checkin
    public function CheckIn(){
        if(DB::table('transactions')->where('type','check in')->where('user_id',Auth::guard('users')->user()->id)->whereDate('date',Carbon::today())->exists()){
            return response()->json([
                'message' => 'You have already checked in today,try again tomorrow',
                'status' => 'error'
            ]);
        }else{
            $finance=json_decode(DB::table('settings')->where('key','finance_settings')->first()->json);
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'withdrawal' => DB::raw('withdrawal + '.$finance->daily_check_in.'')
            ]);
              DB::table('transactions')->insert([
            'amount' => $finance->daily_check_in,
            'class' => 'credit',
            'type' => 'check in',
            'user_id' => Auth::guard('users')->user()->id,
            'description' => 'Daily Check In',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Daily Check in successful and wallet has been creditted',
            'status' => 'success',
            'url' => url('users/dashboard')
        ]);
        
        }
    }
    // gtr pay
  

public function GTRPay()
{
    // Prepare the request data
    $data = [
        'mchId' => '80037999', // Merchant ID
    ];

    // Generate the MD5 signature based on only the mchId
    $signature = $this->generateSignature($data['mchId']);

    // Add the signature to the request data
    $data['sign'] = $signature;

    // Send the POST request
    $response = Http::post('https://wg.gtrpay0 01.com/order/balance', $data);

    // Always print the full response for debugging
    $fullResponse = $response->json();

    echo '<pre>';
    print_r($fullResponse);  // This will print the entire response array
    echo '</pre>';

    // Check if the response is successful
    if ($response->successful()) {
        // If the status code is 200, process the balance data
        if ($fullResponse['code'] == 200) {
            $balance = $fullResponse['data'];
            echo 'Merchant ID: ' . $balance['mchId'] . '<br>';
            echo 'Total Balance: ' . $balance['balanceAll'] . '<br>';
            echo 'Usable Balance: ' . $balance['balanceUsable'] . '<br>';
            echo 'Frozen Balance: ' . $balance['balanceIce'] . '<br>';
        } else {
            echo 'Error: ' . $fullResponse['msg'];
        }
    } else {
        echo 'Error occurred while sending the request.';
    }
}

/**
 * Generate the signature for the request
 *
 * @param string $mchId
 * @return string
 */
private function generateSignature($mchId)
{
    // Concatenate the mchId (no other parameters)
    $queryString = 'mchId=' . $mchId;

    // Generate the MD5 hash of the concatenated string (uppercase)
    return strtoupper(md5($queryString)); // MD5 and convert to uppercase
}
// claim reward
public function ClaimReward(){
    DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'withdrawal' => DB::raw('withdrawal + '.request('reward').'')
    ]);
     DB::table('transactions')->insert([
            'amount' => request('reward'),
            'class' => 'credit',
            'type' => 'daily spin',
            'user_id' => Auth::guard('users')->user()->id,
            'description' => 'Daily Spin Reward',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return redirect('users/dashboard');

}

}
