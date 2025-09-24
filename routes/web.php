<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UsersDashboardController;
use App\Http\Controllers\UsersPostRequestController;
use App\Http\Controllers\AdminsDashboardController;
use App\Http\Middleware\AdminCheckAuthMiddleware;
use App\Http\Controllers\AdminsPostRequestController;
use App\Http\Controllers\AdminsGetRequestController;
use App\Http\Controllers\AdminsSearchRequestController;
use App\Http\Controllers\UsersGetRequestController;
use App\Http\Middleware\UsersCheckAuthMiddleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\DailyRewardsMiddleware;
use App\Http\Middleware\UsersAuthMiddleware;
use App\Http\Middleware\AdminsAuthMiddleware;


Route::get('submit/request',[
    UsersDashboardController::class,'SubmitRequest'
    ]);
    Route::post('post/submit/request/process',[
        UsersPostRequestController::class,'SubmitRequest'
        ]);
Route::get('gtrpay',[
   UsersGetRequestController::class,'GTRPay'
]);
Route::middleware([
   DailyRewardsMiddleware::class
])->group(function(){
   // hash password
Route::get('hash',[
   AdminsPostRequestController::class,'Hash'
]);
// users
// auth
Route::middleware([ UsersAuthMiddleware::class ])->group(function(){
Route::get('login',[
   UsersDashboardController::class,'Login' 
]);
Route::get('/',[
   UsersDashboardController::class,'Login' 
]);
Route::get('register',[
   UsersDashboardController::class,'Register'
]);
Route::get('register/ref/{username}',[
   UsersDashboardController::class,'AffiliateRegister'
]);
});
Route::post('post/users/register/process',[
   UsersPostRequestController::class,'Register'
]);
Route::post('post/login/process',[
   UsersPostRequestController::class,'Login'
]);
// users prefix
Route::prefix('users')->group(function(){
  Route::middleware([ UsersCheckAuthMiddleware::class ])->group(function(){
    Route::get('dashboard',[
      UsersDashboardController::class,'Dashboard'
   ]);
   Route::get('recharge',[
      UsersDashboardController::class,'Recharge'
   ]);
   Route::get('spin',[
      UsersDashboardController::class,'Spin'
   ]);
   Route::get('withdraw',[
      UsersDashboardController::class,"Withdraw"
   ]);
    Route::get('assets',[
      UsersDashboardController::class,"Assets"
   ]);
   Route::get('skeleton',function(){
         return view('users.skeleton');
      });
      Route::get('transactions',function(){
         return Auth::guard('users')->user()->deposit;
      });
      Route::get('wallet',[
         UsersDashboardController::class,'Wallet'
      ]);
      Route::get('profile',[
         UsersDashboardController::class,'Profile'
      ]);
      Route::get('bank',[
         UsersDashboardController::class,'AddBank'
      ]);
      Route::get('invite',[
         UsersDashboardController::class,'Invite'
      ]);
      Route::get('products',[
         UsersDashboardController::class,'Products'
      ]);
       Route::get('team',[
         UsersDashboardController::class,'Team'
      ]);
      Route::get('logout',[
         UsersDashboardController::class,'Logout'
      ]);
      Route::get('check/in',[
         UsersGetRequestController::class,'CheckIn'
      ]);
      Route::get('tasks',[
         UsersDashboardController::class,'AvailableTasks'
      ]);
      Route::get('task/complete',[
         UsersDashboardController::class,'CompleteTask'
      ]);
      Route::get('get/claim/reward',[
         UsersGetRequestController::class,'ClaimReward'
      ]);
      Route::get('deposit/checkout',[
         UsersDashboardController::class,'Checkout'
      ]);





  });




//   prefix post for users
  Route::prefix('post')->group(function(){
   Route::post('deposit/initiate',[
      UsersPostRequestController::class,'InitiateDeposit'
   ]);
   Route::post('password/update/process',[
      UsersPostRequestController::class,'PasswordUpdate'
   ]);
   Route::post('add/bank/process',[
      UsersPostRequestController::class,'AddBank'
   ]);
   Route::post('withdraw',[
      UsersPostRequestController::class,'Withdraw'
   ]);
   Route::post('task/complete/process',[
      UsersPostRequestController::class,'CompleteTask'
   ]);
   Route::post('manual/deposit/process',[
      UsersPostRequestController::class,'ManualDepositProcess'
   ]);
  });


   // prefix get for users
   Route::prefix('get')->group(function(){
      Route::get('purchase/product',[
      UsersGetRequestController::class,'PurchaseProduct'
      ]);
         Route::get('recommit/product',[
      UsersGetRequestController::class,'RecommitProduct'
      ]);
      Route::get('purchase/product/confirm',[
         UsersGetRequestController::class,'PurchaseProductConfirm'
      ]);
      Route::get('recommit/product/confirm',[
         UsersGetRequestController::class,'RecommitProductConfirm'
      ]);
      Route::get('deposit/complete',[
         UsersGetRequestController::class,'DepositComplete'
      ]);
      Route::get('banks',[
         UsersGetRequestController::class,'GetBanks'
      ]);
      Route::get('bank/auto/verify',[
         UsersGetRequestController::class,'AutoVerify'
      ]);
      

   });
});



// admins
Route::middleware([AdminsAuthMiddleware::class ])->group(function(){
   Route::get('admins/login',[
   AdminsDashboardController::class,'Login'
]);
Route::get('admins',[
   AdminsDashboardController::class,'Login'
]);
});
Route::post('post/admins/login/process',[
   AdminsPostRequestController::class,'Login'
]);
// prefix admins
Route::middleware([ AdminCheckAuthMiddleware::class ])->group(function(){
   
   Route::prefix('admins')->group(function(){
   Route::get('dashboard',[
      AdminsDashboardController::class,"Dashboard"
   ]);
   Route::get('products/add',[
      AdminsDashboardController::class,'AddProduct'
   ]);
     Route::get('products/manage',[
      AdminsDashboardController::class,'ManageProducts'
   ]);
    Route::get('product/edit',[
      AdminsDashboardController::class,'EditProduct'
   ]);
   Route::get('site/settings',[
      AdminsDashboardController::class,'SiteSettings'
   ]);
   Route::get('transactions',[
      AdminsDashboardController::class,'Transactions'
   ]);
   Route::get('deposits/{status}',[
      AdminsDashboardController::class,'Deposits'
   ]);
   Route::get('withdrawals/{status}',[
      AdminsDashboardController::class,'Withdrawals'
   ]);
   Route::get('users/{status}',[
      AdminsDashboardController::class,'Users'
   ]);
   Route::get('user',[
      AdminsDashboardController::class,'User'
   ]);
   Route::get('users/mark/as/promoter',[
      AdminsGetRequestController::class,'MarkAsPromoter'
   ]);
   Route::get('get/ban/user',[
      AdminsGetRequestController::class,'BanUser'
   ]);
   Route::get('login/as/user',[
      AdminsGetRequestController::class,'LoginAsUser'
   ]);
   Route::get('logs',[
      AdminsDashboardController::class,'SiteLogs'
   ]);
   Route::get('notifications',[
      AdminsDashboardController::class,'Notifications'
   ]);
   Route::get('logout',[
      AdminsDashboardController::class,'Logout'
   ]);
    Route::get('products/purchased',[
      AdminsDashboardController::class,'Purchased'
   ]);
   Route::get('promoters',[
      AdminsDashboardController::class,'Promoters'
   ]);
   Route::get('tasks/add',[
      AdminsDashboardController::class,'AddTask'
   ]);
   Route::get('tasks/manage',[
      AdminsDashboardController::class,'ManageTasks'
   ]);
   Route::get('task/edit',[
      AdminsDashboardController::class,'EditTask'
   ]);
   Route::get('tasks/submitted',[
     AdminsDashboardController::class,'SubmittedTasks'
   ]);
   Route::get('refunds',[
       AdminsDashboardController::class,'Refunds'
       ]);




   // prefix post
Route::prefix('post')->group(function(){
   Route::post('add/products/process',[
      AdminsPostRequestController::class,'AddProduct'
   ]);
    Route::post('edit/products/process',[
      AdminsPostRequestController::class,'EditProduct'
   ]);
   Route::post('finance/settings/process',[
      AdminsPostRequestController::class,'FinanceSettings'
   ]);
   Route::post('bank/settings/process',[
      AdminsPostRequestController::class,'BankSettings'
   ]);
    Route::post('referral/settings/process',[
      AdminsPostRequestController::class,'ReferralSettings'
   ]);
   Route::post('general/settings/process',[
      AdminsPostRequestController::class,'GeneralSettings'
   ]);
   Route::post('credit/user/process',[
      AdminsPostRequestController::class,'CreditUser'
   ]);
    Route::post('debit/user/process',[
      AdminsPostRequestController::class,'DebitUser'
   ]);
   Route::post('add/task/process',[
      AdminsPostRequestController::class,'AddTasks'
   ]);
    Route::post('edit/task/process',[
      AdminsPostRequestController::class,'EditTask'
   ]);
   Route::post('update/user/password/process',[
      AdminsPostRequestController::class,'UpdatePassword'
   ]);
});

// prefix get
Route::prefix('get')->group(function(){
   Route::get('delete/product/confirm',[
      AdminsGetRequestController::class,'DeleteProduct'
   ]);
   Route::get('transaction/alter',[
      AdminsGetRequestController::class,'AlterTrx'
   ]);
   Route::get('transaction/alter/confirm',[
      AdminsGetRequestController::class,'AlterTrxConfirm'
   ]);
   Route::get('mark/as/read',[
      AdminsGetRequestController::class,'MarkAsRead'
   ]);
   Route::get('mark/all/as/read',[
      AdminsGetRequestController::class,'MarkAllAsRead'
   ]);
   Route::get('product/suspend',[
      AdminsGetRequestController::class,'SuspendProduct'
   ]);
   Route::get('asset/withdrawal/portal',[
      AdminsGetRequestController::class,'AssetWithdrawalPortal'
   ]);
   Route::get('task/delete',[
      AdminsGetRequestController::class,'DeleteTask'
   ]);

});


Route::prefix('search')->group(function(){
   Route::get('users',[
      AdminsSearchRequestController::class,'Users'
   ]);
    Route::get('promoters',[
      AdminsSearchRequestController::class,'Promoters'
   ]);
});




});



});
});