@extends('layout.users.app')
@section('title')
    My Products
@endsection
@section('main')
    <section class="w-full flex-auto justify-center column g-10 p-10">

   @if (!empty($data))
        <div class="w-full max-w-500 column g-5 br-10 bg-light p-10">
        <strong class="desc">My Product</strong>
        <span class="font-1 bold">
            <span class="c-green">{{ $data->json->name }}</span>
            <span>is currently active</span>
        </span>
        <div class="w-full grid grid-2 g-5">
            <div class="w-full br-10 bg-green-transparent p-10 column g-10">
                <div style="border-bottom:0.1px solid #708090" class="w-full p-y-5 g-5 column">
                    <div class="row g-10 align-center space-between">
                        <strong>Daily Tasks</strong>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#006eff" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM169.66,133.66l-48,48a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L116,164.69l42.34-42.35a8,8,0,0,1,11.32,11.32ZM48,80V48H72v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80Z"></path></svg>

                    </div>
                    <strong class="desc x-auto c-green">{{ number_format($data->json->daily_tasks) }}</strong>
                </div>
                 <div class="w-full p-y-5 g-5 column">
                    <div class="row g-10 align-center space-between">
                        <strong>Income per Task</strong>
                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00ff59" viewBox="0 0 256 256"><path d="M207.58,63.84C186.85,53.48,159.33,48,128,48S69.15,53.48,48.42,63.84,16,88.78,16,104v48c0,15.22,11.82,29.85,32.42,40.16S96.67,208,128,208s58.85-5.48,79.58-15.84S240,167.22,240,152V104C240,88.78,228.18,74.15,207.58,63.84Zm-87.58,96v32c-19-.62-35-3.42-48-7.49V153.05A203.43,203.43,0,0,0,120,159.86Zm16,0a203.43,203.43,0,0,0,48-6.81v31.31c-13,4.07-29,6.87-48,7.49ZM32,152V133.53a82.88,82.88,0,0,0,16.42,10.63c2.43,1.21,5,2.35,7.58,3.43V178C40.17,170.16,32,160.29,32,152Zm168,26V147.59c2.61-1.08,5.15-2.22,7.58-3.43A82.88,82.88,0,0,0,224,133.53V152C224,160.29,215.83,170.16,200,178Z"></path></svg>

                    </div>
                    <strong class="desc c-green x-auto">&#8358;{{ number_format($data->json->income_per_task,2) }}</strong>
                </div>
                
            </div>
           <div class="grid g-5 w-full h-full">
             <div class="w-full br-10 bg-green-transparent p-10 column g-10">
                 <div class="w-full g-5 column">
                    <div class="row g-10 align-center space-between">
                        <strong>Expires</strong>
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffae00" viewBox="0 0 256 256"><path d="M61.66,37.66l-32,32A8,8,0,0,1,18.34,58.34l32-32A8,8,0,0,1,61.66,37.66Zm176,20.68-32-32a8,8,0,0,0-11.32,11.32l32,32a8,8,0,0,0,11.32-11.32ZM224,136a96,96,0,1,1-96-96A96.11,96.11,0,0,1,224,136Zm-32,0a8,8,0,0,0-8-8H136V80a8,8,0,0,0-16,0v56a8,8,0,0,0,8,8h56A8,8,0,0,0,192,136Z"></path></svg>
                    </div>
                    <strong class="desc c-green text-center x-auto">{{ $data->expires }}</strong>
                </div>
            </div>
             <div class="w-full br-10 bg-green-transparent p-10 column g-10">
                  <div class="w-full g-5 column">
                    <div class="row g-10 align-center space-between">
                        <strong>Minimum Withdrawal</strong>
                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00ff59" viewBox="0 0 256 256"><path d="M207.58,63.84C186.85,53.48,159.33,48,128,48S69.15,53.48,48.42,63.84,16,88.78,16,104v48c0,15.22,11.82,29.85,32.42,40.16S96.67,208,128,208s58.85-5.48,79.58-15.84S240,167.22,240,152V104C240,88.78,228.18,74.15,207.58,63.84Zm-87.58,96v32c-19-.62-35-3.42-48-7.49V153.05A203.43,203.43,0,0,0,120,159.86Zm16,0a203.43,203.43,0,0,0,48-6.81v31.31c-13,4.07-29,6.87-48,7.49ZM32,152V133.53a82.88,82.88,0,0,0,16.42,10.63c2.43,1.21,5,2.35,7.58,3.43V178C40.17,170.16,32,160.29,32,152Zm168,26V147.59c2.61-1.08,5.15-2.22,7.58-3.43A82.88,82.88,0,0,0,224,133.53V152C224,160.29,215.83,170.16,200,178Z"></path></svg>

                    </div>
                    <strong class="desc c-green x-auto">&#8358;{{ number_format($data->json->minimum_withdrawal,2) }}</strong>
                </div>
            </div>
           </div>
           <div class="w-full grid-full grid grid-2 br-10 bg-green-transparent p-10 g-10">
                <div style="border-right:0.1px solid #708090;padding-right:5px" class="w-full g-5 column">
                    <div class="row g-10 align-center space-between">
                        <strong>Total Income</strong>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ff00c8" viewBox="0 0 256 256"><path d="M200,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24ZM88,200a12,12,0,1,1,12-12A12,12,0,0,1,88,200Zm0-40a12,12,0,1,1,12-12A12,12,0,0,1,88,160Zm40,40a12,12,0,1,1,12-12A12,12,0,0,1,128,200Zm0-40a12,12,0,1,1,12-12A12,12,0,0,1,128,160Zm40,40a12,12,0,1,1,12-12A12,12,0,0,1,168,200Zm0-40a12,12,0,1,1,12-12A12,12,0,0,1,168,160Zm16-56a8,8,0,0,1-8,8H80a8,8,0,0,1-8-8V64a8,8,0,0,1,8-8h96a8,8,0,0,1,8,8Z"></path></svg>
                    </div>
                    <strong class="desc x-auto c-green">&#8358;{{ number_format(($data->json->daily_tasks * $data->json->income_per_task * $data->json->cycle),2) }}</strong>
                </div>
                 <div class="w-full p-y-5 g-5 column">
                    <div class="row g-10 align-center space-between">
                        <strong>Duration</strong>
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#a09c9c" viewBox="0 0 256 256"><path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm91.06-23.39a8,8,0,0,0-8.72,1.73L206,70.71c-3.23-3.51-6.56-7-10.1-10.59a96,96,0,1,0-2,137.7,8,8,0,0,0-11-11.64A80,80,0,1,1,184.54,71.4c3.54,3.58,6.87,7.1,10.11,10.63L178.34,98.34A8,8,0,0,0,184,112h40a8,8,0,0,0,8-8V64A8,8,0,0,0,227.06,56.61Z"></path></svg>
                    </div>
                    <strong class="desc c-green x-auto">{{ number_format($data->json->cycle) }} Days</strong>
                </div>
                
            </div>
        </div>
    </div>
    
    @else
    @include('components.sections',[
        'null' => true,
        'text' => 'You havent purchased any asset yet <br><a onclick="spa(event,url)" class="c-green pointer u">Click to Purchase</a>'
     ])
   @endif
    </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
        let url='{{ url('users/dashboard') }}';
    </script>
@endsection