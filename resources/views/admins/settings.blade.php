@extends('layout.admins.app')
@section('title')
    Site Settings
@endsection
@section('main')
    <section class="column p-10 w-full g-10">
         <div class="column bg-light box-shadow w-full br-10 p-10 g-10">
            <div class="border-bottom-thin p-10 w-full row align-center g-5">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"></path></svg>
                <span>Manual Deposit Settings</span>
            </div>
            <form action="{{ url('admins/post/bank/settings/process') }}" onsubmit="PostRequest(event,this)"  method="POST" class="w-full column g-10">
              <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                <label for="">Account Number</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $bank_settings->account_number ?? '' }}" type="number" name="account_number" placeholder="E.g 0123456789" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                  <label for="">Bank Name</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $bank_settings->bank_name ?? '' }}" type="text" name="bank_name" placeholder="E.g {{ config('app.name') }} Bank" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Account Name</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $bank_settings->account_name ?? '' }}" type="text" name="account_name" placeholder="E.g David James" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
               
               
                <button class="post">
                    Update Deposit Settings
                </button>
            </form>
        </div>
         <div class="column bg-light box-shadow w-full br-10 p-10 g-10">
            <div class="border-bottom-thin p-10 w-full row align-center g-5">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"></path></svg>
                <span>General Settings</span>
            </div>
            <form action="{{ url('admins/post/general/settings/process') }}" onsubmit="PostRequest(event,this)"  method="POST" class="w-full column g-10">
              <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                <label for="">Whatsapp Group Link</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $general_settings->whatsapp_group }}" type="url" name="whatsapp_group" placeholder="E.g https://wa.me/your-group-link" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Telegram Group Link</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $general_settings->telegram_group }}" type="url" name="telegram_group" placeholder="E.g https:://t.me/your-group-link" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label class="display-none" for="">Site Notification</label>
                <div class="cont h-200  w-full border-1 h-50 border-color-silver bg br-10">
                   <textarea class="h-full br-10 inp input required no-border bg-transparent p-10 font-primary w-full" name="notification_message">{{ $general_settings->notification_message }}</textarea>  
                 </div>
               
                <button class="post">
                    Update General Settings
                </button>
            </form>
        </div>
        <div class="column bg-light box-shadow w-full br-10 p-10 g-10">
            <div class="border-bottom-thin p-10 w-full row align-center g-5">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M216,64H56a8,8,0,0,1,0-16H192a8,8,0,0,0,0-16H56A24,24,0,0,0,32,56V184a24,24,0,0,0,24,24H216a16,16,0,0,0,16-16V80A16,16,0,0,0,216,64Zm0,128H56a8,8,0,0,1-8-8V78.63A23.84,23.84,0,0,0,56,80H216Zm-48-60a12,12,0,1,1,12,12A12,12,0,0,1,168,132Z"></path></svg>
                <span>Finance Settings</span>
            </div>
            <form action="{{ url('admins/post/finance/settings/process') }}" onsubmit="PostRequest(event,this)"  method="POST" class="w-full column g-10">
              <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
               <label for="">Maximum Daily Tasks(free users)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $finance_settings->daily_free_tasks ?? 0 }}" type="number" name="daily_free_tasks" placeholder="E.g 2" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                  <label for="">Earnings per Task(free users)(&#8358;)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $finance_settings->earnings_per_task ?? 0 }}" type="number" step="any" name="earnings_per_task" placeholder="E.g 500" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
              <label for="">Daily Check-In Bonus(&#8358;)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $finance_settings->daily_check_in ?? 0 }}" type="number" step="any" name="daily_check_in" placeholder="E.g 500" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                 <label for="">Welcome Bonus(&#8358;)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $finance_settings->welcome_bonus ?? 0 }}" type="number" step="any" name="welcome_bonus" placeholder="E.g 100" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                 <label for="">Daily Spin Minimum Reward(&#8358;)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $finance_settings->spin_minimum ?? 0 }}" type="number" step="any" name="spin_minimum" placeholder="E.g 300" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                 <label for="">Daily Spin Maximum Reward(&#8358;)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $finance_settings->spin_maximum ?? 0 }}" type="number" step="any" name="spin_maximum" placeholder="E.g 1000" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
              <label for="">Minimum Withdrawal(&#8358;)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $finance_settings->min_withdrawal }}" type="number" step="any" name="min_withdrawal" placeholder="E.g 1000" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Maximum Withdrawal(&#8358;)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $finance_settings->max_withdrawal }}" type="number" step="any" name="max_withdrawal" placeholder="E.g 1000000" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Withdrawal Fee (%)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $finance_settings->withdrawal_fee }}" type="number" step="any" name="withdrawal_fee" placeholder="E.g 5" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Withdrawal Portal</label>
                <hr>
                <input type="hidden" name="withdrawal_status" value="{{ $finance_settings->withdrawal_status }}" class="input">
                <div class="row space-between w-full g-10 align-center">
                    <span>Toggle on or Toggle off withdrawal portal</span>
                    <div class="toggle {{ $finance_settings->withdrawal_status == 'open' ? 'active' : '' }}">
                        <div onclick="MyFunc.Toggle(this)"  class="child"></div>
                    </div>
                </div>
                <button class="post">
                    Update Finance Settings
                </button>
            </form>
        </div>
         <div class="column bg-light box-shadow w-full br-10 p-10 g-10">
            <div class="border-bottom-thin p-10 w-full row align-center g-5">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M237.66,106.35l-80-80A8,8,0,0,0,144,32V72.35c-25.94,2.22-54.59,14.92-78.16,34.91-28.38,24.08-46.05,55.11-49.76,87.37a12,12,0,0,0,20.68,9.58h0c11-11.71,50.14-48.74,107.24-52V192a8,8,0,0,0,13.66,5.65l80-80A8,8,0,0,0,237.66,106.35ZM160,172.69V144a8,8,0,0,0-8-8c-28.08,0-55.43,7.33-81.29,21.8a196.17,196.17,0,0,0-36.57,26.52c5.8-23.84,20.42-46.51,42.05-64.86C99.41,99.77,127.75,88,152,88a8,8,0,0,0,8-8V51.32L220.69,112Z"></path></svg>
                <span>Referral Settings</span>
            </div>
            <form action="{{ url('admins/post/referral/settings/process') }}" onsubmit="PostRequest(event,this)"  method="POST" class="w-full column g-10">
              <input type="hidden" class="input" name="_token" value="{{ @csrf_token() }}">
                <label for="">First Level Commission(%)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $referral_settings->first_level ?? '' }}" type="number" step="any" name="first_level" placeholder="E.g 15" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Second Level Commission(%)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $referral_settings->second_level ?? '' }}" type="number" step="any" name="second_level" placeholder="E.g 10" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
                <label for="">Third Level Commission (%)</label>
                <div class="cont w-full border-1 h-50 border-color-silver bg br-10">
                    <input value="{{ $referral_settings->third_level ?? '' }}" type="number" step="any" name="third_level" placeholder="E.g 5" class="inp br-10 bg-transparent input required h-full w-full no-border">
                </div>
               
                <button class="post">
                    Update Referral Settings
                </button>
            </form>
        </div>
        

    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Toggle : function(element){
                let parent=element.closest('.toggle');
                if(parent.classList.contains('active')){
                    parent.classList.remove('active');
                    document.querySelector('input[name=withdrawal_status]').value='closed';
                }else{
                      parent.classList.add('active');
                    document.querySelector('input[name=withdrawal_status]').value='open';
                }
            }
        }
    </script>
@endsection