@extends('layout.users.auth')
@section('title')
    Register
@endsection
@section('main')
     <section class="w-full bg-light p-bottom-50 align-center br-20 p-y-20 g-10 column p-10 backdrop-blur-10 max-w-500">
        <img src="{{ asset('logo.png?v=1.1') }}" class="w-half" alt="">
        <strong class="desc c-primary font-cinzel-decorative">Sign Up</strong>
        <span class="text-light bottom-10">Create New Account</span>
        @if ($ref !== '')
           <div class="c-green desc font-libertinus-sans bold bg-green-transparent p-10 br-10 border-1 border-color-green no-select">🎉You are joining under {{ ucfirst($ref) }}</div>
         
        @endif
        <form method="POST" onsubmit="PostRequest(event,this,MyFunc.call_back)" action="{{ url('post/users/register/process') }}" class="column w-full g-10">
         <input type="hidden"  name="_token" value="{{ csrf_token() }}" class="input">
          <div class="h-50 align-center cont w-full row border-1 border-color-silver bg-whitesmoke br-10 bg-dim">
            <input autocomplete="off" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Email Address" name="email" name="email" class="w-full input inp required ph-c-silver h-full no-border no-outline bg-transparent br-10" type="text">
        <div style="height:40px;margin-right:5px !important;" class="h-semi-full perfect-square br-10 bg-dim right-10 column justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM203.43,64,128,133.15,52.57,64ZM216,192H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path></svg>
        </div>
        </div>
         <div class="h-50 align-center w-full row border-1 cont border-color-silver bg-whitesmoke br-10 bg-dim">
            <input autocomplete="off" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Username" name="username" class="w-full inp input required ph-c-silver h-full no-border no-outline bg-transparent br-10" type="text">
 <div style="height:40px;margin-right:5px !important;" class="h-semi-full perfect-square br-10 bg-dim right-10 column justify-center">           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M221.35,104.11a8,8,0,0,0-6.57,9.21A88.85,88.85,0,0,1,216,128a87.62,87.62,0,0,1-22.24,58.41,79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75A88,88,0,0,1,128,40a88.76,88.76,0,0,1,14.68,1.22,8,8,0,0,0,2.64-15.78,103.92,103.92,0,1,0,85.24,85.24A8,8,0,0,0,221.35,104.11ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM237.66,45.66l-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L200,60.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
      
        </div>
        </div>
          <div class="h-50 display-none align-center w-full row cont border-1 border-color-silver bg-whitesmoke br-10 bg-dim">
            <input autocomplete="off" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Referral Username (optional)" name="refferral" class="w-full input ph-c-silver h-full no-border no-outline bg-transparent br-10" type="text">
 <div style="height:40px;margin-right:5px !important;" class="h-semi-full perfect-square br-10 bg-dim right-10 column justify-center">        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M254.3,107.91,228.78,56.85a16,16,0,0,0-21.47-7.15L182.44,62.13,130.05,48.27a8.14,8.14,0,0,0-4.1,0L73.56,62.13,48.69,49.7a16,16,0,0,0-21.47,7.15L1.7,107.9a16,16,0,0,0,7.15,21.47l27,13.51,55.49,39.63a8.06,8.06,0,0,0,2.71,1.25l64,16a8,8,0,0,0,7.6-2.1l55.07-55.08,26.42-13.21a16,16,0,0,0,7.15-21.46Zm-54.89,33.37L165,113.72a8,8,0,0,0-10.68.61C136.51,132.27,116.66,130,104,122L147.24,80h31.81l27.21,54.41ZM41.53,64,62,74.22,36.43,125.27,16,115.06Zm116,119.13L99.42,168.61l-49.2-35.14,28-56L128,64.28l9.8,2.59-45,43.68-.08.09a16,16,0,0,0,2.72,24.81c20.56,13.13,45.37,11,64.91-5L188,152.66Zm62-57.87-25.52-51L214.47,64,240,115.06Zm-87.75,92.67a8,8,0,0,1-7.75,6.06,8.13,8.13,0,0,1-1.95-.24L80.41,213.33a7.89,7.89,0,0,1-2.71-1.25L51.35,193.26a8,8,0,0,1,9.3-13l25.11,17.94L126,208.24A8,8,0,0,1,131.82,217.94Z"></path></svg>
      </div>
        </div>
 <div class="h-50 align-center w-full row border-1 cont border-color-silver bg-whitesmoke br-10 bg-dim">           
   <input autocomplete="new-password" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Password" name="password" class="w-full inp input required ph-c-silver h-full no-border no-outline bg-transparent br-10" type="password">
 <div style="height:40px;margin-right:5px !important;" class="h-semi-full perfect-square br-10 bg-dim right-10 column justify-center">            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"></path></svg>
            </div>
          
        </div>
        <div class="h-50 align-center w-full row border-1 cont border-color-silver bg-whitesmoke br-10 bg-dim">
            <input autocomplete="new-password" readonly  onfocus="this.removeAttribute('readonly')" placeholder="Confirm Password" name="confirm" class="w-full input inp required ph-c-silver h-full no-border no-outline bg-transparent br-10" type="password">
 <div style="height:40px;margin-right:5px !important;" class="h-semi-full perfect-square br-10 bg-dim right-10 column justify-center">            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"></path></svg>
            </div>
          
        </div>
        <input type="hidden" value="{{ $ref }}" name="ref" class="input">
          <button class="post top-20 bold">Register</button>
         </form>
          <a href="{{ url('login') }}" class="c-green">Already Have an Account? Login</a>
    </section>
@endsection
@section('js')
    <script class="js">
      window.MyFunc={
        call_back : function(response){
          let data=JSON.parse(response);
          if(data.status == 'success'){
            window.location.href='{{ url('login') }}';
          }
        }
      }
    </script>
@endsection