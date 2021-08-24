@extends('admin.auth.base')

@section('content')
{{--    登录表单--}}
    <div class="layui-form-item">
        <input placeholder="账 户" type="text" hover class="layui-input" name="username" value="{{old('username')}}"  maxlength="16"/>
    </div>
    <div class="layui-form-item">
        <input placeholder="密 码" type="password" hover class="layui-input" name="password"  maxlength="16" />
    </div>
    <div class="layui-form-item">
        <input placeholder="验证码" type="text" hover class="code layui-input layui-input-inline" name="captcha"  maxlength="4"/>
        <img src="{{captcha_src()}}" id="captcha_img" onclick="this.src=this.src+'?t='+Math.random()" class="codeImage">
    </div>
    <div class="layui-form-item">
        <input type="checkbox" name="" title="记住密码" lay-skin="primary" checked>
    </div>
    <div class="layui-form-item">
        <button type="button" class="pear-btn pear-btn-success login" lay-submit lay-filter="login" id="login-submit">登 入</button>
    </div>
@endsection

@section('script')
    <script>
        layui.use(['form', 'jquery', 'popup','notice'], function() {
            var form = layui.form;
            var jquery = layui.jquery;
            var popup = layui.popup;
            var notice = layui.notice;
            var $ = layui.jquery;

            // 登 录 提 交
            form.on('submit(login)', function(data) {
                $.ajax({
                    url: "{{route('admin.auth.login')}}",
                    type: "POST",
                    data:data.field,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    //ajax必写验证
                    jsonType:"json",
                    success: function(e){
                        popup.success(e.msg, function() {
                            location.href = e.redirect
                        });
                    },
                    error:function(a){
                        $("#captcha_img").click();
                        let json=JSON.parse(a.responseText);
                        json = json.errors;
                        for ( let item in json) {
                            for ( let i = 0; i < json[item].length; i++) {
                                notice.error(json[item][i]);
                                return ; //遇到验证错误，就退出
                            }
                        }
                    }
                });

                return false;
            });

            // 回 车 登 录 提 交
            $(document).keydown(function (e) {
                if (e.keyCode === 13) {
                    $('#login-submit').click();
                }
            });

            //错误提示
            @if(count($errors)>0)
            @foreach($errors->all() as $error)
            notice.error("{{$error}}");
            @break
            @endforeach
            @endif
        })
    </script>
@endsection
