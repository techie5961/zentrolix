@extends('layout.users.app')
@section('title')
    Deposit
@endsection
@section('main')
    <section class="section1 column g-10 p-10">
        <div class="column max-w-500 x-auto w-full g-10 p-10 bg-light box-shadow br-10">
           @if (!$auto->isEmpty())
                <div class="grid g-10 grid-3">
               @foreach ($auto as $data)
                   <div onclick="AutoFill('{{ $data->price }}',document.querySelector('input[name=amount]'))" class="p-10 justify-center row max-w-full break-word border-1 border-color-primary clip-5 br-5 bold c-primary no-select pointer">&#8358;{{ number_format($data->price,2) }}</div>
             
               @endforeach
        </div>
           @endif
          <form action="{{ url('users/post/deposit/initiate') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Initiated)" class="column w-full g-20">
            <input type="hidden" name="_token" class="input" value="{{ @csrf_token() }}">
            <div class="cont row space-between h-50 w-full br-10 border-color-silver border-1">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="h-full column c-primary no-select perfect-square justify-center text-center">&#8358;</div>
                <input placeholder="Enter Deposit Amount" type="number" name="amount" class="inp bg-transparent required amount input w-full h-full no-border br-10">
            </div>
            <button class="post">Deposit</button>
          </form>
        </div>
        <div class="w-full bg-light box-shadow p-10 g-10 column br-10 top-20">
            <strong class="desc c-primary">Deposit Instructions</strong>
            <span>- Minimum Deposit is &#8358;{{ number_format(($auto[0] ?? json_decode('{}'))->price ?? 0,2) }}</span>
             <span>- Deposit Portal is open 247.</span>
              <span>- For safety ,use only the official app or website to make a deposit.</span>
                <span>- Only send funds to the exact account provided.</span>
                  <span>- If you encounter any issues in deposit ,endeavour to contact our support team and we would resolve it.</span>

        </div>
    </section>
@endsection
@section('js')
    <script class="js">
      window.MyFunc = {
        Initiated : function(response){
          let data=JSON.parse(response);
          if(data.status == 'success'){
            window.location.href=data.url;
          }
        }
      }
    </script>
@endsection