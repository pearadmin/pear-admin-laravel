@extends('admin.baseform')

@section('style')
<style type="text/css">
    .layui-form-label{
        text-align: left !important;
        padding: 9px 0 !important;
    }
</style>
@endsection

@section('content')
    <form class="layui-form " action="" method="post">
        <div class="mainBox">
            <div class="main-container">
                <div class="main-container">
                    {{ method_field('post') }}
                    @include('admin.article._form')
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="button-container">
                <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit="" lay-filter="article-save">
                    <i class="layui-icon layui-icon-ok"></i>提交
                </button>
                <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">
                    <i class="layui-icon layui-icon-refresh"></i>重置
                </button>
            </div>
        </div>
    </form>
@endsection
@section('editor')
    @include('admin.editor')
@endsection

@section('upload')
    @include('admin.upload')
@endsection

@section('script')
    <script>
        layui.use(['form','notice','jquery'],function(){
            let form = layui.form;
            let $ = layui.jquery;

            form.on('submit(article-save)', function(data){
                $.ajax({
                    url:'{{route('admin.article.store')}}',
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
