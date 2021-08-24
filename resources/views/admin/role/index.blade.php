@extends('admin.base')

@section('content')
<div class="layui-card">
    <div class="layui-card-body">
        <table id="role-table" lay-filter="role-table"></table>
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
    @can('system.role.edit')
         <button class="pear-btn pear-btn-primary pear-btn-sm" lay-event="edit"><i class="layui-icon layui-icon-edit"></i></button>
    @endcan
    @can('system.role.permission')
         <button class="pear-btn pear-btn-warming pear-btn-sm" lay-event="power"><i class="layui-icon layui-icon-vercode"></i></button>
    @endcan
    @can('system.role.destroy')
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
                elem: '#role-table'
                , url: "{{ route('admin.role.data') }}" //数据接口
                , response: {statusCode: 200}
                , skin: 'line'
                , toolbar: '#user-toolbar'
                , defaultToolbar: ['filter', 'print', 'exports']
                , limit:15
                , page: {
                    layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip']
                    ,limits:[15,50,100]
                    ,first: false
                    ,last: false
                }
                , cols: [[ //表头
                    {checkbox: true, fixed: true}
                    , {title: '序号', sort: true, width: 70, type: 'numbers'}
                    , {field: 'name', title: '名称'}
                    , {field: 'display_name', title: '显示名称'}
                    , {field: 'created_at', title: '创建时间'}
                    , {fixed: 'right', width: 260, align: 'center', toolbar: '#user-bar'}
                ]]
            });

            table.on('tool(role-table)', function(obj) {
                if (obj.event === 'remove') {
                    window.remove(obj);
                } else if (obj.event === 'edit') {
                    window.edit(obj);
                } else if (obj.event === 'power') {
                    window.power(obj);
                }
            });

            table.on('toolbar(role-table)', function(obj) {
                if (obj.event === 'add') {
                    window.add();
                } else if (obj.event === 'refresh') {
                    window.refresh();
                } else if (obj.event === 'batchRemove') {
                    window.batchRemove(obj);
                }
            });

            form.on('submit(user-query)', function(data) {
                table.reload('#user-query');
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
                    content: '{{ route('admin.role.create') }}',
                    end:function () {
                        table.reload('#user-query');
                    }
                });
            }

            window.edit = function(obj) {
                parent.layer.open({
                    type: 2,
                    title: '修改',
                    shade: 0.1,
                    area: ['500px', '400px'],
                    content: '/admin/role/' + obj.data.id + '/edit',
                    end:function () {
                        table.reload('#role-table');
                    }
                });
            }

            window.power = function(obj) {
                parent.layer.open({
                    type: 2,
                    title: '权限',
                    shade: 0.1,
                    area: ['500px', '400px'],
                    content: '/admin/role/' + obj.data.id + '/permission',
                    end:function () {
                        table.reload('#role-table');
                    }
                });
            }

            window.remove = function(obj) {
                parent.layer.confirm('确定要删除该组', {icon: 3, title: '提示'}, function(index) {
                    parent.layer.close(index);
                    loading.Load(5,'正在删除');
                    $.post("{{ route('admin.role.destroy') }}", {
                        _method: 'delete',
                        ids: [obj.data.id]
                    }, function (result) {
                        loading.loadRemove(0);
                        if (result.code === 200) {
                            table.reload('#role-table');
                            notice.success(result.msg)
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
                let ids = [];
                for(let i = 0;i<data.length;i++){
                    ids.push(data[i].id);
                }
                parent.layer.confirm('确定要删除这些组', {icon: 3, title:'提示'}, function(index){
                    parent.layer.close(index);
                    loading.Load(5,'正在删除');
                    $.post("{{ route('admin.role.destroy') }}", {
                        _method: 'delete',
                        ids: ids
                    }, function (result) {
                        loading.loadRemove(0);
                        if (result.code === 200) {
                            table.reload('#role-table');
                            notice.success(result.msg)
                        } else {
                            notice.error(result.msg)
                        }
                    });
                });
            }

            window.refresh = function(param) {
                table.reload('#role-table');
            }
        })
    </script>
@endsection
