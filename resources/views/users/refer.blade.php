@extends('layout.users.app')
@section('title')
    Refer and Earn
@endsection
@section('css')
    <style class="css">
        .main-body,.head{
            background:linear-gradient(180deg,#ff8b3d,#ff5a1e);
            color:white;
        }
        .copy-btn{
            background:rgba(108,92,230);
          
        }
        .copy-btn .det{
            position:relative;
        }
        .copy-btn .det::before{
           position:absolute;
           height:40%;
           width:40%;
           content:'';
           background:white;
           top:0;
           left:0;
           border-radius: 50%;
           filter:blur(10px);
           
        }
         .copy-btn .det::after{
           position:absolute;
           height:20%;
           width:20%;
           content:'';
           background:white;
          bottom:0;
           right:0;
           border-radius: 50%;
           filter:blur(10px);
           
        }
    </style>
@endsection
@section('main')
    <section class="column overflow-auto average pos-fixed top-0 left-0 right-0 bottom-0 bg">
        <div class="row align-center w-full low pos-sticky text no-select space-between bg p-10 pc-x-padding stick-top">
           <div onclick="spa(event,'{{ url('users/dashboard') }}')" class="pc-pointer">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="CurrentColor" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
          
           </div>
            <strong class="font-1">Refer and Earn</strong>
            <span></span>
        </div>
        <div class="main-body overflow-auto column g-10 align-center flex-auto w-full pc-x-padding p-10">
            <img src="{{ asset('images/referral.png') }}" class="w-full max-w-500" alt="">
            <span class="desc font-cinzel-decorative bold">Invite Friends To Earn Money</span>
        
         <div onclick="copy('{{ url('register/ref/'.Auth::guard('users')->user()->username.'') }}')" class="copy-btn max-w-500 pointer c-white w-full h-50 clip-100 bg-white">
           <div class="row overflow-hidden det align-center justify-center no-select p-10 w-full h-full clip-1000">
             <strong>COPY INVITE LINK</strong>
           </div>
         </div>
        <div class="w-full clip-10 g-10 align-center column c-black br-10 bg-white">
             <div class="head row justify-center br-0-0-20-20 w-half p-10">
           Commission Levels
           </div>
            <div class="row w-full border-bottom-1 border-color-silver g-10 align-center p-10">
                <div class="h-40 w-40 circle c-black justify-center column bold font-1 font-cinzel-decorative bg-gold">{{ $referral_settings->first_level }}%</div>
                <span>First Level commission.</span>
            </div>
             <div class="row w-full border-bottom-1 border-color-silver g-10 align-center p-10">
                <div class="h-40 w-40 circle c-black justify-center column bold font-1 font-cinzel-decorative bg-gold">{{ $referral_settings->second_level }}%</div>
                <span>Second Level commission.</span>
            </div>
             <div class="row w-full border-bottom-1 border-color-silver g-10 align-center p-10">
                <div class="h-40 w-40 circle c-black justify-center column bold font-1 font-cinzel-decorative bg-gold">{{ $referral_settings->third_level }}%</div>
                <span>Third Level commission.</span>
            </div>
            
        </div>
          <div class="w-full clip-10 g-10 align-center column c-black br-10 bg-white">
           <div class="head row justify-center br-0-0-20-20 w-half p-10">
            HOW IT WORKS
           </div>
            <div class="row w-full border-bottom-1 border-color-silver g-10 align-center p-10">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ff990a" viewBox="0 0 256 256"><path d="M84,120a44,44,0,1,1,44,44A44,44,0,0,1,84,120Zm126.16,57.18a8.21,8.21,0,0,0-10.86,2.41,87.42,87.42,0,0,1-5.52,6.85A79.76,79.76,0,0,0,172,165.1a4,4,0,0,0-4.84.32,59.8,59.8,0,0,1-78.26,0A4,4,0,0,0,84,165.1a79.71,79.71,0,0,0-21.79,21.31A87.66,87.66,0,0,1,40.37,136h15.4a8.2,8.2,0,0,0,6.69-3.28,8,8,0,0,0-.8-10.38l-24-24a8,8,0,0,0-11.32,0l-24,24a8,8,0,0,0-.8,10.38A8.2,8.2,0,0,0,8.23,136H24.3a104,104,0,0,0,188.18,52.67A8,8,0,0,0,210.16,177.18Zm45.23-52.24A8,8,0,0,0,248,120H231.7A104,104,0,0,0,43.52,67.33a8,8,0,0,0,13,9.34A88,88,0,0,1,215.63,120H200a8,8,0,0,0-5.66,13.66l24,24a8,8,0,0,0,11.32,0l24-24A8,8,0,0,0,255.39,124.94Z"></path></svg>
               <span>Your friend registers through your link.</span>
            </div>
             <div class="row w-full border-bottom-1 border-color-silver g-10 align-center p-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ff990a" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM128,160a48.05,48.05,0,0,1-48-48,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0A48.05,48.05,0,0,1,128,160ZM40,72V56H216V72Z"></path></svg>
                 <span>He/She purchases a product on the site.</span>
            </div>
             <div class="row w-full border-bottom-1 border-color-silver g-10 align-center p-10">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ff990a" viewBox="0 0 256 256"><path d="M184,89.57V84c0-25.08-37.83-44-88-44S8,58.92,8,84v40c0,20.89,26.25,37.49,64,42.46V172c0,25.08,37.83,44,88,44s88-18.92,88-44V132C248,111.3,222.58,94.68,184,89.57ZM56,146.87C36.41,141.4,24,132.39,24,124V109.93c8.16,5.78,19.09,10.44,32,13.57Zm80-23.37c12.91-3.13,23.84-7.79,32-13.57V124c0,8.39-12.41,17.4-32,22.87Zm-16,71.37C100.41,189.4,88,180.39,88,172v-4.17c2.63.1,5.29.17,8,.17,3.88,0,7.67-.13,11.39-.35A121.92,121.92,0,0,0,120,171.41Zm0-44.62A163,163,0,0,1,96,152a163,163,0,0,1-24-1.75V126.46A183.74,183.74,0,0,0,96,128a183.74,183.74,0,0,0,24-1.54Zm64,48a165.45,165.45,0,0,1-48,0V174.4a179.48,179.48,0,0,0,24,1.6,183.74,183.74,0,0,0,24-1.54ZM232,172c0,8.39-12.41,17.4-32,22.87V171.5c12.91-3.13,23.84-7.79,32-13.57Z"></path></svg>
                 <span>You instantly earn commission straight into your wallet which can be withdrawan instantly.</span>
            </div>
            
        </div>
        
        
        
        </div>


      
    </section>
@endsection