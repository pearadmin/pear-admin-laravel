@extends('admin.base')

@section('content')
<div class="layui-card">
    <div class="layui-card-body">
        <form class="layui-form layui-form-pane" action="">
            <div class="layui-form-item">
                <div class="layui-form-item layui-inline">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-inline">
                        <input type="text" name="realName" placeholder="" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-inline">
                    <label class="layui-form-label">性别</label>
                    <div class="layui-input-inline">
                        <input type="text" name="realName" placeholder="" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-inline">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-inline">
                        <input type="text" name="realName" placeholder="" class="layui-input">
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
        <table id="user-table" lay-filter="user-table"></table>
    </div>
</div>

<script type="text/html" id="user-toolbar">
    @can('system.role.create')
    <button class="pear-btn pear-btn-primary pear-btn-md" lay-event="add"><i class="layui-icon layui-icon-add-1"></i>新增</button>
    @endcan
    @can('system.role.destroy')
    <button class="pear-btn pear-btn-danger pear-btn-md" lay-event="batchRemove"><i class="layui-icon layui-icon-delete"></i>删除</button>
    @endcan
</script>

<script type="text/html" id="user-bar">
    @can('system.user.edit')
         <button class="pear-btn pear-btn-primary pear-btn-sm" lay-event="edit"><i class="layui-icon layui-icon-edit"></i></button>
    @endcan
    @can('system.user.permission')
         <button class="pear-btn pear-btn-warming pear-btn-sm" lay-event="power"><i class="layui-icon layui-icon-vercode"></i></button>
    @endcan
    @can('system.user.role')
         <button class="pear-btn pear-btn-success pear-btn-sm" lay-event="role"><i class="layui-icon layui-icon-user"></i></button>
    @endcan
    @can('system.user.destroy')
         <button class="pear-btn pear-btn-danger pear-btn-sm" lay-event="remove"><i class="layui-icon layui-icon-delete"></i></button>
    @endcan
</script>
@endsection

@section('script')
    <script>
        layui.use(['table', 'form','notice','loading','jquery','common'], function() {
            let table = layui.table;
            let form = layui.form;
            let notice = layui.notice;
            let $ = layui.jquery;
            let loading = layui.loading;

            let notify = function (type,message) {
                switch (type) {
                    case 'success':notice.success(message);break
                    case 'warning':notice.warning(message);break
                    case 'error':notice.error(message);break
                    default :notice.info(message);break
                }
            }

            window.parent.notify = notify;

            table.render({
                elem: '#user-table',
                url: '{{ route('admin.user.data') }}',
                response: {statusCode: 200},
                skin: 'line',
                toolbar: '#user-toolbar',
                limit:15,
                defaultToolbar: ['filter', 'print', 'exports'],
                page: {
                    layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip']
                    ,limits:[15,50,100]
                    ,first: false
                    ,last: false
                },
                cols: [[ //表头
                    {checkbox: true, fixed: true}
                    , {title: '序号', sort: true, width: 70, type: 'numbers'}
                    , {field: 'username', sort: true, title: '用户名'}
                    , {field: 'nickname', sort: true, title: '昵称'}
                    , {field: 'email', sort: true, title: '邮箱'}
                    , {field: 'phone', sort: true, title: '电话'}
                    , {field: 'created_at', sort: true, title: '注册时间'}
                    , {fixed: 'right', width: 200, align: 'center', toolbar: '#user-bar'}
                ]]
            });

            table.on('tool(user-table)', function(obj) {
                if (obj.event === 'remove') {
                    window.remove(obj);
                } else if (obj.event === 'edit') {
                    window.edit(obj);
                } else if (obj.event === 'power') {
                    window.power(obj);
                } else if (obj.event === 'role') {
                    window.role(obj);
                }
            });

            table.on('toolbar(user-table)', function(obj) {
                if (obj.event === 'add') {
                    window.add();
                } else if (obj.event === 'refresh') {
                    window.refresh();
                } else if (obj.event === 'batchRemove') {
                    window.batchRemove(obj);
                }
            });

            form.on('submit(user-query)', function(data) {
                table.reload('#user-table');
                return false;
            });

            form.on('switch(user-enable)', function(obj) {
                layer.tips(this.value + ' ' + this.name + '：' + obj.elem.checked, obj.othis);
            });

            window.add = function() {
                parent.layer.open({
                    type: 2,
                    title: '新增',
                    shade: 0.1,
                    area: ['500px', '400px'],
                    content: '{{ route('admin.user.create') }}',
                    end:function () {
                        table.reload('#user-table');
                    }
                });
            }

            window.edit = function(obj) {
                parent.layer.open({
                    type: 2,
                    title: '修改',
                    shade: 0.1,
                    area: ['500px', '400px'],
                    content: '/admin/user/' + obj.data.id + '/edit',
                    end:function () {
                        table.reload('#user-table');
                    }
                });
            }

            window.power = function(obj) {
                parent.layer.open({
                    type: 2,
                    title: '权限',
                    shade: 0.1,
                    area: ['500px', '400px'],
                    content: '/admin/user/' + obj.data.id + '/permission',
                    end:function () {
                        table.reload('#user-table');
                    }
                });
            }
            window.role = function(obj) {
                parent.layer.open({
                    type: 2,
                    title: '角色',
                    shade: 0.1,
                    area: ['400px', '300px'],
                    content: '/admin/user/' + obj.data.id + '/role',
                    end:function () {
                        table.reload('#user-table');
                    }
                });
            }

            window.remove = function(obj) {
                parent.layer.confirm('确定要删除该用户', {icon: 3, title: '提示'}, function(index) {
                    parent.layer.close(index);
                    loading.Load(5,'正在删除');
                    $.post("{{ route('admin.user.destroy') }}", {
                        _method: 'delete',
                        ids: [obj.data.id]
                    }, function (result) {
                        loading.loadRemove(0);
                        if (result.code === 200) {
                            table.reload('#user-table');
                            notice.success(result.msg)
                        } else {
                            notice.error(result.msg)
                        }
                    });
                });
            }

            window.batchRemove = function(obj){
                console.log(obj)
                let data = table.checkStatus(obj.config.id).data;
                if(data.length === 0){
                    notice.error('未选中数据')
                    return false;
                }
                let ids = [];
                for(let i = 0;i<data.length;i++){
                    ids.push(data[i].id);
                }
                parent.layer.confirm('确定要删除这些用户', {icon: 3, title:'提示'}, function(index){
                    parent.layer.close(index);
                    loading.Load(5,'正在删除');
                    $.post("{{ route('admin.user.destroy') }}", {
                        _method: 'delete',
                        ids: ids
                    }, function (result) {
                        loading.loadRemove(0);
                        if (result.code === 200) {
                            table.reload('#user-table');
                            notice.success(result.msg)
                        } else {
                            notice.error(result.msg)
                        }
                    });
                });
            }

            window.refresh = function(param) {
                table.reload('#user-table');
            }
        })
    </script>
@endsection



