@extends('admin.baseform')

@section('content')
<form class="layui-form " action="" method="post">
    {{csrf_field()}}
    <div class="mainBox">
        <div class="main-container">
            <div class="main-container">
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">原密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="old_password" lay-verify="required" placeholder="请输入原密码" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">新密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="new_password" maxlength="14" lay-verify="required" placeholder="请输入新密码" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">确认密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="new_password_confirmation" maxlength="14" lay-verify="required" placeholder="请确认新密码" class="layui-input">
                    </div>
                </div>
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
    <script>
    layui.use(['form','notice','jquery'],function(){
        let form = layui.form;
        let $ = layui.jquery;

        form.on('submit(user-save)', function(data){
            $.ajax({
                url:'{{route('admin.user.password')}}',
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

