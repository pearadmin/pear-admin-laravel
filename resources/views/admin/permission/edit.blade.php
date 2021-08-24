@extends('admin.baseform')

@section('content')
    <form class="layui-form " action="" method="post">
        <div class="mainBox">
            <div class="main-container">
                <div class="main-container">
                    {{ method_field('put') }}
                    @include('admin.permission._form')
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="button-container">
                <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit="" lay-filter="permission-save">
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
    <script>
    layui.use(['form','dtree','iconPicker','notice','jquery'],function(){
        let form = layui.form;
        let $ = layui.jquery;
        let dtree = layui.dtree;
        let iconPicker = layui.iconPicker;

        iconPicker.render({
            elem: '#iconPicker',
            type: 'fontClass',
            search: true,
            page: true,
            limit: 16,
            click: function(data) {
                console.log(data);
            },
            success: function(d) {
                console.log(d);
            }
        });

        dtree.render({
            elem: "#parent_id",
            icon:3,
            initLevel: 1,
            method: 'get',
            url: "{{route('admin.permission.dtree')}}",
            select: true,
            selectInitVal: "{{$permission->parent_id}}",
            selectInputName: {
                nodeId: "parent_id",
            }
        });
        form.on('radio(select-type)', function(data){
            $('#type2,#type3').hide();
            $('#type2 input,#type3 input').removeAttr('lay-verify');

            if (data.value!=1){
                $('#type'+data.value).show();
                $('#type'+data.value+' input').attr('lay-verify','required');
            }
        });

        form.on('submit(permission-save)', function(data){
            $.ajax({
                url:'{{route('admin.permission.update',['id'=>$permission->id])}}',
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
