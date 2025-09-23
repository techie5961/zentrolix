@extends('layout.admins.auth')
@section('title')
    Login
@endsection
@section('main')
    <section class="w-full bg-light p-bottom-50 align-center br-20 p-y-20 g-10 column p-10 backdrop-blur-10 max-w-500">
      
        <img src="{{ asset('logo.png?v=1.1') }}" class="w-half" alt="">
        <strong class="desc c-primary c-white font-cinzel-decorative">Admins Login</strong>
        <span class="text-light bottom-10">Sign In to your Dashboard</span>
         <form onsubmit="PostRequest(event,this,MyFunc.redirect)" action="{{ url('post/admins/login/process') }}" method="POST" class="column w-full g-10">
        <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
            <div class="h-50 align-center w-full row border-1 cont border-color-silver bg-whitesmoke br-10 bg-dim">
            <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" placeholder="Admin Tag" name="id" class="w-full input inp required ph-c-silver h-full no-border no-outline bg-transparent br-10" type="text">
        <div style="height:40px;margin-right:5px !important;" class="h-semi-full perfect-square br-10 bg-dim right-10 column justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M221.35,104.11a8,8,0,0,0-6.57,9.21A88.85,88.85,0,0,1,216,128a87.62,87.62,0,0,1-22.24,58.41,79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75A88,88,0,0,1,128,40a88.76,88.76,0,0,1,14.68,1.22,8,8,0,0,0,2.64-15.78,103.92,103.92,0,1,0,85.24,85.24A8,8,0,0,0,221.35,104.11ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM237.66,45.66l-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L200,60.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
        </div>
        </div>
        <div class="h-50 align-center w-full row border-1 cont  border-color-silver bg-whitesmoke br-10 bg-dim">
            <input placeholder="Password" autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')" class="w-full inp required input ph-c-silver h-full no-border no-outline bg-transparent br-10" name="password" type="password">
        <div style="height:40px;margin-right:5px !important;" class="h-semi-full perfect-square br-10 bg-dim right-10 column justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"></path></svg>
            </div>
          
        </div>
          <button class="post top-20 c-white bold">Login Safely</button>
         </form>
         
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            redirect : function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href=data.url;
                }
            }
        }
    </script>
@endsection