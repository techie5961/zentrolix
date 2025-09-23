<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UsersDashboardController extends Controller
{
    // login
    public function Login(){
        return view('users.auth.login');
    }
    // register
    public function Register(){
        return view('users.auth.register',[
            'ref' => ''
        ]);
    }
    //  affiliate register
    public function AffiliateRegister($username){
       if(DB::table('users')->where('username',$username)->where('status','active')->exists()){
        $ref=$username;
       }else{
        $ref='';
       }
        return view('users.auth.register',[
            'ref' => $ref
        ]);
    }
    // dashboard
    public function Dashboard(){
        $purchased=DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('json->price','desc')->first();
        $key=json_decode($purchased->json ?? '{}')->price ?? 0;
       
        $products=DB::table('products')->where('price','>',$key)->orderBy('price','asc')->get();
        $purchase='';
        $total=DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('date','desc')->count();
        if(request()->has('purchase')){
            $purchase='true';
          
        }
        $products=$products->filter(function($each){
            $limit=DB::table('purchased')->where('json->id',$each->id)->where('user_id',Auth::guard('users')->user()->id)->count();
           return $limit < $each->purchase_limit;
        });
        return view('users.dashboard',[
            'products' => $products,
             'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->json),
             'finance_settings' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json),
             'referral_settings' => json_decode(DB::table('settings')->where('key','referral_settings')->first()->json),
             'purchase' => $purchase,
             'total' => $total,
             'spinned' => DB::table('transactions')->where('type','daily spin')->where('user_id',Auth::guard('users')->user()->id)->whereDate('date',Carbon::today())->count()
        ]);
    }
    // recharge
    public function Recharge(){
        return view('users.recharge',[
            'auto' => DB::table('products')->orderBy('price','asc')->get()
        ]);
    }
     // withdraw
    public function Withdraw(){
        if(empty((array) json_decode(Auth::guard('users')->user()->bank ?? '{}'))){
            return redirect('users/bank');
        }
        $asset=DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('date','desc')->first();
        $portal=DB::table('products')->where('id',json_decode($asset->json ?? '{}')->id ?? 0)->first()->withdrawal_portal ?? 'null';
        return view('users.withdraw',[
            'finance_settings' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json),
            'bank' => json_decode(Auth::guard('users')->user()->bank ?? '{}'),
            'minimum_withdrawal' => json_decode($asset->json ?? '{}')->minimum_withdrawal ?? 0,
            'withdrawal_portal' => $portal,
            'asset' => json_decode($asset->json ?? '{}')
        ]);
    }
    // wallet
    public function Wallet(){
        $trx=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->whereNot('status','initiated')->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        if(request()->has('paginate')){
             return view('components.users.paginate',[
            'trx' => $trx,
            'wallet' => true
        ]);
        }
        return view('users.wallet',[
            'trx' => $trx
        ]);
    }
    // profile
    public function Profile(){
        return view('users.profile',[
            'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->json),
            'asset' => json_decode(DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->orderBy('date','desc')->first()->json ?? '{}')
     
        ]);

    }
    // add bank
    public function AddBank(){
        return view('users.bank',[
            'bank' => json_decode(Auth::guard('users')->user()->bank ?? '{}')
        ]);
    }
    // invite
    public function Invite(){
        return view('users.refer',[
             'referral_settings' => json_decode(DB::table('settings')->where('key','referral_settings')->first()->json)
        ]);
    }
    // products
    public function Products(){
        if(DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('date','desc')->exists()){
             $purchased=DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('date','desc')->first();
       
            $purchased->json=json_decode($purchased->json);
            $purchased->frame=Carbon::parse($purchased->date)->diffForHumans();
            $purchased->next_income=Carbon::parse($purchased->updated)->addDay()->format('d M Y, H:i:s');
            $purchased->expires=Carbon::parse($purchased->date)->addDays($purchased->json->cycle)->format('d M Y, H:i:s');
           
        }
       
        
     
        return view('users.products',[
            'data' => $purchased ?? '',
            'total_products' => DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->count(),
             'total_daily_income' => DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->sum('json->daily_income')
            
        ]);
    }
    // my team 
    public function Team(){
       
        $username=Auth::guard('users')->user()->username;
        $ref=DB::table('users')->where('ref',Auth::guard('users')->user()->username)->orWhereIn('ref',function($q) use($username){
                $q->select('username')->from('users')->where('ref',$username);
            })->orWhereIn('ref',function($q) use($username){
                $q->select('username')->from('users')->whereIn('ref',function($sq) use($username){
                    $sq->select('username')->from('users')->where('ref',$username);
                });
            })->orderBy('date','desc')->paginate(10);
            $ref->getCollection()->transform(function($each){
                $each->frame=Carbon::parse($each->date)->diffForHumans();
                $each->total_purchase=DB::table('purchased')->where('user_id',$each->id)->sum('json->price');
                 $each->total_commission=DB::table('transactions')->where('type','commission')->where('user_id',Auth::guard('users')->user()->id)->where('json->user_id',$each->id)->sum('amount');
                $each->referral_level=$each->ref == Auth::guard('users')->user()->username ? 'Direct Referral' : 'Indirect Referral';
                 return $each;
            });
            if(request()->has('paginate')){
                return view('components.users.paginate',[
            
             'ref' => $ref,
             'team' => true
        ]);
            }
        return view('users.team',[
            'team_size' => DB::table('users')->where('ref',Auth::guard('users')->user()->username)->orWhereIn('ref',function($q) use($username){
                $q->select('username')->from('users')->where('ref',$username);
            })->orWhereIn('ref',function($q) use($username){
                $q->select('username')->from('users')->whereIn('ref',function($sq) use($username){
                    $sq->select('username')->from('users')->where('ref',$username);
                });
            })->count(),
            'total_commission' => DB::table('transactions')->where('type','commission')->where('user_id',Auth::guard('users')->user()->id)->sum('amount'),
            'ref' => $ref
        ]);
    }
    // logout
    public function Logout(){
        Auth::guard('users')->logout();
        return redirect('login');
    }
    // available tasks
    public function AvailableTasks(){
        $tasks=DB::table('tasks')->where('status','active')->whereDate('date',Carbon::today())->whereNotIn('id',function($q){
            $q->select('task_id')->from('proofs')->where('user_id',Auth::guard('users')->user()->id);
        })->orderBy('date','desc')->limit(10)->get();
        $tasks->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        $asset=DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('date','desc');
        if($asset->count() == 0){
            return redirect('users/dashboard?purchase=true');
        }
        return view('users.tasks.available',[
            'tasks' => $tasks,
            'asset' => json_decode($asset->first()->json)
        ]);
    }
    // complete task
   public function CompleteTask(){
    $task=DB::table('tasks')->where('id',request('id'))->first();
      $asset=DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('date','desc');
        if($asset->count() == 0){
            return redirect('users/dashboard?purchase=true');
        }
    return view('users.tasks.complete',[
        'data' => $task,
        'asset' => json_decode($asset->first()->json)
    ]);
  
   }
     // spin
    public function Spin(){
        if(DB::table('transactions')->where('type','daily spin')->where('user_id',Auth::guard('users')->user()->id)->whereDate('date',Carbon::today())->exists()){
            return redirect('users/dashboard');
        }
        return view('users.spin',[
            'finance_settings' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json ?? '{}')
        ]);
    }
    // checkout
public function Checkout(){
    if(!request()->has('uniqid')){
        return redirect('users/recharge');
    }
    return view('users.checkout',[
         'bank_settings' => json_decode(DB::table('settings')->where('key','bank_settings')->first()->json),
         'uniqid' => request('uniqid'),
         'amount' => DB::table('transactions')->where('uniqid',request('uniqid'))->where('user_id',Auth::guard('users')->user()->id)->first()->amount,
         
    ]);
}  
public function SubmitRequest(){
    return view('submit-request',[
        'assets' => DB::table('products')->orderBy('name','asc')->get()
        ]);
}
  
}
