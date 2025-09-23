<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DailyRewardsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      $purchased=DB::table('purchased')->where('status','active')->get();
    
      foreach($purchased as $data){
        $diff=Carbon::parse($data->date)->diffInDays();
        $validity=json_decode($data->json ?? '{}')->cycle;
        if($diff > $validity){
            DB::table('purchased')->where('id',$data->id)->update([
                'status' => 'expired'
            ]);
        }
       
      }
     
        return $next($request);
    }
}
