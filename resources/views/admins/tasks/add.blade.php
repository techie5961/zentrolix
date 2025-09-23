@extends('layout.admins.app')
@section('title')
    Add Task
@endsection
@section('main')
    <section class="column w-full p-10 g-10">
        <form action="{{ url('admins/post/add/task/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Posted)" class="column g-5 p-10 bg-light br-10 box-shadow">
            <div class="row align-center g-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M224,48V208a16,16,0,0,1-16,16H136a8,8,0,0,1,0-16h72V48H48v96a8,8,0,0,1-16,0V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM125.66,154.34a8,8,0,0,0-11.32,0L64,204.69,45.66,186.34a8,8,0,0,0-11.32,11.32l24,24a8,8,0,0,0,11.32,0l56-56A8,8,0,0,0,125.66,154.34Z"></path></svg>

                <span>Add New Task</span>
            </div>
            <hr>
            <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="input">
            <label for="">Task Title</label>
            <div class="cont bg-dim w-full br-10 border-1 border-color-silver h-50">
                <input placeholder="Enter Task Title" name="title" type="text" class="inp required input w-full h-full bg-transparent br-10 no-border">
            </div>
            <label for="">Task Link</label>
            <div class="cont bg-dim w-full br-10 border-1 border-color-silver h-50">
                <input placeholder="Enter Task Link" type="url" name="link" class="inp required input w-full h-full bg-transparent br-10 no-border">
            </div>
            <label for="">Task Instructions</label>
            <div class="cont bg-dim w-full br-10 border-1 border-color-silver h-200">
             <textarea name="description" id="" class="w-full required inp input h-full br-10 p-10 font-primary no-border no-resize bg-transparent">- Click the link below
- You would be redirected to a group
- Join the group
- Take a screenshot showing you joined the group
- Return back to the platform and submit screenshot plus your handle or mobile number used in joining the group.</textarea>  
            </div>
            <button class="post">Add Task</button>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc={
            Posted : function(response){
                if(JSON.parse(response).status == 'success'){
                    window.location.href=JSON.parse(response).url;
                }
            }
        }
    </script>
@endsection