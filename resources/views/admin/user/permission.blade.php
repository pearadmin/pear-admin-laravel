@extends('admin.baseform')

@section('content')
<form action="" method="post" class="layui-form ">
    <div class="mainBox">
        <div class="main-container">
            <div class="main-container">
                {{csrf_field()}}
                {{ method_field('put') }}
                <ul id="permissions" class="dtree" data-id="0" data-value="{{$permission->parent_id??0}}"></ul>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="button-container">
            <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit="" lay-filter="user-save">
                <i class="layui-icon layui-icon-ok"></i>提交
            </button>
            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-refresh"></i>重置
            </button>
        </div>
    </div>
</form>
@endsection

@section('script')
    <script type="text/javascript">
        layui.use(['form','dtree','notice','jquery'],function(){
            let form = layui.form;
            let $ = layui.jquery;
            let dtree = layui.dtree;
            dtree.render({
                elem: "#permissions",
                width: "100%",
                url: "{{route('admin.user.permissionTree',['id'=>$user->id])}}",
                icon: "2",  //修改二级图标样式
                checkbar: true,  //开启复选框
                method: 'get'
            });

            form.on('submit(user-save)', function(data){
                let permissions = [];
                let params = dtree.getCheckbarNodesParam("permissions");
                $.each(params, function(i, item){
                    permissions.push(item.nodeId);
                });
                // data.field.permissions = permissions.join();
                data.field.permissions = permissions;
                $.ajax({
                    url:'{{route('admin.user.assignPermission',['id'=>$user->id])}}',
                    data:data.field,
                    dataType:'json',
                    type:'post',
                    success:function(result){
                        if (result.code === 200) {
                            window.parent.notify('success',result.msg)
                            setTimeout(function () {
                                parent.layer.closeAll();
                            }, 1000);
                        } else {
                            window.parent.notify('error',result.msg)
                        }
                    },
                    error:function(msg){
                        let json = JSON.parse(msg.responseText);
                        json = json.errors;
                        for (const item in json) {
                            for (let i = 0; i < json[item].length; i++) {
                                window.parent.notify('warning',json[item][i])
                                return ; //遇到验证错误，就退出
                            }
                        }
                    }

                })

                return false;
            });
        })

    </script>
@endsection

