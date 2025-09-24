@extends('layout.users.app')
@section('title')
  Assets
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
        
   
   <section class="grid pc-grid-2 no-select w-full g-10">
    @if (!$products->isEmpty())
    <div id="purchase"  class="w-full grid-full x-auto transition-ease-half max-w-500 bg-light grid border-1 border-color-silver h-50 br-1000">
       <div  class="h-full transition-ease-half product-head justify-center bold text-center c-white w-full bg-primary row br-1000 clip-1000">
       Recommit your asset to continue withdrawing
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
                    <button onclick="GetRequest(event,'{{ url('users/get/recommit/product?id='.$data->id.'') }}',this,MyFunc.Prompt)" class="btn-green-3d left-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M254.3,107.91,228.78,56.85a16,16,0,0,0-21.47-7.15L182.44,62.13,130.05,48.27a8.14,8.14,0,0,0-4.1,0L73.56,62.13,48.69,49.7a16,16,0,0,0-21.47,7.15L1.7,107.9a16,16,0,0,0,7.15,21.47l27,13.51,55.49,39.63a8.06,8.06,0,0,0,2.71,1.25l64,16a8,8,0,0,0,7.6-2.1l55.07-55.08,26.42-13.21a16,16,0,0,0,7.15-21.46Zm-54.89,33.37L165,113.72a8,8,0,0,0-10.68.61C136.51,132.27,116.66,130,104,122L147.24,80h31.81l27.21,54.41ZM41.53,64,62,74.22,36.43,125.27,16,115.06Zm116,119.13L99.42,168.61l-49.2-35.14,28-56L128,64.28l9.8,2.59-45,43.68-.08.09a16,16,0,0,0,2.72,24.81c20.56,13.13,45.37,11,64.91-5L188,152.66Zm62-57.87-25.52-51L214.47,64,240,115.06Zm-87.75,92.67a8,8,0,0,1-7.75,6.06,8.13,8.13,0,0,1-1.95-.24L80.41,213.33a7.89,7.89,0,0,1-2.71-1.25L51.35,193.26a8,8,0,0,1,9.3-13l25.11,17.94L126,208.24A8,8,0,0,1,131.82,217.94Z"></path></svg>
                        Recommit
                    </button>
            </div>
        @endforeach
    @endif
 
   </section>
    </section>
@endsection
@section('popup_child')
    <div class="column w-full align-center g-10 p-10">
     <svg height="70" width="70" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M57.16 8.42l-52 104c-1.94 4.02-.26 8.85 3.75 10.79c1.08.52 2.25.8 3.45.81h104c4.46-.04 8.05-3.69 8.01-8.15a8.123 8.123 0 0 0-.81-3.45l-52-104a8.067 8.067 0 0 0-14.4 0z" fill="#f2a600"> </path> <path d="M53.56 15.72l-48.8 97.4c-1.83 3.77-.25 8.31 3.52 10.14c.99.48 2.08.74 3.18.76h97.5a7.55 7.55 0 0 0 7.48-7.62a7.605 7.605 0 0 0-.78-3.28l-48.7-97.4a7.443 7.443 0 0 0-9.93-3.47a7.484 7.484 0 0 0-3.47 3.47z" fill="#ffcc32"> </path> <g opacity=".2" fill="#424242"> <path d="M64.36 34.02c4.6 0 8.3 3.7 8 8l-3.4 48c-.38 2.54-2.74 4.3-5.28 3.92a4.646 4.646 0 0 1-3.92-3.92l-3.4-48c-.3-4.3 3.4-8 8-8"> </path> <path d="M64.36 98.02c3.31 0 6 2.69 6 6s-2.69 6-6 6s-6-2.69-6-6s2.69-6 6-6"> </path> </g> <linearGradient id="IconifyId17ecdb2904d178eab21432" gradientUnits="userSpaceOnUse" x1="68" y1="-1808.36" x2="68" y2="-1887.05" gradientTransform="matrix(1 0 0 -1 -3.64 -1776.09)"> <stop offset="0" stop-color="#424242"> </stop> <stop offset="1" stop-color="#212121"> </stop> </linearGradient> <path d="M64.36 34.02c4.6 0 8.3 3.7 8 8l-3.4 48c-.38 2.54-2.74 4.3-5.28 3.92a4.646 4.646 0 0 1-3.92-3.92l-3.4-48c-.3-4.3 3.4-8 8-8z" fill="url(#IconifyId17ecdb2904d178eab21432)"> </path> <linearGradient id="IconifyId17ecdb2904d178eab21433" gradientUnits="userSpaceOnUse" x1="64.36" y1="-1808.36" x2="64.36" y2="-1887.05" gradientTransform="matrix(1 0 0 -1 0 -1772.11)"> <stop offset="0" stop-color="#424242"> </stop> <stop offset="1" stop-color="#212121"> </stop> </linearGradient> <circle cx="64.36" cy="104.02" r="6" fill="url(#IconifyId17ecdb2904d178eab21433)"> </circle> <path d="M53.56 23.02c-1.2 1.5-21.4 41-21.4 41s-1.8 3 .7 4.7c2.3 1.6 4.4-.3 5.3-1.8s19.2-36.9 19.9-38.6c.6-1.87.18-3.91-1.1-5.4c-1.3-1.2-2.6-1-3.4.1z" fill="#fff170"> </path> <circle cx="31.36" cy="75.33" r="3.3" fill="#fff170"> </circle> </g></svg>
        <div class="column w-full g-10">
            <strong class="desc x-auto c-primary text-center font-cinzel-decorative">Important Notice</strong>
        
          
       
        
        
       
       <span class="font-1 text-center">You may recommit to a higher asset, a lower asset, or continue with your current asset level to manage your earnings and keep withdrawing from the platform.</span>
        <button onclick="HidePopUp()" class="btn-blue br-1000 clip-1000 w-full br-5 clip-5">
           
        Understood</button>
        
        </div>
    </div>
@endsection
@section('js')
    <script class="js">
       
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
