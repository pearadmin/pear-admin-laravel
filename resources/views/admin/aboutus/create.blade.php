@extends('admin.baseform')

@section('content')
    <form class="layui-form" action="{{route('admin.config.store')}}" method="post">
        <div class="mainBox">
            <div class="main-container">
                <div class="main-container">
                    {{ method_field('post') }}
                    {{csrf_field()}}
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">配置组</label>
                        <div class="layui-input-block">
                            <select name="group_id" lay-verify="required">
                                <option value=""></option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">类型</label>
                        <div class="layui-input-block">
                            <select name="type" >
                                <option value="input">输入框</option>
                                <option value="textarea">文本域</option>
                                <option value="radio">单选</option>
                                <option value="select">下拉</option>
                                <option value="image">图片</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">配置名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="label" value="{{ old('label') }}" lay-verify="required" placeholder="请输入名称" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">配置字段</label>
                        <div class="layui-input-block">
                            <input type="text" name="key" value="{{ old('key') }}" lay-verify="required" placeholder="请输入,如name" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">配置值</label>
                        <div class="layui-input-block">
                            <input type="text" name="val" value="{{ old('val') }}" lay-verify="required" placeholder="请输入" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">输入提示</label>
                        <div class="layui-input-block">
                            <input type="text" name="tips" value="{{ old('tips') }}" placeholder="请输入" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">排序</label>
                        <div class="layui-input-block">
                            <input type="number" name="sort" value="{{ old('sort',10) }}" placeholder="请输入" class="layui-input" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="button-container">
                <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit="" lay-filter="configuration-save">
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
            form.on('submit(configuration-save)', function(data){
                $.ajax({
                    url:'{{route('admin.config.store')}}',
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
