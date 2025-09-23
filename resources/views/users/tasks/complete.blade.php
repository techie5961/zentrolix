@extends('layout.users.app')
@section('title')
    Complete Task
@endsection
@section('main')
    <section class="column w-full align-center p-10 g-10">
          <div class="w-full column g-10 max-w-500 br-10 bg-light p-10 box-shadow">
        <div class="row align-center g-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M240,192h-8V56a16,16,0,0,0-16-16H40A16,16,0,0,0,24,56V192H16a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16ZM40,56H216V192H200V168a8,8,0,0,0-8-8H120a8,8,0,0,0-8,8v24H72V88H184v48a8,8,0,0,0,16,0V80a8,8,0,0,0-8-8H64a8,8,0,0,0-8,8V192H40ZM184,192H128V176h56Z"></path></svg>

            <span class="bold">Task Instruction</span>
        </div>
        <hr>
       <div class="w-full bg-primary-transparent p-10 br-10 g-10 column">
         {!! nl2br($data->description) !!}
       </div>
    </div>  
      <div class="w-full column g-10 max-w-500 br-10 bg-light p-10 box-shadow">
        
        <div class="row align-center g-5">
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H128a8,8,0,0,1,0-16h88A8,8,0,0,1,224,128ZM128,72h88a8,8,0,0,0,0-16H128a8,8,0,0,0,0,16Zm88,112H128a8,8,0,0,0,0,16h88a8,8,0,0,0,0-16ZM82.34,42.34,56,68.69,45.66,58.34A8,8,0,0,0,34.34,69.66l16,16a8,8,0,0,0,11.32,0l32-32A8,8,0,0,0,82.34,42.34Zm0,64L56,132.69,45.66,122.34a8,8,0,0,0-11.32,11.32l16,16a8,8,0,0,0,11.32,0l32-32a8,8,0,0,0-11.32-11.32Zm0,64L56,196.69,45.66,186.34a8,8,0,0,0-11.32,11.32l16,16a8,8,0,0,0,11.32,0l32-32a8,8,0,0,0-11.32-11.32Z"></path></svg>

            <span class="bold">Task Details</span>
        </div>
        <hr>
         <div class="w-full bg-primary-transparent p-10 br-10 g-10 column">
        <div class="row align-center c-primary bold g-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M216,56v60a4,4,0,0,1-4,4H136V44a4,4,0,0,1,4-4h60A16,16,0,0,1,216,56ZM116,40H56A16,16,0,0,0,40,56v60a4,4,0,0,0,4,4h76V44A4,4,0,0,0,116,40Zm96,96H136v76a4,4,0,0,0,4,4h60a16,16,0,0,0,16-16V140A4,4,0,0,0,212,136ZM40,140v60a16,16,0,0,0,16,16h60a4,4,0,0,0,4-4V136H44A4,4,0,0,0,40,140Z"></path></svg>

            <span>Task Title</span>
        
        </div>
        <span>{{ $data->title }}</span>
       </div>
        <div class="w-full bg-primary-transparent p-10 br-10 g-10 column">
        <div class="row align-center c-primary bold g-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M216,64H56a8,8,0,0,1,0-16H192a8,8,0,0,0,0-16H56A24,24,0,0,0,32,56V184a24,24,0,0,0,24,24H216a16,16,0,0,0,16-16V80A16,16,0,0,0,216,64Zm-36,80a12,12,0,1,1,12-12A12,12,0,0,1,180,144Z"></path></svg>
            <span>Task Reward</span>
        
        </div>
        <span>&#8358;{{ number_format($asset->income_per_task,2) }}</span>
       </div>
       <div class="w-full bg-primary-transparent p-10 br-10 g-10 column">
        <div class="row align-center c-primary bold g-2">
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM64,152H48a8,8,0,0,1,0-16H64a8,8,0,0,1,0,16Zm0-32H48a8,8,0,0,1,0-16H64a8,8,0,0,1,0,16Zm0-32H48a8,8,0,0,1,0-16H64a8,8,0,0,1,0,16ZM216,200H88V56H216V200Z"></path></svg>

            <span>Task ID</span>
        
        </div>
        <span>TSK-{{ $data->id }}</span>
       </div>
       <button onclick="window.open('{{ $data->link }}')" class="btn-primary-3d w-full br-5 clip-5">Visit Task Link</button>
    </div>  
      <form enctype="multipart/form-data" action="{{ url('users/post/task/complete/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Completed)" class="w-full column g-10 max-w-500 br-10 bg-light p-10 box-shadow">
        <div class="row align-center g-5">
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm37.66,50.34a8,8,0,0,0-11.32,0L87.09,143A24,24,0,1,0,121,177l49.32-50.32a8,8,0,1,1,11.42,11.2l-49.37,50.38a40,40,0,1,1-56.62-56.51L143,63.09A24,24,0,1,1,177,97L109.71,165.6a8,8,0,1,1-11.42-11.2L165.6,85.71a8,8,0,0,0,.06-11.37Z"></path></svg>

            <span class="bold">Submit Proof</span>
        </div>
        <hr>
        <input type="hidden" class="input" name="id" value="{{ $data->id }}">
        <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="input">
        <label for="">Social media handle or whatsapp number used in performing task</label>
      <div class="cont w-full h-50 br-10 border-1 border-color-silver bg-dim">
        <input type="text" name="handle" placeholder="Social Handle or Whatsapp Number" class="inp required no-border input w-full h-full bg-transparent br-10">
      </div>
      <label class="w-full perfect-square bg-primary-transparent border-dashed-2 column justify-center border-color-primary br-10 pointer clip-10">
        <input onchange="
            let file=this.files[0];
            if(file){
          try{
            this.closest('label').querySelector('.det').classList.add('display-none');
           
             this.closest('label').querySelector('.prev').src=window.URL.createObjectURL(file);
            this.closest('label').querySelector('.prev').classList.remove('display-none');
          }catch(error){
          alert(error.stack)
          }
            }else{
             this.closest('label').querySelector('.det').classList.remove('display-none');
            this.closest('label').querySelector('.prev').classList.add('display-none');
            }
            " type="file" required name="screenshot" class="display-none" accept="image/*">
        <div class="column det text-center g-5 align-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="var(--primary)" viewBox="0 0 256 256"><path d="M247.93,124.52C246.11,77.54,207.07,40,160.06,40A88.1,88.1,0,0,0,81.29,88.67h0A87.48,87.48,0,0,0,72,127.73,8.18,8.18,0,0,1,64.57,136,8,8,0,0,1,56,128a103.66,103.66,0,0,1,5.34-32.92,4,4,0,0,0-4.75-5.18A64.09,64.09,0,0,0,8,152c0,35.19,29.75,64,65,64H160A88.09,88.09,0,0,0,247.93,124.52Zm-50.27,9.14a8,8,0,0,1-11.32,0L168,115.31V176a8,8,0,0,1-16,0V115.31l-18.34,18.35a8,8,0,0,1-11.32-11.32l32-32a8,8,0,0,1,11.32,0l32,32A8,8,0,0,1,197.66,133.66Z"></path></svg>
            <strong class="font-1 c-primary">Upload Screenshot Proof</strong>
            <span>Click to Upload screenshot showing you performed the task</span>
            <span>Accepted formats:JPG,PNG</span>
            <span>Maximum size:5MB</span>
        </div>
        <img src="" alt="" class="max-w-full max-h-200 br-10 display-none prev">
    </label>
    <button class="post">Submit Task</button>
    </form>  
      
    </section>
@endsection
@section('js')
    <script class="js">
      window.MyFunc = {
        Completed : function(response,event){
          let data=JSON.parse(response);
          if(data.status == 'success'){
            spa(event,data.url);
          }
        }
      }
    </script>
@endsection