@extends('admin.base')

@section('content')
<div class="layui-card">
    <div class="layui-card-body">
        <form class="layui-form layui-form-pane" action="">
            <div class="layui-form-item">
                <div class="layui-form-item layui-inline">
                    <label for="" class="layui-form-label">登录时间</label>
                    <div class="layui-input-inline">
                        <input type="text" name="created_at_start" id="created_at_start" placeholder="开始时间" readonly class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">-</div>
                    <div class="layui-input-inline">
                        <input type="text" name="created_at_end" id="created_at_end" placeholder="结束时间" readonly class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-inline">
                    <label for="" class="layui-form-label">用户名</label>
                    <div class="layui-input-inline">
                        <input type="text" name="username" placeholder="输入用户名" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-inline">
                    <button class="pear-btn pear-btn-md pear-btn-primary" lay-submit lay-filter="user-query">
                        <i class="layui-icon layui-icon-search"></i>
                        查询
                    </button>
                    <button type="reset" class="pear-btn pear-btn-md">
                        <i class="layui-icon layui-icon-refresh"></i>
                        重置
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="layui-card">
    <div class="layui-card-body">
        <table id="login_log-table" lay-filter="login_log-table"></table>
    </div>
</div>

<script type="text/html" id="login_log-toolbar">
    @can('system.login_log.destroy')
        <button class="pear-btn pear-btn-danger pear-btn-md" lay-event="batchRemove"><i class="layui-icon layui-icon-delete"></i>删除</button>
    @endcan
</script>

<script type="text/html" id="login_log-bar">
    <button class="pear-btn pear-btn-danger pear-btn-sm" lay-event="remove"><i class="layui-icon layui-icon-delete"></i></button>
</script>
@endsection

@section('script')
    <script>
        layui.use(['table','form','notice','jquery'],function () {
            let table = layui.table;
            let form = layui.form;
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
            //用户表格初始化
            var dataTable = function () {
                table.render({
                    elem: '#login_log-table'
                    , autoSort: false
                    , url: "{{ route('admin.login_log.data') }}" //数据接口
                    , response: {statusCode: 200}
                    , page: true
                    , skin: 'line'
                    , toolbar: '#login_log-toolbar'
                    , cols: [[ //表头
                        {checkbox: true, fixed: true}
                        , {title: '序号', sort: true, width: 70, type: 'numbers'}
                        , {field: 'username', title: '用户名'}
                        , {field: 'ip', sort: true, title: 'ip地址'}
                        , {field: 'method', sort: true, title: '请求方式'}
                        , {field: 'user_agent', sort: true, title: 'UserAgent'}
                        , {field: 'created_at', title: '登录时间'}
                        , {fixed: 'right', align: 'center', toolbar: '#login_log-bar'}
                    ]]
                });
            }

            table.on('tool(login_log-table)', function(obj){
                if(obj.event === 'remove'){
                    window.remove(obj);
                }
            });

            window.remove = function(obj){
                parent.layer.confirm('确定要删除该组', {icon: 3, title:'提示'}, function(index){
                    parent.layer.close(index);
                    let loading = layer.load();
                    $.post("{{ route('admin.login_log.destroy') }}", {
                        _method: 'delete',
                        ids: [data.id]
                    }, function (result) {
                        parent.layer.close(loading);
                        if (result.code === 200) {
                            notice.success(result.msg)
                            obj.del();
                        } else {
                            notice.error(result.msg)
                        }
                    });
                });
            }

            window.batchRemove = function(obj){
                let data = table.checkStatus(obj.config.id).data;
                if(data.length === 0){
                    notice.error('未选中数据')
                    return false;
                }
                let ids = "";
                for(let i = 0;i<data.length;i++){
                    ids += data[i].userId+",";
                }
                ids = ids.substr(0,ids.length-1);
                parent.layer.confirm('确定要删除这些组', {icon: 3, title:'提示'}, function(index){
                    parent.layer.close(index);
                    let loading = layer.load();
                    $.post("{{ route('admin.login_log.destroy') }}", {
                        _method: 'delete',
                        ids: ids
                    }, function (result) {
                        parent.layer.close(loading);
                        if (result.code === 200) {
                            notice.success(result.msg)
                            obj.del();
                        } else {
                            notice.error(result.msg)
                        }
                    });
                });
            }

            form.on('submit(login_log-query)', function(data){
                dataTable.reload({
                    where:data.field,
                    page:{cur:1}
                });
                return false;
            });

            window.refresh = function(){
                table.reload('#login_log-query');
            }
        })
    </script>
@endsection
