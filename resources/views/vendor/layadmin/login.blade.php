<x-layadmin::layouts.base background="{{ asset('/admin/images/background.svg') }}" style="background-size: cover;">
    <form class="layui-form" action="javascript:void(0);">
        <div class="layui-form-item">
            <img class="logo" src="{{ asset('/admin/images/logo.png') }}"/>
            <div class="title">{{ config('layadmin.title') }}</div>
            <div class="desc">
                {{ config('layadmin.desc') }}
            </div>
        </div>
        <div class="layui-form-item">
            <input type="text" name="username" placeholder="账 户" lay-verify="required" hover class="layui-input"/>
        </div>
        <div class="layui-form-item">
            <input type="password" name="password" placeholder="密 码" lay-verify="required" hover class="layui-input"/>
        </div>
        <div class="layui-form-item">
            <input type="checkbox" name="remember" title="记住密码" lay-skin="primary" checked>
        </div>
        <div class="layui-form-item">
            <button type="button" class="pear-btn pear-btn-success login" lay-submit lay-filter="login">
                登 入
            </button>
        </div>
    </form>
</x-layadmin::layouts.base>