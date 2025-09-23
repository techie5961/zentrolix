@extends('layout.admins.app')
@section('title')
    Manage Tasks
@endsection
@section('main')
    <section class="grid pc-grid-2 w-full g-10 p-10">
        @if ($tasks->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No task available'
            ])
        @else
            @foreach ($tasks as $data)
                <div class="w-full column br-10 box-shadow p-10 bg-light">
                    <div class="row space-between g-10">
                        <div class="h-50 w-50 column justify-center br-10 bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary-text)" viewBox="0 0 256 256"><path d="M224,48V208a16,16,0,0,1-16,16H136a8,8,0,0,1,0-16h72V48H48v96a8,8,0,0,1-16,0V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM125.66,154.34a8,8,0,0,0-11.32,0L64,204.69,45.66,186.34a8,8,0,0,0-11.32,11.32l24,24a8,8,0,0,0,11.32,0l56-56A8,8,0,0,0,125.66,154.34Z"></path></svg>

                        </div>
                        <div class="column g-5 right-auto">
                            <strong class="desc">{{ $data->title ?? 'null' }}</strong>
                             <div class="row g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm88-24a8,8,0,0,0-8,8V82c-6.35-7.36-12.83-14.45-20.12-21.83a96,96,0,1,0-2,137.7,8,8,0,0,0-11-11.64A80,80,0,1,1,184.54,71.4C192.68,79.64,199.81,87.58,207,96H184a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V64A8,8,0,0,0,224,56Z"></path></svg>

                        <span class="text-light text-small">Last Updated {{ $data->frame }}</span>
                    </div>
                    <a href="{{ $data->link ?? '' }}" target="_blank" class="c-primary">Visit Link...</a>
                        </div>
                        <div class="status {{ $data->status == 'active' ? 'green' : ($data->status == 'completed' ? 'red' : 'gold') }}">{{ $data->status }}</div>
                    </div>
                    <hr>
                    <strong class="c-primary u">Task Instructions</strong>
                    <div class="w-full">
                        {!! nl2br($data->description) !!}
                    </div>
                    <hr class="top-10">
                   <div class="row space-between">
                        <button onclick='
                        
                            let content=` <div class="column w-full align-center text-center p-10 g-5">
            <div class="h-70 column justify-center w-70 br-10 bg-red">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>

            </div>
            <span>Are you sure you want to delete this task?</span>
            <span class="c-red"> Note:this action cannot be undone</span>
            <button onclick="MyFunc.delete({{ $data->id }})" class="w-full btn-red-3d">Yes! delete task</button>
         </div>`;
                            PopUp(content);
                            ' class="btn-red-3d">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>

                            Delete</button>
                         <button onclick="window.location.href='{{ url('admins/task/edit?id='.$data->id.'') }}'" class="btn-green-3d">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M201.54,54.46A104,104,0,0,0,54.46,201.54,104,104,0,0,0,201.54,54.46ZM96,210V152h64v58a88.33,88.33,0,0,1-64,0Zm48-74H112V100.94l32-16Zm46.22,54.22A88.09,88.09,0,0,1,176,201.77V152a16,16,0,0,0-16-16V72a8,8,0,0,0-11.58-7.16l-48,24A8,8,0,0,0,96,96v40a16,16,0,0,0-16,16v49.77a88,88,0,1,1,110.22-11.55Z"></path></svg>
                            
                            Edit</button>
                    </div>

                </div>
            @endforeach
        @endif
        @if ($tasks->hasMorePages())
            @include('components.sections',[
                'infinite_loading' => true,
                'url' => url('admins/tasks/manage').'?'.http_build_query(array_merge(request()->query(),[
                    'page' => $tasks->currentPage() + 1,
                    'paginate' => true
                ]))
            ])
        @endif
        
    </section>
   
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
        window.MyFunc={
            delete : function(id){
                window.location.href='{{ url('admins/get/task/delete?id=') }}' + id;
            }
        }
    </script>
@endsection