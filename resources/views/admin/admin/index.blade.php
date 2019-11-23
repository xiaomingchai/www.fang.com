@extends('admin.public.main')
<title>用户管理</title>
</head>
<body>
@section('cnt')
    <div class="pd-20">
        <form>
            <div id="msg">
                @include('admin.public.msg')
            </div>
            <div class="text-c"> 日期范围：
                <input type="text" value="{{request()->get('st')}}"
                       onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin"
                       class="input-text Wdate" style="width:120px;" name="st">
                -
                <input type="text" value="{{request()->get('et')}}"
                       onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax"
                       class="input-text Wdate" style="width:120px;" name="et">
                <input type="text" value="{{request()->get('kw')}}" class="input-text" style="width:250px"
                       placeholder="输入用户名" id="" name="kw">
                <button type="submit" class="btn btn-success" id="" name=""><i class="icon-search"></i> 搜用户</button>

            </div>
        </form>
        <div class="cl pd-5 bg-1 bk-gray mt-20">
    <span class="l"><a data-href="{{route('admin.user.delall')}}" class="btn btn-danger radius delall"><i
                    class="icon-trash"></i> 批量删除</a>
    <a href="{{route('admin.user.create')}}" class="btn btn-primary radius"><i class="icon-plus"></i> 添加用户</a></span>
            <span class="r">共有数据：<strong>88</strong> 条</span>
        </div>
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="80">ID</th>
                <th width="100">用户名</th>
                <th width="100">真实姓名</th>
                <th width="40">性别</th>
                <th width="90">手机</th>
                <th width="150">邮箱</th>
                <th width="130">创建时间</th>
                <th width="130">修改时间</th>
                <th width="100">状态</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr class="text-c">
                    <td><input type="checkbox" value="{{$item->id}}" name="ids[]"></td>
                    <td>{{$item->id}}</td>

                    <td><u style="cursor:pointer" class="text-primary">{{$item->username}}</u></td>
                    <td><u style="cursor:pointer" class="text-primary">{{$item->truename}}</u></td>
                    <td>{{$item->sex}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td class="f-14 user-manage">
                        @if(!$item->deleted_at)
                            <span class="btn btn-secondary radius size-S" onclick="changeStatus(0,{{$item->id}},this)" type="button" >启用</span>
                        @else
                            <span class="btn btn-warning radius size-S" onclick="changeStatus(1,{{$item->id}},this)" type="button">禁用</span>
                        @endif

                    </td>
                    <td class="f-14 user-manage">
{{--                        <a title="编辑" href="{{route('admin.user.edit',$item)}}" class="ml-5"><span--}}
{{--                                    class="label label-success radius">编辑</span></a>--}}
                        {{--                        <a title="删除" href="javascript:;" class="ml-5 del"><span--}}
                        {{--                                    class="label label-danger radius">删除</span></a>--}}
{{--                        <a title="删除" data-href="{{route('admin.user.destroy',$item)}}" class="ml-5 del"><span--}}
{{--                                    class="label label-danger radius">删除</span></a>--}}
                        {!! $item->editBtn('admin.user.edit') !!}
                        {!! $item->delBtn('admin.user.destroy') !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div id="pageNav" class="pageNav">
            {{-- 分页 --}}
            {{ $data->appends(request()->except('page'))->links() }}
        </div>
    </div>
@endsection
@section('js')

    <!--请在下方写此页面业务相关的脚本-->
    {{--<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>--}}

    <script type="text/javascript" src="{{staticAdminweb()}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{staticAdminweb()}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{staticAdminweb()}}/lib/laypage/1.2/laypage.js"></script>


    <script>
        const _token="{{ csrf_token() }}";
        // 提示信息三秒后显示
        setTimeout(function () {
            $('#msg').hide(1000);
        }, 3000);

        // 单个删除
        $('.del').click(function () {
            //这里存在那个this指向问题
            var url = $(this).attr('data-href');

            layer.confirm('确定不再考虑一下了吗？？', {icon: 5, title: '信息'}, () => {
                $.ajax({
                    url,
                    type: 'delete',
                    data: {_token}

                }).then(ret => {
                    // console.log(ret);
                    $(this).parents('tr').remove();
                    layer.msg(ret.msg, {icon: 1, time: 2000});
                })
                layer.closeAll();
            });
            return false;
        })
        //批量删除

        $('.delall').click(function () {
            var url = $(this).attr('data-href');
            var inputs = $('input[name="ids[]"]:checked');
            // console.log(inputs);
            var ids = [];
            inputs.map((index, item) => {
                ids.push($(item).val());
                // ids.push($(item).val());
            });
            layer.confirm('确定要删除选中的这几项吗?', {icon: 5, title: '提示'}, () => {
                //do something
                $.ajax({
                    url,
                    type: 'delete',
                    data: {_token, ids}
                }).then(ret => {
                    inputs.map((index, item) => {
                        $(item).parents('tr').remove();
                    })
                    layer.msg(ret.msg, {icon: 1, time: 2000});
                })
                layer.closeAll();
            });
            return false;
        })


        //关于软删除    启用  禁用
        //启用是由0变为1
        //禁用是由1变为0
        function changeStatus(status,id,obj){
            if(status==0){
                $.ajax({
                url:"{{route('admin.user.delall')}}",
                type:'delete',
                 data:{_token,ids:id}
                }).then(ret=>{
                    $(obj).removeClass('btn-secondary').addClass('btn-warning').html('禁用');
                })
            }
            else{
                $.ajax({
                    url:"{{route('admin.user.restore')}}",
                    data:{id}
                }).then(ret=>{
                    $(obj).removeClass('btn-warning').addClass('btn-secondary').html('启用');
                })
            }
        }
    </script>
@endsection

