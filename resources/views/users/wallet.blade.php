@extends('layout.users.app')
@section('title')
    Transaction History
@endsection
@section('main')
    <section class="w-full column align-center g-10 p-10">
        <div class="w-full display-none bg-primary column c-white p-20 br-10 no-select max-w-500 g-5">
            <strong>Total Balance</strong>
            <div class="row space-between w-full g-10">
                <strong class="desc">&#8358;{{ number_format(Auth::guard('users')->user()->deposit + Auth::guard('users')->user()->withdrawal,2) }}</strong>
<strong class="pointer" onclick="spa(event,'{{ url('users/recharge') }}')">+ Recharge</strong>
            </div>
        </div>
        <strong class="right-auto">Transaction History</strong>
       @if ($trx->isEmpty())
           @include('components.sections',[
            'text' => 'No transactions found',
            'null' => true
           ])
       @else
            <div class="w-full g-10 br-10 column box-shadow bg-light p-10">
       @foreach ($trx as $data)
            <div class="row space-between w-full g-10">
            @if ($data->class == 'debit')
              <div class="h-30 w-30 justify-center column br-1000 bg-red-transparent">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" viewBox="0 0 256 256"><path d="M205.66,117.66a8,8,0,0,1-11.32,0L136,59.31V216a8,8,0,0,1-16,0V59.31L61.66,117.66a8,8,0,0,1-11.32-11.32l72-72a8,8,0,0,1,11.32,0l72,72A8,8,0,0,1,205.66,117.66Z"></path></svg>
              </div> 
            @else
              <div class="h-30 w-30 justify-center column br-1000 bg-green-transparent">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#4caf50" viewBox="0 0 256 256"><path d="M205.66,149.66l-72,72a8,8,0,0,1-11.32,0l-72-72a8,8,0,0,1,11.32-11.32L120,196.69V40a8,8,0,0,1,16,0V196.69l58.34-58.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                       </div>
                    @endif
                    <div class="column right-auto g-5">
                        <strong>{{ $data->description }}</strong>
                        <span class="text-light text-dim text-small">{{ $data->frame }}</span>
                    </div>
                    <div class="column g-5">
                       @if ($data->class == 'debit')
                            <strong class="font-1">-&#8358;{{ number_format($data->amount,2) }}</strong>
                       @else
                            <strong style="color:#4caf50;" class="font-1">+&#8358;{{ number_format($data->amount,2) }}</strong>
                       @endif
                       <div class="status left-auto {{ $data->status == 'success' ? 'green' : ($data->status == 'pending' ? 'gold' : 'red') }}">{{ $data->status }}</div>
                    </div>
        </div>
       
       @endforeach
       @if ($trx->hasMorePages())
           @include('components.sections',[
            'infinite_loading' => true,
            'url' => url()->current().'?'.http_build_query(array_merge(request()->query(),['page' => 2,'paginate' => true]))
            ])
       @endif
        </div>
       @endif
    </section>
@endsection
@section('js')
    <script class="js">
        InfiniteLoading();
    </script>
@endsection