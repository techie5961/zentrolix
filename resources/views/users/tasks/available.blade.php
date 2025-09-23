@extends('layout.users.app')
@section('title')
    Available Tasks
@endsection
@section('main')
    <section class="grid w-full g-10 pc-grid-2 p-10">
      @if ($tasks->isEmpty())
          @include('components.sections',[
            'null' => true,
            'text' => 'No New Task available'
          ])
      @else
          @foreach ($tasks as $data)
              <div class="w-full br-10 p-10 bg-light box-shadow">
                 <div class="row space-between g-10">
                        <div class="h-50 w-50 column justify-center br-10 bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary-text)" viewBox="0 0 256 256"><path d="M224,48V208a16,16,0,0,1-16,16H136a8,8,0,0,1,0-16h72V48H48v96a8,8,0,0,1-16,0V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM125.66,154.34a8,8,0,0,0-11.32,0L64,204.69,45.66,186.34a8,8,0,0,0-11.32,11.32l24,24a8,8,0,0,0,11.32,0l56-56A8,8,0,0,0,125.66,154.34Z"></path></svg>

                        </div>
                        <div class="column g-5 right-auto">
                            <strong class="desc">{{ $data->title ?? 'null' }}</strong>
                             <div class="row g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm88-24a8,8,0,0,0-8,8V82c-6.35-7.36-12.83-14.45-20.12-21.83a96,96,0,1,0-2,137.7,8,8,0,0,0-11-11.64A80,80,0,1,1,184.54,71.4C192.68,79.64,199.81,87.58,207,96H184a8,8,0,0,0,0,16h40a8,8,0,0,0,8-8V64A8,8,0,0,0,224,56Z"></path></svg>

                        <span class="text-light text-small">Posted {{ $data->frame }}</span>
                    </div>
                    <div class="row g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120Zm97.76,66.41a79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75,88,88,0,1,1,131.52,0Z"></path></svg>
                        <span class="text-light text-small">Posted by Admin</span>
                    </div>
                    
                        </div>
                        <div class="status {{ $data->status == 'active' ? 'green' : ($data->status == 'completed' ? 'red' : 'gold') }}">available</div>
                    </div>
                    <hr>
                 
                    <div class="row space-between g-5 align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#708090" viewBox="0 0 256 256"><path d="M216,64H56a8,8,0,0,1,0-16H192a8,8,0,0,0,0-16H56A24,24,0,0,0,32,56V184a24,24,0,0,0,24,24H216a16,16,0,0,0,16-16V80A16,16,0,0,0,216,64Zm0,128H56a8,8,0,0,1-8-8V78.63A23.84,23.84,0,0,0,56,80H216Zm-48-60a12,12,0,1,1,12,12A12,12,0,0,1,168,132Z"></path></svg>

                        <span class="text-light right-auto">Task Reward:</span>
                        <strong class="desc c-primary">&#8358;{{ number_format($asset->income_per_task,2) }}</strong>
                    </div>
                    <button onclick="spa(event,'{{ url('users/task/complete?id='.$data->id.'') }}')" class="btn-primary-3d left-auto br-5 clip-5 top-10">Accept Task</button>


              </div>
          @endforeach
      @endif
    </section>
@endsection