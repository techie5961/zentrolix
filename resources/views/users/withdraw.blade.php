@extends('layout.users.app')
@section('title')
    Withdraw
@endsection
@section('main')
    <section class="section1 column g-10 p-10">
        <div class="column max-w-500 x-auto w-full g-10 p-10 bg-light box-shadow br-10">
          <div class="w-full p-10 column g-10 br-10 c-white no-select bg-primary">
            <strong class="text-light">Withdrawable Balance</strong>
            <strong class="desc">&#8358;{{ number_format(Auth::guard('users')->user()->withdrawal,2) }}</strong>
          </div>
           @if (!empty((array) $bank))
            <div class="column max-w-500 g-10 space-between br-10 box-shadoww bg-dim p-10 w-full">
            <div class="row w-full g-10 align-center">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"></path></svg>

                 <span>Bank Details</span>
                 <span onclick="spa(event,'{{ url('users/bank') }}')" class="left-auto row align-center pointer c-primary no-select">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary)" viewBox="0 0 256 256"><path d="M201.54,54.46A104,104,0,0,0,54.46,201.54,104,104,0,0,0,201.54,54.46ZM96,210V152h64v58a88.33,88.33,0,0,1-64,0Zm48-74H112V100.94l32-16Zm46.22,54.22A88.09,88.09,0,0,1,176,201.77V152a16,16,0,0,0-16-16V72a8,8,0,0,0-11.58-7.16l-48,24A8,8,0,0,0,96,96v40a16,16,0,0,0-16,16v49.77a88,88,0,1,1,110.22-11.55Z"></path></svg>
                             
                    Edit
                </span>
            </div>
            <hr class="bg-primary">
            <div class="row g-10 align-center">
                <strong>Account Number:</strong>
                <span>{{ $bank->account_number }}</span>
            </div>
             <div class="row g-10 align-center">
                <strong>Bank Name:</strong>
                <span>{{ $bank->bank_name }}</span>
            </div>
             <div class="row g-10 align-center">
                <strong>Account Name:</strong>
                <span>{{ $bank->account_name }}</span>
            </div>
        </div>
       @endif
          <form action="{{ url('users/post/withdraw') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Initiated)" class="column w-full g-20">
            <input type="hidden" name="_token" class="input" value="{{ @csrf_token() }}">
            <div class="cont row space-between h-50 w-full br-10 border-color-silver border-1">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="h-full column c-primary no-select perfect-square justify-center text-center">&#8358;</div>
                <input placeholder="Enter Withdrawal Amount" type="number" name="amount" class="inp bg-transparent required amount input w-full h-full no-border br-10">
            </div>
            <button class="post">Withdraw</button>
          </form>
        </div>
        <div class="w-full bg-light box-shadow p-10 g-10 column br-10 top-20">
            <strong class="desc c-primary">Withdrawal Instructions</strong>
           @if ($minimum_withdrawal > 0)
                <span>- Minimum Withdrawal is &#8358;{{ number_format($minimum_withdrawal,2) }}.</span>
           @endif
            <span>- Withdrawal fee is {{ number_format($finance_settings->withdrawal_fee) }}%.</span>
            @if ($withdrawal_portal !== 'null')
                @if ($withdrawal_portal == 'open')
                 <span>- {{ $asset->name ?? '' }} Withdrawal portal is currently open.</span>
                 @else
                  <span>- {{ $asset->name ?? '' }} Withdrawal portal is currently closed.</span>
            @endif
            @endif
              <span>- Please Ensure to confirm your linked Bank details before proceeding.</span>
                <span>- Withdrawals are sent to your provided bank account above.</span>
                 <span>- Withdrawals are processed between 1 to 24 hrs but might exceed if there are many requests to attend to.</span>
                
        </div>
    </section>
@endsection
@section('popup_child')
    <div class="column w-full align-center g-10 p-10">
     <svg height="70" width="70" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M57.16 8.42l-52 104c-1.94 4.02-.26 8.85 3.75 10.79c1.08.52 2.25.8 3.45.81h104c4.46-.04 8.05-3.69 8.01-8.15a8.123 8.123 0 0 0-.81-3.45l-52-104a8.067 8.067 0 0 0-14.4 0z" fill="#f2a600"> </path> <path d="M53.56 15.72l-48.8 97.4c-1.83 3.77-.25 8.31 3.52 10.14c.99.48 2.08.74 3.18.76h97.5a7.55 7.55 0 0 0 7.48-7.62a7.605 7.605 0 0 0-.78-3.28l-48.7-97.4a7.443 7.443 0 0 0-9.93-3.47a7.484 7.484 0 0 0-3.47 3.47z" fill="#ffcc32"> </path> <g opacity=".2" fill="#424242"> <path d="M64.36 34.02c4.6 0 8.3 3.7 8 8l-3.4 48c-.38 2.54-2.74 4.3-5.28 3.92a4.646 4.646 0 0 1-3.92-3.92l-3.4-48c-.3-4.3 3.4-8 8-8"> </path> <path d="M64.36 98.02c3.31 0 6 2.69 6 6s-2.69 6-6 6s-6-2.69-6-6s2.69-6 6-6"> </path> </g> <linearGradient id="IconifyId17ecdb2904d178eab21432" gradientUnits="userSpaceOnUse" x1="68" y1="-1808.36" x2="68" y2="-1887.05" gradientTransform="matrix(1 0 0 -1 -3.64 -1776.09)"> <stop offset="0" stop-color="#424242"> </stop> <stop offset="1" stop-color="#212121"> </stop> </linearGradient> <path d="M64.36 34.02c4.6 0 8.3 3.7 8 8l-3.4 48c-.38 2.54-2.74 4.3-5.28 3.92a4.646 4.646 0 0 1-3.92-3.92l-3.4-48c-.3-4.3 3.4-8 8-8z" fill="url(#IconifyId17ecdb2904d178eab21432)"> </path> <linearGradient id="IconifyId17ecdb2904d178eab21433" gradientUnits="userSpaceOnUse" x1="64.36" y1="-1808.36" x2="64.36" y2="-1887.05" gradientTransform="matrix(1 0 0 -1 0 -1772.11)"> <stop offset="0" stop-color="#424242"> </stop> <stop offset="1" stop-color="#212121"> </stop> </linearGradient> <circle cx="64.36" cy="104.02" r="6" fill="url(#IconifyId17ecdb2904d178eab21433)"> </circle> <path d="M53.56 23.02c-1.2 1.5-21.4 41-21.4 41s-1.8 3 .7 4.7c2.3 1.6 4.4-.3 5.3-1.8s19.2-36.9 19.9-38.6c.6-1.87.18-3.91-1.1-5.4c-1.3-1.2-2.6-1-3.4.1z" fill="#fff170"> </path> <circle cx="31.36" cy="75.33" r="3.3" fill="#fff170"> </circle> </g></svg>
        <div class="column w-full g-10">
            <strong class="desc x-auto c-primary text-center font-cinzel-decorative">Asset Recommit Required</strong>
        
          
       
        
        
       
       <span class="font-1 text-center">To maintain a sustainable system and ensure continuous benefits for all users, recommitment is required once your withdrawals equal your initial asset value. Please recommit to continue enjoying your daily earnings and withdrawals.</span>
        <button onclick="spa(event,'{{ url('users/assets') }}')" class="btn-blue br-1000 clip-1000 w-full br-5 clip-5">
           
        Go to  Recommit</button>
        
        </div>
    </div>
@endsection
@section('js')
    <script class="js">
     
      window.MyFunc = {
        Initiated : function(response){
          let data=JSON.parse(response);
          if(data.recommit){
            PopUp();
          }
          if(data.status == 'success'){
            spa(event,data.url)
          }
        }
      }
    </script>
@endsection