@extends('layout.users.app')
@section('title')
    Dashboard
@endsection
@section('css')
    <style class="css">
        .tracker.active{
            background:var(--primary) !important;
        }
        .flyer.active{
            display:flex !important;
            animation:trans-in-from-right 0.2s linear forwards;
        }
        

    </style>
@endsection
@section('main')
    <section class="column w-full p-10 g-10">
          <div class="w-full x-auto bg-primary column c-white p-20 br-10 no-select max-w-500 g-5">
            <strong>Total Balance</strong>
            <div class="row space-between w-full g-10">
                <strong class="desc">&#8358;{{ number_format(Auth::guard('users')->user()->deposit + Auth::guard('users')->user()->withdrawal,2) }}</strong>
<strong class="pointer p-10 bg-white c-primary br-10 box-shadow" onclick="spa(event,'{{ url('users/recharge') }}')">Add Funds</strong>
            </div>
        </div>
   <div class="grid br-10 grid-4 pc-grid-4 w-full g-10 bg-light p-10">
    <div onclick="spa(event,'{{ url('users/invite') }}')" class="column align-center g-5">
       <div class="p-10 bg-white-light column justify-center br-10 w-fit">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M237.66,106.35l-80-80A8,8,0,0,0,144,32V72.35c-25.94,2.22-54.59,14.92-78.16,34.91-28.38,24.08-46.05,55.11-49.76,87.37a12,12,0,0,0,20.68,9.58h0c11-11.71,50.14-48.74,107.24-52V192a8,8,0,0,0,13.66,5.65l80-80A8,8,0,0,0,237.66,106.35ZM160,172.69V144a8,8,0,0,0-8-8c-28.08,0-55.43,7.33-81.29,21.8a196.17,196.17,0,0,0-36.57,26.52c5.8-23.84,20.42-46.51,42.05-64.86C99.41,99.77,127.75,88,152,88a8,8,0,0,0,8-8V51.32L220.69,112Z"></path></svg>
     </div> 
       <span class="c-text">Refer & Earn</span>
    </div>
    <div onclick="spa(event,'{{ url('users/team') }}')" class="column align-center g-5">
       <div class="p-10 bg-white-light column justify-center br-10 w-fit">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path></svg>
       </div> 
       <span class="c-text">My Team</span>
    </div>
    @if ($spinned > 0)
     <div onclick="spa(event,'{{ url('users/products') }}')" class="column active align-center g-5">
       <div class="p-10 bg-white-light column justify-center br-10 w-fit">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M224,64H176V56a24,24,0,0,0-24-24H104A24,24,0,0,0,80,56v8H32A16,16,0,0,0,16,80V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V80A16,16,0,0,0,224,64ZM96,56a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96ZM224,80v32H192v-8a8,8,0,0,0-16,0v8H80v-8a8,8,0,0,0-16,0v8H32V80Zm0,112H32V128H64v8a8,8,0,0,0,16,0v-8h96v8a8,8,0,0,0,16,0v-8h32v64Z"></path></svg>
      </div> 
       <span class="c-text">My Asset</span>
    </div>
    @else
     <div onclick="spa(event,'{{ url('users/spin') }}')" class="column active align-center g-5">
       <div class="p-10 bg-white-light column justify-center br-10 w-fit">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="Var(--text)" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm87.63,96H191.48A64.1,64.1,0,0,0,136,64.52V40.37A88.13,88.13,0,0,1,215.63,120ZM120,120H80.68A48.09,48.09,0,0,1,120,80.68Zm0,16v39.32A48.09,48.09,0,0,1,80.68,136Zm16,0h39.32A48.09,48.09,0,0,1,136,175.32Zm0-16V80.68A48.09,48.09,0,0,1,175.32,120ZM120,40.37V64.52A64.1,64.1,0,0,0,64.52,120H40.37A88.13,88.13,0,0,1,120,40.37ZM40.37,136H64.52A64.1,64.1,0,0,0,120,191.48v24.15A88.13,88.13,0,0,1,40.37,136ZM136,215.63V191.48A64.1,64.1,0,0,0,191.48,136h24.15A88.13,88.13,0,0,1,136,215.63Z"></path></svg>
          </div> 
       <span class="c-text">Daily Spin</span>
    </div>
        
    @endif
     <div onclick="spa(event,'{{ url('users/wallet') }}')" class="column align-center g-5">
       <div class="p-10 bg-white-light column justify-center br-10 w-fit">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M88,64a8,8,0,0,1,8-8H216a8,8,0,0,1,0,16H96A8,8,0,0,1,88,64Zm128,56H96a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Zm0,64H96a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16ZM56,56H40a8,8,0,0,0,0,16H56a8,8,0,0,0,0-16Zm0,64H40a8,8,0,0,0,0,16H56a8,8,0,0,0,0-16Zm0,64H40a8,8,0,0,0,0,16H56a8,8,0,0,0,0-16Z"></path></svg>
       </div> 
       <span class="c-text">Transactions</span>
    </div>
   </div>
   <section class="grid pc-grid-2 no-select w-full g-10">
    @if (!$products->isEmpty())
    <div id="purchase"  class="w-full grid-full x-auto transition-ease-half max-w-500 bg-light grid border-1 border-color-silver h-50 br-1000">
       <div  class="h-full transition-ease-half product-head justify-center bold text-center c-white w-full bg-primary row br-1000 clip-1000">
        Purchase Assests to perform Tasks
       </div>
         
    </div>
        @foreach ($products as $data)
            <div class="w-full {{ $data->type }}-product {{ $data->type == 'premium' ? 'display-none' : '' }} g-10 column br-10 p-10 box-shadow bg-light">
                <div class="row space-between w-full g-10">
                    <img class="h-70 perfect-square clip-circle circle border-4 border-color-primary" src="{{ asset('products/'.$data->photo.'') }}" alt="">
                <div class="column right-auto g-5">
                    <strong class="font-1">{{ $data->name }}</strong>
                    <strong class="desc c-green">&#8358;{{ number_format($data->price,2) }}</strong>
                </div>
                <div class="status green">active</div>
                </div>
                <hr>
                 <div class="row space-between">
                    <div class="row g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>

                        <strong>Duration:</strong>
                        <span class="c-green bold font-1">{{ number_format($data->cycle) }} Days</span>
                    </div>
                     
                </div>
                 <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-64-56a16,16,0,1,1-16-16A16,16,0,0,1,144,152Z"></path></svg>

                        <strong>Daily Tasks:</strong>
                        <span class="c-green bold font-1">{{ number_format($data->daily_tasks) }}</span>
                    </div>
                    <div class="row g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M207.58,63.84C186.85,53.48,159.33,48,128,48S69.15,53.48,48.42,63.84,16,88.78,16,104v48c0,15.22,11.82,29.85,32.42,40.16S96.67,208,128,208s58.85-5.48,79.58-15.84S240,167.22,240,152V104C240,88.78,228.18,74.15,207.58,63.84ZM128,64c62.64,0,96,23.23,96,40s-33.36,40-96,40-96-23.23-96-40S65.36,64,128,64Zm-8,95.86v32c-19-.62-35-3.42-48-7.49V153.05A203.43,203.43,0,0,0,120,159.86Zm16,0a203.43,203.43,0,0,0,48-6.81v31.31c-13,4.07-29,6.87-48,7.49ZM32,152V133.53a82.88,82.88,0,0,0,16.42,10.63c2.43,1.21,5,2.35,7.58,3.43V178C40.17,170.16,32,160.29,32,152Zm168,26V147.59c2.61-1.08,5.15-2.22,7.58-3.43A82.88,82.88,0,0,0,224,133.53V152C224,160.29,215.83,170.16,200,178Z"></path></svg>

                        <strong>Income per Task:</strong>
                        <span class="c-green bold font-1">&#8358;{{ number_format($data->income_per_task,2) }}</span>
                    </div>
                    <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M80,120h96a8,8,0,0,0,8-8V64a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8v48A8,8,0,0,0,80,120Zm8-48h80v32H88ZM200,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24Zm0,192H56V40H200ZM100,148a12,12,0,1,1-12-12A12,12,0,0,1,100,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,148Zm-80,40a12,12,0,1,1-12-12A12,12,0,0,1,100,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,188Z"></path></svg>

                        <strong>Total Income:</strong>
                        <span class="c-green bold font-1">&#8358;{{ number_format($data->income_per_task * $data->daily_tasks * $data->cycle,2) }}</span>
                    </div>
                     <div class="row g-5 align-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M216,64H56a8,8,0,0,1,0-16H192a8,8,0,0,0,0-16H56A24,24,0,0,0,32,56V184a24,24,0,0,0,24,24H216a16,16,0,0,0,16-16V80A16,16,0,0,0,216,64Zm0,128H56a8,8,0,0,1-8-8V78.63A23.84,23.84,0,0,0,56,80H216Zm-48-60a12,12,0,1,1,12,12A12,12,0,0,1,168,132Z"></path></svg>

                        <strong>Minimum Withdrawal:</strong>
                        <span class="c-green bold font-1">&#8358;{{ number_format($data->minimum_withdrawal,2) }}</span>
                    </div>
                    <button onclick="GetRequest(event,'{{ url('users/get/purchase/product?id='.$data->id.'') }}',this,MyFunc.Prompt)" class="btn-green-3d left-auto">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="CurrentColor" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V72H40V56Zm0,144H40V88H216V200Zm-40-88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"></path></svg>
                        Purchase
                    </button>
            </div>
        @endforeach
    @endif
 
   </section>
    </section>
@endsection
@section('popup_child')
    <div class="column w-full align-center g-10 p-10">
        <svg height="70px" width="70px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFAA00;" d="M256,100.174c-27.619,0-50.087-22.468-50.087-50.087S228.381,0,256,0s50.087,22.468,50.087,50.087 S283.619,100.174,256,100.174z M256,33.391c-9.196,0-16.696,7.5-16.696,16.696s7.5,16.696,16.696,16.696 c9.196,0,16.696-7.5,16.696-16.696S265.196,33.391,256,33.391z"></path> <path style="fill:#F28D00;" d="M256.006,0v33.394c9.194,0.003,16.69,7.5,16.69,16.693s-7.496,16.69-16.69,16.693v33.394 c27.618-0.004,50.081-22.469,50.081-50.087S283.624,0.004,256.006,0z"></path> <path style="fill:#FFAA00;" d="M256,512c-46.043,0-83.478-37.435-83.478-83.478c0-9.228,7.467-16.696,16.696-16.696h133.565 c9.228,0,16.696,7.467,16.696,16.696C339.478,474.565,302.043,512,256,512z"></path> <path style="fill:#F28D00;" d="M322.783,411.826h-66.777V512c46.042-0.004,83.473-37.437,83.473-83.478 C339.478,419.293,332.011,411.826,322.783,411.826z"></path> <path style="fill:#FFDA44;" d="M439.652,348.113v-97.678C439.642,149,357.435,66.793,256,66.783 C154.565,66.793,72.358,149,72.348,250.435v97.678c-19.41,6.901-33.384,25.233-33.391,47.017 c0.01,27.668,22.419,50.075,50.087,50.085h333.913c27.668-0.01,50.077-22.417,50.087-50.085 C473.036,373.346,459.063,355.014,439.652,348.113z"></path> <path style="fill:#FFAA00;" d="M439.652,348.113v-97.678C439.642,149,357.435,66.793,256,66.783v378.432h166.957 c27.668-0.01,50.077-22.417,50.087-50.085C473.036,373.346,459.063,355.014,439.652,348.113z"></path> <path style="fill:#FFF3DB;" d="M155.826,267.13c-9.228,0-16.696-7.467-16.696-16.696c0-47.022,28.011-89.283,71.381-107.641 c8.446-3.587,18.294,0.326,21.88,8.836c3.62,8.51-0.358,18.294-8.836,21.88c-31.012,13.142-51.033,43.337-51.033,76.925 C172.522,259.663,165.054,267.13,155.826,267.13z"></path> </g></svg>
        <div class="column w-full g-10">
            <strong class="desc x-auto c-primary text-center font-cinzel-decorative">Welcome to {{ config('app.name') }}</strong>
       <div>
        {!! nl2br($general_settings->notification_message) !!}
       </div>
        <button onclick="window.open('{{ $general_settings->telegram_group }}')" class="btn-blue-3d w-full br-5 clip-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M228.88,26.19a9,9,0,0,0-9.16-1.57L17.06,103.93a14.22,14.22,0,0,0,2.43,27.21L72,141.45V200a15.92,15.92,0,0,0,10,14.83,15.91,15.91,0,0,0,17.51-3.73l25.32-26.26L165,220a15.88,15.88,0,0,0,10.51,4,16.3,16.3,0,0,0,5-.79,15.85,15.85,0,0,0,10.67-11.63L231.77,35A9,9,0,0,0,228.88,26.19Zm-61.14,36L78.15,126.35l-49.6-9.73ZM88,200V152.52l24.79,21.74Zm87.53,8L92.85,135.5l119-85.29Z"></path></svg>

            JOIN TELEGRAM COMMUNITY</button>
         <button onclick="window.open('{{ $general_settings->whatsapp_group }}')" class="btn-green-3d w-full br-5 clip-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" viewBox="0 0 256 256"><path d="M187.58,144.84l-32-16a8,8,0,0,0-8,.5l-14.69,9.8a40.55,40.55,0,0,1-16-16l9.8-14.69a8,8,0,0,0,.5-8l-16-32A8,8,0,0,0,104,64a40,40,0,0,0-40,40,88.1,88.1,0,0,0,88,88,40,40,0,0,0,40-40A8,8,0,0,0,187.58,144.84ZM152,176a72.08,72.08,0,0,1-72-72A24,24,0,0,1,99.29,80.46l11.48,23L101,118a8,8,0,0,0-.73,7.51,56.47,56.47,0,0,0,30.15,30.15A8,8,0,0,0,138,155l14.61-9.74,23,11.48A24,24,0,0,1,152,176ZM128,24A104,104,0,0,0,36.18,176.88L24.83,210.93a16,16,0,0,0,20.24,20.24l34.05-11.35A104,104,0,1,0,128,24Zm0,192a87.87,87.87,0,0,1-44.06-11.81,8,8,0,0,0-6.54-.67L40,216,52.47,178.6a8,8,0,0,0-.66-6.54A88,88,0,1,1,128,216Z"></path></svg>

            JOIN WHATSAPP COMMUNITY</button>
        </div>
    </div>
@endsection
@section('js')
    <script class="js">
       @if($purchase !== '' && $total == 0)
        CreateNotify('error','Purchase asset to be able to perform tasks');

       @endif
       PopUp()
        //SlideUp();
        window.MyFunc={
            AutoToggle : function(){
                let i=1;
                setInterval(()=>{
                  // CreateNotify('error',i)
                     let total=document.querySelectorAll('.flyer').length;
                    document.querySelectorAll('.flyer').forEach((flyer)=>{
                        flyer.classList.remove('active');
                    });
                    document.querySelectorAll('.tracker').forEach((tracker)=>{
                        tracker.classList.remove('active');
                    });
                    document.querySelector(`.flyer-${i >= 3 ? 1 : i+1}`).classList.add('active');
                     document.querySelector(`.tracker-${i >= 3 ? 1 : i+1}`).classList.add('active');
                   i=i >= total ? 1 : i+1;
                },5000)
            },
            Prompt : function(response){
                SlideUp(response)
            },
            Confirmed : function(response,event){
                let data=JSON.parse(response);
                CreateNotify(data.status,data.message);
                if(data.status == 'success'){
                    HideSlideUp();
                    spa(event,data.url);
                    
                }
            },
            CheckedIn : function(response,event){
                let data=JSON.parse(response);
                CreateNotify(data.status,data.message);
                if(data.status == 'success'){
                    spa(event,data.url);
                }
            },
            PopUpHidden : function(){
                sessionStorage.setItem('popped_up','true');
            },
            PopUp : function(){
                let popped_up=sessionStorage.getItem('popped_up') ?? false;
                if(!popped_up){
                    PopUp();
                }
            }
        }
        
        MyFunc.AutoToggle();
        MyFunc.PopUp();
    </script>
@endsection
