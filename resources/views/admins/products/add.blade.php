@extends('layout.admins.app')
@section('title')
    Add Asset
@endsection
@section('main')
    <section class="column p-10 w-full">
        <form enctype="multipart/form-data" action="{{ url('admins/post/add/products/process') }}" onsubmit="PostRequest(event,this,MyFunc.Added)" method="POST" class="column g-10 p-10 bg-light box-shadow w-full br-10">
            <strong class="desc c-primary">Add New Asset</strong>
            <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
            <label for="">Asset Photo</label>
            <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input type="file" accept="image/*" name="photo" class="w-full bg-transparent required no-border br-10 h-full inp input">
            </div>
            <label for="">Asset Name</label>
            <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input type="text" name="name" placeholder="Asset Name" class="w-full required bg-transparent no-border br-10 h-full inp input">
            </div>
            <label for="">Asset Price(&#8358;)</label>
              <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input type="number" step="any" name="price" placeholder="Asset Price" class="w-full required bg-transparent no-border br-10 h-full inp input">
            </div>
            <label for="">Daily Tasks</label>
              <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input type="number" step="any" name="daily_tasks" placeholder="Daily Tasks" class="w-full required bg-transparent no-border br-10 h-full inp input">
            </div>
            <label for="">Income per Task(&#8358;)</label>
              <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input type="number" step="any" name="income_per_task" placeholder="Income per Task" class="w-full required bg-transparent no-border br-10 h-full inp input">
            </div>
            <label for="">Asset Duration (days)</label>
              <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input type="number" name="cycle" placeholder="Asset Duration" class="w-full required bg-transparent no-border br-10 h-full inp input">
            </div>
             <label for="">Purchase Limit</label>
              <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input type="number" name="purchase_limit" placeholder="Purchase Limit" class="w-full required bg-transparent no-border br-10 h-full inp input">
            </div>
            <label for="">Minimum Withdrawal (&#8358;)</label>
              <div class="cont w-full h-50 br-10 border-color-silver bg border-1">
                <input type="number" name="minimum_withdrawal" placeholder="Minimum Withdrawal" class="w-full required bg-transparent no-border br-10 h-full inp input">
            </div>
           
            <button class="post">Add Asset</button>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc={
            Added : function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href=data.url;
                }

            }
        }
    </script>
@endsection