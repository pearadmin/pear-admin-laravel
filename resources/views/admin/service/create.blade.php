@extends('admin.baseform')

@section('content')
    <form class="layui-form " action="" method="post">
        <div class="mainBox">
            <div class="main-container">
                <div class="main-container">
                    {{ method_field('post') }}
                    @include('admin.service._form')
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="button-container">
                <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit="" lay-filter="service-save">
                    <i class="layui-icon layui-icon-ok"></i>提交
                </button>
                <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">
                    <i class="layui-icon layui-icon-refresh"></i>重置
                </button>
            </div>
        </div>
    </form>
@endsection
@section('upload')
    @include('admin.upload')
@endsection

@section('script')
    <script>
        layui.use(['form','notice','jquery','iconPicker'],function(){
            let form = layui.form;
            let $ = layui.jquery;
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

            form.on('submit(service-save)', function(data){
                if (!data.field.image){
                    layer.msg("图片必须上传",{icon:5});
                    return false;
                }
                $.ajax({
                    url:'{{route('admin.service.store')}}',
                    data:data.field,
                    dataType:'json',
                    type:'post',
                    success:function(result){
                        console.log(result)
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
                        console.log(msg)
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
