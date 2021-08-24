@extends('admin.base')

@section('content')
<div class="layui-card">
    <div class="layui-card-body">
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <li class="layui-this">登录日志</li>
                <li>操作日志</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <table style="margin-top: 10px;" id="log-login-table" lay-filter="log-login-table"></table>
                </div>
                <div class="layui-tab-item">
                    <table style="margin-top: 10px;" id="log-operate-table" lay-filter="log-operate-table"></table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/html" id="login_log-bar">
    <button class="pear-btn pear-btn-danger pear-btn-sm" lay-event="remove_login"><i class="layui-icon layui-icon-delete"></i></button>
</script>
<script type="text/html" id="operate_log-bar">
    <button class="pear-btn pear-btn-danger pear-btn-sm" lay-event="remove_operate"><i class="layui-icon layui-icon-delete"></i></button>
</script>
@endsection

@section('script')
    <script>
        layui.use(['table','form','notice','loading','jquery'],function () {
            let table = layui.table;
            let form = layui.form;
            let loading = layui.loading;
            let notice = layui.notice;
            let $ = layui.jquery;
            let notify = function (type,message) {
                switch (type) {
                    case 'success':notice.success(message);break
                    case 'warning':notice.warning(message);break
                    case 'error':notice.error(message);break
                    default :notice.info(message);break
                }
            }

            window.parent.notify = notify;
            let cols1 = [[ //表头
                {checkbox: true, fixed: true}
                , {title: '序号', sort: true, width: 70, type: 'numbers'}
                , {field: 'username', title: '用户名'}
                , {field: 'ip', sort: true, title: 'ip地址'}
                , {field: 'method', sort: true, title: '请求方式'}
                , {field: 'user_agent', sort: true, title: 'UserAgent'}
                , {field: 'created_at', title: '登录时间'}
                , {title: '操作',templet: '#login_log-bar', width: 100, align: 'center'}
            ]];
            let cols2 = [[ //表头
                {checkbox: true, fixed: true}
                , {title: '序号', sort: true, width: 70,type:'numbers'}
                , {field: 'username', title: '用户名'}
                , {field: 'method', sort: true, title: '请求方式'}
                , {field: 'uri', sort: true, title: '请求Url'}
                , {field: 'created_at', title: '创建时间'}
                , {title: '操作',templet: '#operate_log-bar', width: 100, align: 'center'}
            ]];

            table.render({
                elem: '#log-login-table',
                url: '{{ route('admin.login_log.data') }}',
                response: {statusCode: 200},
                cols: cols1 ,
                skin: 'line',
                toolbar: false,
                defaultToolbar: ['filter', 'print', 'exports'],
                page: {
                    layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip']
                    ,limits:[15,50,100]
                    ,first: false
                    ,last: false
                },
            });

            table.render({
                elem: '#log-operate-table',
                url: '{{ route('admin.operate_log.data') }}',
                response: {statusCode: 200},
                cols: cols2 ,
                skin: 'line',
                toolbar: false,
                defaultToolbar: ['filter', 'print', 'exports'],
                limit:15,
                page: {
                    layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip'],
                    limits:[15,50,100],
                    first: false,
                    last: false
                }
            });

            table.on('tool(log-login-table)',function(obj){
                if (obj.event === 'remove_login') {
                    window.removeLogin(obj);
                }
            })
            table.on('tool(log-operate-table)',function(obj){
                if (obj.event === 'remove_operate') {
                    window.removeOperate(obj);
                }
            })
            form.on('submit(dict-type-query)', function(data){
                table.reload('dict-type-table',{where:data.field})
                return false;
            });

            window.error = function(obj){
                layer.open({
                    type: 1,
                    title: '异常信息',
                    shade: 0,
                    area: ['450px', '350px'],
                    content: '<div class="pear-container"><div class="layui-card"><div class="layui-card-body">'+obj.data['error']+'</div></div></div>'
                });
            }

            window.removeLogin = function(obj){
                parent.layer.confirm('确定要删除该日志？', {icon: 3, title:'提示'}, function (index) {
                    parent.layer.close(index)
                    loading.Load(5,'正在删除中');
                    $.post("{{ route('admin.login_log.destroy') }}", {
                        _method: 'delete',
                        ids: [obj.data.id]
                    }, function (result) {
                        loading.loadRemove(1000);
                        if (result.code === 200) {
                            notice.success(result.msg)
                            obj.del();
                        } else {
                            notice.error(result.msg)
                        }
                    });
                });
            }
            window.removeOperate = function(obj){
                parent.layer.confirm('确定要删除该权限？', {icon: 3, title:'提示'}, function (index) {
                    parent.layer.close(index)
                    loading.Load(5,'正在删除中');
                    $.post("{{ route('admin.operate_log.destroy') }}", {
                        _method: 'delete',
                        ids: [obj.data.id]
                    }, function (result) {
                        loading.loadRemove(1000);
                        if (result.code === 200) {
                            notice.success(result.msg)
                            obj.del();
                        } else {
                            notice.error(result.msg)
                        }
                    });
                });
            }
        })
    </script>
@endsection
