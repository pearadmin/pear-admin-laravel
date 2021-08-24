@extends('admin.baseform')

@section('content')
    <form class="layui-form " action="{{route('admin.config_group.update',['id'=>$configGroup->id])}}" method="post">
        <div class="mainBox">
            <div class="main-container">
                <div class="main-container">
                {{ method_field('put') }}
                    @include('admin.config_group._form')
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="button-container">
                <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit="" lay-filter="config_group-save">
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
        layui.use(['element','form','jquery'],function () {
            let form = layui.form;
            let $ = layui.jquery;
            form.on('submit(config_group-save)', function(data){
                $.ajax({
                    url:'{{route('admin.config_group.update',['id'=>$configGroup->id])}}',
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
