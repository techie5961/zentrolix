@extends('layout.users.app')
@section('title')
    Deposit Checkout
@endsection
@section('main')
    <section class="w-full column align-center g-10 p-10 flex-auto">
        <div class="bg-light max-w-500 w-full br-10 p-10 column g-5">
             <div class="row align-center g-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M240,192h-8V56a16,16,0,0,0-16-16H40A16,16,0,0,0,24,56V192H16a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16ZM40,56H216V192H200V168a8,8,0,0,0-8-8H120a8,8,0,0,0-8,8v24H72V88H184v48a8,8,0,0,0,16,0V80a8,8,0,0,0-8-8H64a8,8,0,0,0-8,8V192H40ZM184,192H128V176h56Z"></path></svg>

            <span class="bold">Deposit Instructions</span>
        </div>
        <hr>
        <div class="column g-5 w-full">
           <span> &#9679;  Transfer the deposit to the account details provided above.</span>

            <span>&#9679; After payment, complete the deposit form by entering:</span>

            <span class="p-left-10">&#9675; Bank Sent From <br>

    &#9675; Name on Account Sent From <br>


</span>

<span>&#9679; Ensure the details match your transfer to avoid delays.</span>



<span>&#9679; For assistance, contact our support team.
</span>

        </div>
        </div>
         <div class="bg-light max-w-500 w-full br-10 p-10 column g-5">
             <div class="row align-center g-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"></path></svg>

            <span class="bold">Account Details</span>
        </div>
        <hr>
        <div class="w-full column g-5 p-10 br-10 bg-primary-transparent">
      <div class="row justify-center g-5 align-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M128,88a40,40,0,1,0,40,40A40,40,0,0,0,128,88Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,152ZM240,56H16a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8H240a8,8,0,0,0,8-8V64A8,8,0,0,0,240,56ZM193.65,184H62.35A56.78,56.78,0,0,0,24,145.65v-35.3A56.78,56.78,0,0,0,62.35,72h131.3A56.78,56.78,0,0,0,232,110.35v35.3A56.78,56.78,0,0,0,193.65,184ZM232,93.37A40.81,40.81,0,0,1,210.63,72H232ZM45.37,72A40.81,40.81,0,0,1,24,93.37V72ZM24,162.63A40.81,40.81,0,0,1,45.37,184H24ZM210.63,184A40.81,40.81,0,0,1,232,162.63V184Z"></path></svg>
         <span class="bold c-primary">Deposit Amount</span>
      </div>
      <strong class="desc x-auto">
        &#8358;{{ number_format($amount,2) ?? 'NULL' }}
    <svg onclick="copy('{{ $amount ?? 'NULL' }}')" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M216,32H88a8,8,0,0,0-8,8V80H40a8,8,0,0,0-8,8V216a8,8,0,0,0,8,8H168a8,8,0,0,0,8-8V176h40a8,8,0,0,0,8-8V40A8,8,0,0,0,216,32Zm-8,128H176V88a8,8,0,0,0-8-8H96V48H208Z"></path></svg>
      </strong>
      </div>
      <div class="w-full column g-5 p-10 br-10 bg-primary-transparent">
      <div class="row justify-center g-5 align-center">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M224,88H175.4l8.47-46.57a8,8,0,0,0-15.74-2.86l-9,49.43H111.4l8.47-46.57a8,8,0,0,0-15.74-2.86L95.14,88H48a8,8,0,0,0,0,16H92.23L83.5,152H32a8,8,0,0,0,0,16H80.6l-8.47,46.57a8,8,0,0,0,6.44,9.3A7.79,7.79,0,0,0,80,224a8,8,0,0,0,7.86-6.57l9-49.43H144.6l-8.47,46.57a8,8,0,0,0,6.44,9.3A7.79,7.79,0,0,0,144,224a8,8,0,0,0,7.86-6.57l9-49.43H208a8,8,0,0,0,0-16H163.77l8.73-48H224a8,8,0,0,0,0-16Zm-76.5,64H99.77l8.73-48h47.73Z"></path></svg>
        <span class="bold c-primary">Account Number</span>
      </div>
      <strong class="desc x-auto">
    {{ $bank_settings->account_number ?? 'NULL' }}
    <svg onclick="copy('{{ $bank_settings->account_number ?? 'NULL' }}')" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--text)" viewBox="0 0 256 256"><path d="M216,32H88a8,8,0,0,0-8,8V80H40a8,8,0,0,0-8,8V216a8,8,0,0,0,8,8H168a8,8,0,0,0,8-8V176h40a8,8,0,0,0,8-8V40A8,8,0,0,0,216,32Zm-8,128H176V88a8,8,0,0,0-8-8H96V48H208Z"></path></svg>
      </strong>
      </div>
      <div class="w-full column g-5 p-10 br-10 bg-primary-transparent">
      <div class="row justify-center g-5 align-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M192,116a12,12,0,1,1-12-12A12,12,0,0,1,192,116ZM152,64H112a8,8,0,0,0,0,16h40a8,8,0,0,0,0-16Zm96,48v32a24,24,0,0,1-24,24h-2.36l-16.21,45.38A16,16,0,0,1,190.36,224H177.64a16,16,0,0,1-15.07-10.62L160.65,208h-57.3l-1.92,5.38A16,16,0,0,1,86.36,224H73.64a16,16,0,0,1-15.07-10.62L46,178.22a87.69,87.69,0,0,1-21.44-48.38A16,16,0,0,0,16,144a8,8,0,0,1-16,0,32,32,0,0,1,24.28-31A88.12,88.12,0,0,1,112,32H216a8,8,0,0,1,0,16H194.61a87.93,87.93,0,0,1,30.17,37c.43,1,.85,2,1.25,3A24,24,0,0,1,248,112Zm-16,0a8,8,0,0,0-8-8h-3.66a8,8,0,0,1-7.64-5.6A71.9,71.9,0,0,0,144,48H112A72,72,0,0,0,58.91,168.64a8,8,0,0,1,1.64,2.71L73.64,208H86.36l3.82-10.69A8,8,0,0,1,97.71,192h68.58a8,8,0,0,1,7.53,5.31L177.64,208h12.72l18.11-50.69A8,8,0,0,1,216,152h8a8,8,0,0,0,8-8Z"></path></svg>
        <span class="bold c-primary">Bank Name</span>
      </div>
      <strong class="desc x-auto">
    {{ $bank_settings->bank_name ?? 'NULL' }}
      </strong>
      </div>
      <div class="w-full column g-5 p-10 br-10 bg-primary-transparent">
      <div class="row justify-center g-5 align-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V192a16,16,0,0,0,16,16H56v16a8,8,0,0,0,16,0V208H184v16a8,8,0,0,0,16,0V208h16a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,152H40V56H216v64H199.32a48,48,0,1,0,0,16H216v56Zm-50.16-72a16,16,0,1,0,0,16H183a32,32,0,1,1,0-16Z"></path></svg>
         <span class="bold c-primary">Account Name</span>
      </div>
      <strong class="desc x-auto">
    {{ $bank_settings->account_name ?? 'NULL' }}
      </strong>
      </div>
        </div>
         <div class="bg-light max-w-500 w-full br-10 p-10 column g-5">
             <div class="row align-center g-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M72,104a8,8,0,0,1,8-8h96a8,8,0,0,1,0,16H80A8,8,0,0,1,72,104Zm8,40h96a8,8,0,0,0,0-16H80a8,8,0,0,0,0,16ZM232,56V208a8,8,0,0,1-11.58,7.15L192,200.94l-28.42,14.21a8,8,0,0,1-7.16,0L128,200.94,99.58,215.15a8,8,0,0,1-7.16,0L64,200.94,35.58,215.15A8,8,0,0,1,24,208V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56Zm-16,0H40V195.06l20.42-10.22a8,8,0,0,1,7.16,0L96,199.06l28.42-14.22a8,8,0,0,1,7.16,0L160,199.06l28.42-14.22a8,8,0,0,1,7.16,0L216,195.06Z"></path></svg>

            <span class="bold">Deposit Proof</span>
        </div>
        <hr>
        <form onsubmit="PostRequest(event,this,MyFunc.Submitted)" action="{{ url('users/post/manual/deposit/process') }}" method="POST" class="column g-5 w-full">
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="input">
            <input type="hidden" name="uniqid" value="{{ $uniqid }}" class="input">
           <label for="">Bank Sent From</label>
           <div class="cont w-full h-50 br-10 border-color-silver border-1">
            <input type="text" name="bank_name" placeholder="Name of bank sent from" class="inp required input w-full h-full bg-transparent br-10 no-border">
           </div>
            <label for="">Name on Account From</label>
           <div class="cont w-full h-50 br-10 border-color-silver border-1">
            <input type="text" name="account_name" placeholder="Name on account sent from" class="inp required input w-full h-full bg-transparent br-10 no-border">
           </div>
           <label class="row no-select">
            <input type="checkbox" required>
            <span>I confirm that i have transferred the sum of &#8358;{{ number_format($amount,2) }} to the account detaiils above</span>
           </label>
           <button class="post"><span>I Have paid</span></button>

        </form>
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Submitted : function(response,event){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    spa(event,data.url);
                }
            }
        }
    </script>
@endsection