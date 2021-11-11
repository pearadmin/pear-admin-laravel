<x-layadmin::layouts.base class="layui-layout-body pear-admin">
    <!-- 布 局 框 架 -->
    <div class="layui-layout layui-layout-admin">
        <!-- 顶 部 样 式 -->
        <div class="layui-header">
            <!-- 菜 单 顶 部 -->
            <div class="layui-logo">
                <!-- 图 标 -->
                <img class="logo"/>
                <!-- 标 题 -->
                <span class="title"></span>
            </div>
            <!-- 顶 部 左 侧 功 能 -->
            <ul class="layui-nav layui-layout-left">
                <li class="collaspe layui-nav-item"><a href="#" class="layui-icon layui-icon-shrink-right"></a></li>
                <li class="refresh layui-nav-item"><a href="#" class="layui-icon layui-icon-refresh-1" loading=600></a></li>
            </ul>
            <!-- 多 系 统 菜 单 -->
            <div id="control" class="layui-layout-control"></div>
            <!-- 顶 部 右 侧 菜 单 -->
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item layui-hide-xs"><a href="#" class="fullScreen layui-icon layui-icon-screen-full"></a></li>
                <li class="layui-nav-item layui-hide-xs"><a href="http://www.pearadmin.com" class="layui-icon layui-icon-website"></a></li>
                <li class="layui-nav-item layui-hide-xs message"></li>
                <li class="layui-nav-item user">
                    <!-- 头 像 -->
                    <a class="layui-icon layui-icon-username" href="javascript:;"></a>
                    <!-- 功 能 菜 单 -->
                    <dl class="layui-nav-child">
                        <dd><a user-menu-url="view/system/person.html" user-menu-id="5555" user-menu-title="基本资料">基本资料</a></dd>
                        <dd><a href="javascript:void(0);" class="logout">注销登录</a></dd>
                    </dl>
                </li>
                <!-- 主 题 配 置 -->
                <li class="layui-nav-item setting"><a href="#" class="layui-icon layui-icon-more-vertical"></a></li>
            </ul>
        </div>
        <!-- 侧 边 区 域 -->
        <div class="layui-side layui-bg-black">
            <!-- 菜 单 顶 部 -->
            <div class="layui-logo">
                <!-- 图 标 -->
                <img class="logo"/>
                <!-- 标 题 -->
                <span class="title"></span>
            </div>
            <!-- 菜 单 内 容 -->
            <div class="layui-side-scroll">
                <div id="sideMenu"></div>
            </div>
        </div>
        <!-- 视 图 页 面 -->
        <div class="layui-body">
            <!-- 内 容 页 面 -->
            <div id="content"></div>
        </div>
        <!-- 遮 盖 层 -->
        <div class="pear-cover"></div>
        <!-- 加 载 动 画 -->
        <div class="loader-main">
            <!-- 动 画 对 象 -->
            <div class="loader"></div>
        </div>
    </div>
    <!-- 移 动 端 便 捷 操 作 -->
    <div class="pear-collasped-pe collaspe">
        <a href="#" class="layui-icon layui-icon-shrink-right"></a>
    </div>
</x-layadmin::layouts.base>