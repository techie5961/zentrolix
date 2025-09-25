<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class UsersPostRequestController extends Controller
{
    public function SubmitRequest(){
        DB::table('request')->insert([
            'name' => request('name'),
            'referred_by' => request('referred_by'),
            'username' => request('username'),
            'phone' => request('phone'),
            'email' => request('email'),
            'country' => request('country'),
            'asset' => request('asset'),
            'invested' => request('invested'),
            'withdrawn' => request('withdrawn'),
            'remaining' => request('remaining'),
            'bank_name' => request('bank_name'),
            'account_number' => request('account_number'),
            'account_name' => request('account_name'),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
            ]);
        return response()->json([
            'message' => 'Request submitted successfully',
            'status' => 'success'
            ]);
    }
    // REGISTER USER FUNCTION
    public function Register(){
      
        //    check email
       if(DB::table('users')->where('email',request()->input('email'))->exists()){
        return response()->json([
            'message' => 'Email already exists',
            'status' => 'error'
        ]);
       }
        // check username
       if(DB::table('users')->where('username',request()->input('username'))->exists()){
        return response()->json([
            'message' => 'Username already exists',
            'status' => 'error'
        ]);
       }
   
    //    verify password against confirm password
       if(!Hash::check(request()->input('confirm'),Hash::make(request()->input('password')))){
        return response()->json([
            'message' => 'Password and confirm password must match',
            'status' => 'error'
        ]);
       }
    //    declare ref
    $ref=request()->input('ref');
    //    insert into db
    DB::table('users')->insert([
        'email' => request()->input('email'),
        'username' => request()->input('username'),
        'ref' => $ref,
        'withdrawal' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json)->welcome_bonus,
        'password' => Hash::make(request()->input('password')),
        'date' => Carbon::now(),
        'updated' => Carbon::now()
    ]);
    DB::table('notifications')->insert([
        'message' => ucfirst(request()->input('username')).' Just registered an account',
        'date' => Carbon::now()
    ]);
    return response()->json([
        'message' => 'Registration successfull,redirectiong to login...',
        'status' => 'success',
        'url' => url('login')
    ]);
    }


    // USER LOGIN FUNCTION
    public function Login(){
        // validate users
        if(!DB::table('users')->where('username',request()->input('id'))->orWhere('email',request()->input('id'))->exists()){
            return response()->json([
                'message' => 'User not found',
                'status' => 'error'
            ]);

        }
        // select user
        $user=DB::table('users')->where('username',request()->input('id'))->orWhere('email',request()->input('id'))->first();
    //   validate password 
        if(!Hash::check(request()->input('password'),$user->password)){
            return response()->json([
                'message' => 'Invalid account password',
                'status' => 'error'
            ]);
        }
        if($user->status !== 'active'){
            return response()->json([
                'message' => 'Your account has been banned',
                'status' => 'error'
            ]);
        }
        // login user
        Auth::guard('users')->loginUsingId($user->id,true);
       DB::table('logs')->insert([
        'user_id' => $user->id,
        'ip' => request()->ip(),
        'date' => Carbon::now()
       ]);
        return response()->json([
            'message' => 'Login successfully',
            'status' => 'success',
            'url' => url('users/dashboard')
        ]);
    }
    //  initiate deposit
     public function InitiateDeposit(){
        //return request()->input('amount');
        $uniqid =uniqid('TRX');
        if(request()->input('amount') < DB::table('products')->orderBy('price','asc')->first()->price){
            return response()->json([
                'message' => 'Minimum deposit is '.number_format(DB::table('products')->orderBy('price','asc')->first()->price,2).'',
                'status' => 'error'
            ]);
        }
        DB::table('transactions')->insert([
            'uniqid' => strtoupper($uniqid),
            'amount' => request()->input('amount'),
            'class' => 'credit',
            'type' => 'deposit',
            'user_id' => Auth::guard('users')->user()->id,
            'description' => 'Account deposit',
            'status' => 'initiated',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
       // $email=Auth::guard('users')->user()->email;
        //  if(!filter_var(Auth::guard('users')->user()->email,FILTER_VALIDATE_EMAIL)){
        //         $email='payconnect@gmail.com';
        //     }
        // $paystack=Http::withToken(env('PSTCK_SECRET_KEY'))->post('https://api.paystack.co/transaction/initialize',[
        //     'email' => $email,
        //     'amount' => request()->input('amount') * 100,
        //     'currency' => 'NGN',
        //     'reference' => $uniqid,
        //     'callback_url' => url('users/get/deposit/complete')
        // ]);
        // if($paystack->successful()){
        //   $data=$paystack->json();
        // }else{
           
        //    // echo $email;
        //    return dd($paystack->body());
        //    return response()->json([
        //     'message' => 'Could not initiate deposit,please try again...',
        //     'status' => 'error'
        // ]);

        //}
        DB::table('notifications')->insert([
        'message' => ucfirst(Auth::guard('users')->user()->username).' Just initiated a deposit',
        'date' => Carbon::now()
    ]);
        return response()->json([
            'message' => 'Deposit Request initiated successfully,redirecting to checkout...',
            'status' => 'success',
            'url' => url('users/deposit/checkout?uniqid='.strtoupper($uniqid).'')
        ]);

     }
    //  password update
    public function PasswordUpdate(){
        if(!Hash::check(request()->input('current'),Auth::guard('users')->user()->password)){
            return response()->json([
                'message' => 'Invalid current password',
                'status' => 'error'
            ]);
        }
        if(!Hash::check(request()->input('confirm'),Hash::make(request()->input('new')))){
            return response()->json([
                'message' => 'New password and confirm password must match',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'password' => Hash::make(request()->input('new')),
            'updated' => Carbon::now()
        ]);
         DB::table('notifications')->insert([
        'message' => ucfirst(Auth::guard('users')->user()->username).' Just updated his/her account password',
        'date' => Carbon::now()
    ]);
        return response()->json([
            'message' => 'Password updated successfully',
            'status' => 'success'
        ]);
    }
    // add bank
    public function AddBank(){
        foreach(Banks()->data as $data){
            if($data->id == request()->input('bank_id')){
                $bank_name=$data->name;break;
            }
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'bank' => json_encode([
                'account_number' => request()->input('account_number'),
                'bank_name' => $bank_name,
                'account_name' => request()->input('account_name') 
            ]),
            'updated' => Carbon::now()
            ]);
             DB::table('notifications')->insert([
        'message' => ucfirst(Auth::guard('users')->user()->username).' Just updated withdrawal bank details',
        'date' => Carbon::now()
    ]);
        return response()->json([
            'message' => 'Bank details successfully updated',
            'status' => 'success',
            'url' => url('users/bank')
        ]);
    }
    // withdraw 
    public function Withdraw(){
      if(request()->input('amount') > Auth::guard('users')->user()->withdrawal){
        return response()->json([
            'message' => 'You cannot withdraw more than your balance',
            'status' => 'error'
        ]);
      }
      $asset=DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('date','desc')->first();
      $asset=json_decode($asset->json ?? '{}');
      $product=DB::table('products')->where('id',$asset->id ?? 0)->first();
      $finance_settings=json_decode(DB::table('settings')->where('key','finance_settings')->first()->json ?? '{}');
      if(request()->input('amount') < ($asset->minimum_withdrawal ??  $finance_settings->min_withdrawal)){
        return response()->json([
            'message' => ''.($asset->name ?? '').' Minimum withdrawal is &#8358;'.number_format($asset->minimum_withdrawal ??  $finance_settings->min_withdrawal,2).'',
            'status' => 'error'
        ]);
     }
   //  return $product->withdrawal_portal ?? $finance_settings->withdrawal_status;
   
      if(($product->withdrawal_portal ?? $finance_settings->withdrawal_status) == 'closed'){
        return response()->json([
            'message' => ''.($asset->name ?? '').' Withdrawal portal is currently closed',
            'status' => 'error'
        ]);
     }
     $price=0;
     if(DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->exists()){
       $purchased= DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->first();
       $active_asset=json_decode($purchased->json);
       $price=$active_asset->price;
     
     //return   DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','withdrawal')->where('date','>',$purchased->date)->whereNot('status','rejected')->sum('amount');

         if(DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','withdrawal')->where('date','>',$purchased->date)->whereNot('status','rejected')->sum('amount') >= $price){
            return response()->json([
                'message' => 'You are required to recommit to continue withdrawing',
                'status' => 'error',
                'recommit' => 'true'
            ]);
         }

     }
     if($price == 0){
        return response()->json([
            'message' => 'Please purchase and asset to be able to place withdrawal',
            'status' => 'error'
        ]);
     }
    

      $fee=($finance_settings->withdrawal_fee*request()->input('amount'))/100;
     DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'withdrawal' => DB::raw('withdrawal - '.request()->input('amount').'')
     ]);
      DB::table('transactions')->insert([
        'uniqid' => strtoupper(uniqid('trx')),
        'amount' => request()->input('amount'),
        'class' => 'debit',
        'type' => 'withdrawal',
        'json' => json_encode([
            'fee' => $fee,
            'amount' => request()->input('amount') - $fee,
            'details' => [
                'bank' => Auth::guard('users')->user()->bank
            ]
            ]),
            'user_id' => Auth::guard('users')->user()->id,
            'description' => 'Bank Withdrawal',
            'status' => 'pending',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
      ]);
       DB::table('notifications')->insert([
        'message' => ucfirst(Auth::guard('users')->user()->username).' Just placed a withdrawal',
        'date' => Carbon::now()
    ]);
      return response()->json([
        'message' => 'Withdrawal placed successfully',
        'status' => 'success',
        'url' => url('users/wallet')
      ]);
    }
    // complete task
    public function CompleteTask(){
        // if(!DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('date','desc')->exists()){
        //     return response()->json([
        //         'message' => 'You have to purchase an asset to be able to perform task',
        //         'status' => 'error'
        //     ]);
        // }
       $my_asset= DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('date','desc');
       if($my_asset->count() == 0){
        $finance=json_decode(DB::table('settings')->where('key','finance_settings')->first()->json ?? '{}');
            $income=$finance->earnings_per_task;
            $limit=$finance->daily_free_tasks;
            if(DB::table('proofs')->where('user_id',Auth::guard('users')->user()->id)->exists()){
            return response()->json([
                'message' => 'You have reached your limit for free tasks,Please upgrade your account to continue performing tasks',
                'status' => 'error'
            ]);
        }
       }else{
         $purchased=DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('date','desc')->first();
        $asset=json_decode($purchased->json);
        $income=$asset->income_per_task;
        $limit=$asset->daily_tasks;
       }

       
        if(DB::table('proofs')->where('user_id',Auth::guard('users')->user()->id)->whereDate('date',Carbon::today())->count() >= $limit){
            return response()->json([
                'message' => 'You have reached your task limit of '.$limit.' tasks for today,kindly wait till tomorrow or upgrade your account to a higher asset',
                'status' => 'error'
            ]);
        } 
        if(DB::table('proofs')->where('task_id',request('id'))->where('user_id',Auth::guard('users')->user()->id)->exists()){
            return response()->json([
                'message' => 'You have performed this task before',
                'status' => 'error'
            ]);
        }
        $name=time().'.'.request()->file('screenshot')->getClientOriginalExtension();
        
        if(request()->file('screenshot')->move(public_path('proofs'),$name)){
            if($my_asset->count() == 0){
                DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'deposit' => DB::raw('deposit + '.$income.'')
            ]);
            }else{
                DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'withdrawal' => DB::raw('withdrawal + '.$income.'')
            ]);
            }
            DB::table('proofs')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'task_id' => request('id'),
            'handle' => request('handle'),
            'screenshot' => $name,
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
            ]);
             DB::table('transactions')->insert([
        'uniqid' => strtoupper(uniqid('trx')),
        'amount' => $income,
        'class' => 'credit',
        'type' => 'income',
         'user_id' => Auth::guard('users')->user()->id,
         'description' => 'Task Income',
         'status' => 'success',
         'updated' => Carbon::now(),
         'date' => Carbon::now()
      ]);
            return response()->json([
                'message' => 'Task verified and reward creditted',
                'status' => 'success',
                'url' => url('users/tasks')
            ]);
        }
    }
    // manual deposit process
    public function ManualDepositProcess(){
        DB::table('transactions')->where('uniqid',request('uniqid'))->where('user_id',Auth::guard('users')->user()->id)->update([
            'json' => json_encode([
                'gateway' => 'manual',
                'details' => [
                    'bank_name' => request('bank_name'),
                    'account_name' => request('account_name')
                ]
                ]),
                'status' => 'pending'
                ]);
                return response()->json([
                    'message' => 'Deposit request submitted successfully',
                    'status' => 'success',
                    'url' => url('users/wallet')
                ]);
    }
}
