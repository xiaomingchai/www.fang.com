{{--        错误信息--}}
@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <li class="Huialert Huialert-danger"><i class="Hui-iconfont">&#xe6a6;</i>{{$error}}</li>
    @endforeach
@endif

{{--成功信息提示--}}
@if(session()->has('success'))
    <div class="Huialert Huialert-success"><i class="Hui-iconfont">&#xe6a6;</i>
   {{session('success')}}
    </div>
@endif


