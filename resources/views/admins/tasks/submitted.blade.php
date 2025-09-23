@extends('layout.admins.app')
@section('title')
    Submitted Tasks
@endsection
@section('main')
    <section class="grid p-10 pc-grid-2 g-10 w-full">
        @if ($proofs->isEmpty())
            @include('components.sections',[
                'null' => true,
                'text' => 'No Proofs available'
            ])
        @else
            @foreach ($proofs as $data)
                <div class="br-10 w-full bg-light p-10 column">
                    <div class="row w-full g-10">
                        <img src="{{ asset('images/avatar.svg?v=1.1') }}" alt="" class="h-50 border-2 border-color-silver w-550 circle clip-circle">
                        <div class="column g-5 right-auto">
                            <a href="{{ url('admins/user?id='.$data->id.'') }}" class="bold desc c-primary u">{{ $data->user->username ?? '' }}</a>
                            <span class="text-dim row align-center g-2 text-small">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M232,136.66A104.12,104.12,0,1,1,119.34,24,8,8,0,0,1,120.66,40,88.12,88.12,0,1,0,216,135.34,8,8,0,0,1,232,136.66ZM120,72v56a8,8,0,0,0,8,8h56a8,8,0,0,0,0-16H136V72a8,8,0,0,0-16,0Zm40-24a12,12,0,1,0-12-12A12,12,0,0,0,160,48Zm36,24a12,12,0,1,0-12-12A12,12,0,0,0,196,72Zm24,36a12,12,0,1,0-12-12A12,12,0,0,0,220,108Z"></path></svg>

                                Submitted {{ $data->frame }}</span>
                        </div>
                        <div class="status {{ $data->status == 'success' ? 'green' : 'red' }}">{{ $data->status }}</div>
                    </div>
                    <hr>
                    <div class="row align-center g-2">
                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#708090" viewBox="0 0 256 256"><path d="M75.19,198.4a8,8,0,0,0,11.21-1.6,52,52,0,0,1,83.2,0,8,8,0,1,0,12.8-9.6A67.88,67.88,0,0,0,155,165.51a40,40,0,1,0-53.94,0A67.88,67.88,0,0,0,73.6,187.2,8,8,0,0,0,75.19,198.4ZM128,112a24,24,0,1,1-24,24A24,24,0,0,1,128,112Zm72-88H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24Zm0,192H56V40H200ZM88,64a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,64Z"></path></svg>

                        Handle: {{ $data->handle }}
                    </div>
                    <button onclick="window.open('{{ asset('proofs/'.$data->screenshot.'') }}')" class="btn-primary-3d top-10 br-5 clip-5">View Screenshot Proof</button>
                </div>
            @endforeach
            @if ($proofs->hasMorePages())
                @include('components.sections',[
                    'infinite_loading' => true,
                    'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),[
                        'page' => $proofs->currentPage() + 1,
                        'paginate' => true
                    ]))
                ])
            @endif
        @endif
    </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
    </script>
@endsection