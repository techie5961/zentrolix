<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminsPostRequestController extends Controller
{
    // HASH FUNCTION
    public function Hash(){
       
   
   return Hash::make(request()->input('password'));

    }
    // LOGIN FUNCTION
    public function Login(){
        if(!DB::table('admins')->where('tag',request()->input('id'))->exists()){
            return response()->json([
                'message' => 'Admin not Found',
                'status' => 'error'
            ]);

        }
        $admin=DB::table('admins')->where('tag',request()->input('id'))->first();
        if(!Hash::check(request()->input('password'),$admin->password)){
            return response()->json([
                'message' => 'Invalid Password',
                'status' => 'error'
            ]);
        }
        Auth::guard('admins')->loginUsingId($admin->id,true);
        return response()->json([
            'message' => 'Login successfull',
            'status' => 'success',
            'url' => url('admins/dashboard')
        ]);

    }
    // ADD PRODUCT FUNCTION
    public function AddProduct(){
       // return request()->input('daily_tasks');
        $photo=request()->file('photo');
        $name=time().'.'.$photo->getClientOriginalExtension();
        if($photo->move(public_path('products'),$name)){
            DB::table('products')->insert([
                'photo' => $name,
                'name' => request()->input('name'),
                'price' => request()->input('price'),
                'daily_tasks' => request()->input('daily_tasks'),
                'income_per_task' => request('income_per_task'),
                'cycle' => request()->input('cycle'),
                'purchase_limit' => request('purchase_limit'),
                'minimum_withdrawal' => request('minimum_withdrawal'),
                'date' => Carbon::now(),
                'updated' => Carbon::now()

            ]);
            return response()->json([
                'message' => 'Product added successfully',
                'status' => 'success',
                'url' => url('admins/products/manage')
            ]);
        }
    }
     // EDIT PRODUCT FUNCTION
    public function EditProduct(){
        if(request()->hasFile('photo')){
             $photo=request()->file('photo');
        $name=time().'.'.$photo->getClientOriginalExtension();
        if($photo->move(public_path('products'),$name)){
            DB::table('products')->where('id',request()->input('id'))->update([
                'photo' => $name,
                'name' => request()->input('name'),
                'price' => request()->input('price'),
                'daily_income' => request()->input('daily_income'),
                'cycle' => request()->input('cycle'),
                'purchase_limit' => request('purchase_limit'),
                'type' => request('type'),
                'updated' => Carbon::now()

            ]);
            return response()->json([
                'message' => 'Product Edited successfully',
                'status' => 'success',
                'url' => url('admins/products/manage')
            ]);
        }
        }else{
           
            DB::table('products')->where('id',request()->input('id'))->update([
                
                'name' => request()->input('name'),
                'price' => request()->input('price'),
                'daily_income' => request()->input('daily_income'),
                'cycle' => request()->input('cycle'),
              'purchase_limit' => request('purchase_limit'),
                'type' => request('type'),
                'updated' => Carbon::now()

            ]);
            return response()->json([
                'message' => 'Product Edited successfully',
                'status' => 'success',
                'url' => url('admins/products/manage')
            ]);
        
        }
       
    }
    // finance settings
    public function FinanceSettings(){
        $key='finance_settings';
        $json=[
            'min_withdrawal' => request()->input('min_withdrawal'),
            'max_withdrawal' => request()->input('max_withdrawal'),
            'withdrawal_fee' => request()->input('withdrawal_fee'),
            'withdrawal_status' => request()->input('withdrawal_status'),
            'daily_check_in' => request()->input('daily_check_in'),
            'welcome_bonus' => request()->input('welcome_bonus'),
            'spin_minimum' => request()->input('spin_minimum'),
            'spin_maximum' => request()->input('spin_maximum'),
            'daily_free_tasks' => request()->input('daily_free_tasks'),
            'earnings_per_task' => request()->input('earnings_per_task')
        ];
        if(DB::table('settings')->where('key',$key)->exists()){
          DB::table('settings')->where('key',$key)->update([
              
                'json' => json_encode($json),
                'updated' => Carbon::now(),
               
            ]);
            return response()->json([
                'message' => 'Settings updated successfully',
                'status' => 'success'
            ]);

        }else{
            DB::table('settings')->insert([
                'key' => $key,
                'json' => json_encode($json),
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Settings saved successfully',
                'status' => 'success'
            ]);
        }
    }
     // bank settings
    public function BankSettings(){
        $key='bank_settings';
        $json=[
            'account_number' => request()->input('account_number'),
            'account_name' => request()->input('account_name'),
            'bank_name' => request()->input('bank_name'),
            
        ];
        if(DB::table('settings')->where('key',$key)->exists()){
          DB::table('settings')->where('key',$key)->update([
              
                'json' => json_encode($json),
                'updated' => Carbon::now(),
               
            ]);
            return response()->json([
                'message' => 'Settings updated successfully',
                'status' => 'success'
            ]);

        }else{
            DB::table('settings')->insert([
                'key' => $key,
                'json' => json_encode($json),
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Settings saved successfully',
                'status' => 'success'
            ]);
        }
    }
     // referral settings
    public function ReferralSettings(){
        $key='referral_settings';
        $json=[
            'first_level' => request()->input('first_level'),
            'second_level' => request()->input('second_level'),
            'third_level' => request()->input('third_level'),
            
        ];
        if(DB::table('settings')->where('key',$key)->exists()){
          DB::table('settings')->where('key',$key)->update([
              
                'json' => json_encode($json),
                'updated' => Carbon::now(),
               
            ]);
            return response()->json([
                'message' => 'Settings updated successfully',
                'status' => 'success'
            ]);

        }else{
            DB::table('settings')->insert([
                'key' => $key,
                'json' => json_encode($json),
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Settings saved successfully',
                'status' => 'success'
            ]);
        }
    }
    // credit user 
    public function CreditUser(){
        DB::table('users')->where('id',request()->input('id'))->update([
            request()->input('wallet') => DB::raw(''.request()->input('wallet').' + '.request()->input('amount').'')
        ]);
        return response()->json([
            'message' => 'User wallet creditted successfully',
            'status' => 'success'
        ]);
    }
     // debit user 
    public function DebitUser(){
        DB::table('users')->where('id',request()->input('id'))->update([
            request()->input('wallet') => DB::raw(''.request()->input('wallet').' - '.request()->input('amount').'')
        ]);
        return response()->json([
            'message' => 'User wallet debitted successfully',
            'status' => 'success'
        ]);
    }
    // general settings
  
    public function GeneralSettings(){
        $key='general_settings';
        $json=[
            'whatsapp_group' => request()->input('whatsapp_group'),
            'telegram_group' => request()->input('telegram_group'),
            'notification_message' => request()->input('notification_message'),
            
        ];
        if(DB::table('settings')->where('key',$key)->exists()){
          DB::table('settings')->where('key',$key)->update([
              
                'json' => json_encode($json),
                'updated' => Carbon::now(),
               
            ]);
            return response()->json([
                'message' => 'Settings updated successfully',
                'status' => 'success'
            ]);

        }else{
            DB::table('settings')->insert([
                'key' => $key,
                'json' => json_encode($json),
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Settings saved successfully',
                'status' => 'success'
            ]);
        }
    }
    // add tasks
    public function AddTasks(){
        DB::table('tasks')->insert([
            'title' => request('title'),
            'link' => request('link'),
            'description' => request('description'),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'url' => url('admins/tasks/manage'),
            'message' => 'Task created successfully',
            'status' => 'success'
        ]);
    }
      // edit task
    public function EditTask(){
        DB::table('tasks')->where('id',request('id'))->update([
            'title' => request('title'),
            'link' => request('link'),
            'description' => request('description'),
            'updated' => Carbon::now()
           
        ]);
        return response()->json([
            'url' => url('admins/tasks/manage'),
            'message' => 'Changes saved successfully',
            'status' => 'success'
        ]);
    }
      //  update password
    public function UpdatePassword(){
        if(!Hash::check(request()->input('confirm'),Hash::make(request()->input('password')))){
            return response()->json([
                'message' => 'New password and confirm password must match',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',request()->input('id'))->update([
            'password' => Hash::make(request()->input('password'))
        ]);
        return response()->json([
            'message' => 'Password updated successfully',
            'status' => 'success'
        ]);
    }

}
