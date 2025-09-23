@extends('layout.admins.app')
@section('title')
    Manage Products
@endsection
@section('main')
    <section class="grid w-full p-10 g-10 pc-grid-2">
        @if ($products->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No Products Available'
            ])
        @else
           <strong class="desc grid-full c-primary">All Products</strong>
           @foreach ($products as $data)
               <div class="w-full column br-10 bg-light p-10 g-10 box-shadow">
                <div class="row g-10 space-between">
                    <img src="{{ asset('products/'.$data->photo.'') }}" class="br-10" height="70" width="70" alt="Product Photo">
                <div class="right-auto column">
                    <strong class="font-1">{{ $data->name }}</strong>
                    <strong class="desc c-primary">&#8358;{{ number_format($data->price,2) }}</strong>
                    <div class="row g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm88-24a8,8,0,0,0-8,8V82c-6.35-7.36-12.83-14.45-20.12-21.83a96,96,0,1,0-2,137.7,8,8,0,0,0-11-11.64A80,80,0,1,1,184.54,71.4C192.68,79.64,199.81,87.58,207,96H184a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V64A8,8,0,0,0,224,56Z"></path></svg>

                        <span class="text-light text-small">Last Updated {{ $data->frame }}</span>
                    </div>
                </div>
                <div class="status {{ $data->status == 'active' ? 'green' : gold }}">{{ $data->status }}</div>
                </div>
                <hr>
                 {{-- <div class="row space-between">
                    <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M224,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48Zm0,144H32V64H224V192Zm-16-64a8,8,0,0,1-8,8H56a8,8,0,0,1,0-16H200A8,8,0,0,1,208,128Zm0-32a8,8,0,0,1-8,8H56a8,8,0,0,1,0-16H200A8,8,0,0,1,208,96ZM72,160a8,8,0,0,1-8,8H56a8,8,0,0,1,0-16h8A8,8,0,0,1,72,160Zm96,0a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h64A8,8,0,0,1,168,160Zm40,0a8,8,0,0,1-8,8h-8a8,8,0,0,1,0-16h8A8,8,0,0,1,208,160Z"></path></svg>

                        <strong>Product Type:</strong>
                        <span class="c-primary">{{ ucfirst($data->type) }} Product</span>
                    </div>
                     
                </div> --}}
                <div class="row space-between">
                    <div class="row g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>

                        <strong>Cycle:</strong>
                        <span class="c-primary">{{ number_format($data->cycle) }} Days</span>
                    </div>
                     
                </div>
                 <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-64-56a16,16,0,1,1-16-16A16,16,0,0,1,144,152Z"></path></svg>

                        <strong>Daily Tasks:</strong>
                        <span class="c-primary">{{ number_format($data->daily_tasks) }}</span>
                    </div>
                <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M207.58,63.84C186.85,53.48,159.33,48,128,48S69.15,53.48,48.42,63.84,16,88.78,16,104v48c0,15.22,11.82,29.85,32.42,40.16S96.67,208,128,208s58.85-5.48,79.58-15.84S240,167.22,240,152V104C240,88.78,228.18,74.15,207.58,63.84ZM128,64c62.64,0,96,23.23,96,40s-33.36,40-96,40-96-23.23-96-40S65.36,64,128,64Zm-8,95.86v32c-19-.62-35-3.42-48-7.49V153.05A203.43,203.43,0,0,0,120,159.86Zm16,0a203.43,203.43,0,0,0,48-6.81v31.31c-13,4.07-29,6.87-48,7.49ZM32,152V133.53a82.88,82.88,0,0,0,16.42,10.63c2.43,1.21,5,2.35,7.58,3.43V178C40.17,170.16,32,160.29,32,152Zm168,26V147.59c2.61-1.08,5.15-2.22,7.58-3.43A82.88,82.88,0,0,0,224,133.53V152C224,160.29,215.83,170.16,200,178Z"></path></svg>

                        <strong>Income per Task:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->income_per_task,2) }}</span>
                    </div>
                      <div class="row g-5 align-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M80,120h96a8,8,0,0,0,8-8V64a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8v48A8,8,0,0,0,80,120Zm8-48h80v32H88ZM200,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24Zm0,192H56V40H200ZM100,148a12,12,0,1,1-12-12A12,12,0,0,1,100,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,148Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,148Zm-80,40a12,12,0,1,1-12-12A12,12,0,0,1,100,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,140,188Zm40,0a12,12,0,1,1-12-12A12,12,0,0,1,180,188Z"></path></svg>

                        <strong>Maximum Total Income:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->income_per_task * $data->daily_tasks * $data->cycle,2) }}</span>
                    </div>
                    <div class="row g-5 align-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M216,48V88a8,8,0,0,1-16,0V56H168a8,8,0,0,1,0-16h40A8,8,0,0,1,216,48ZM88,200H56V168a8,8,0,0,0-16,0v40a8,8,0,0,0,8,8H88a8,8,0,0,0,0-16Zm120-40a8,8,0,0,0-8,8v32H168a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V168A8,8,0,0,0,208,160ZM88,40H48a8,8,0,0,0-8,8V88a8,8,0,0,0,16,0V56H88a8,8,0,0,0,0-16Z"></path></svg>

                        <strong>Purchase Limit:</strong>
                        <span class="c-primary">{{ number_format($data->purchase_limit) }}</span>
                    </div>
                      <div class="row g-5 align-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M216,64H56a8,8,0,0,1,0-16H192a8,8,0,0,0,0-16H56A24,24,0,0,0,32,56V184a24,24,0,0,0,24,24H216a16,16,0,0,0,16-16V80A16,16,0,0,0,216,64Zm0,128H56a8,8,0,0,1-8-8V78.63A23.84,23.84,0,0,0,56,80H216Zm-48-60a12,12,0,1,1,12,12A12,12,0,0,1,168,132Z"></path></svg>

                        <strong>Minimum Withdrawal:</strong>
                        <span class="c-primary">&#8358;{{ number_format($data->minimum_withdrawal,2) }}</span>
                    </div>
                    <div class="row space-between g-10 align-center">
                        <div class="row g-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM61.66,37.66l-32,32A8,8,0,0,1,18.34,58.34l32-32A8,8,0,0,1,61.66,37.66Zm176,32a8,8,0,0,1-11.32,0l-32-32a8,8,0,0,1,11.32-11.32l32,32A8,8,0,0,1,237.66,69.66ZM184,128a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V80a8,8,0,0,1,16,0v48Z"></path></svg>
                            <strong>Withdrawal Portal</strong>
                        </div>
                        <div class="toggle {{ $data->withdrawal_portal == 'open' ? 'active' : '' }}">
                            <div onclick="
                                if(this.closest('.toggle').classList.contains('active')){
                                this.closest('.toggle').classList.remove('active');
                                GetRequest(event,'{{ url('admins/get/asset/withdrawal/portal?id='.$data->id.'&status='.$data->withdrawal_portal.'') }}');
                                }else{
                                this.closest('.toggle').classList.add('active');
                             GetRequest(event,'{{ url('admins/get/asset/withdrawal/portal?id='.$data->id.'&status='.$data->withdrawal_portal.'') }}');
                                }
                                " class="child"></div>
                        </div>
                    </div>
                    <div class="row space-between">
                        <button onclick="MyFunc.PromptUser('{{ url('admins/get/delete/product/confirm?id='.$data->id.'') }}','{{ $data->name }}')" class="btn-red-3d">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>

                            Delete</button>
                         <button onclick="window.location.href='{{ url('admins/product/edit?id='.$data->id.'') }}'" class="btn-green-3d">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M201.54,54.46A104,104,0,0,0,54.46,201.54,104,104,0,0,0,201.54,54.46ZM96,210V152h64v58a88.33,88.33,0,0,1-64,0Zm48-74H112V100.94l32-16Zm46.22,54.22A88.09,88.09,0,0,1,176,201.77V152a16,16,0,0,0-16-16V72a8,8,0,0,0-11.58-7.16l-48,24A8,8,0,0,0,96,96v40a16,16,0,0,0-16,16v49.77a88,88,0,1,1,110.22-11.55Z"></path></svg>
                            
                            Edit</button>
                    </div>
                    
               </div>
           @endforeach
         
        @endif
       @if ($products->hasMorePages())
           @include('components.sections',[
            'infinite_loading' => true,
            'url' => url('admins/products/manage?'.http_build_query(array_merge(['page' => $products->currentPage() + 1,'paginate' => 'true'],request()->query())).'')
           ])
       @endif
    </section>

@endsection


@section('js')
    <script class="js">
      InfiniteLoading();
        window.MyFunc = {
            PromptUser : function(url,name){
                let prompt=` <div class="column align-center text-center w-full g-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>
        <span>Are you sure you want to delete <strong class="desc c-primary">${name}</strong>? this action cannot be undone.</span>
        <button onclick="GetRequest(event,'${url}',this,MyFunc.Deleted)" class="btn-red-3d w-full">Yes! I confirm to delete</button>
    </div>`;
    PopUp(prompt);
            },
            Deleted : function(response){
                let data=JSON.parse(response);
                CreateNotify(data.status,data.message);
                if(data.status == 'success'){
                    window.location.reload();
                }
            }
        }
    </script>
@endsection