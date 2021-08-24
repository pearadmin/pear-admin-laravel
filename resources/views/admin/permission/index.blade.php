@extends('admin.base')

@section('content')

<div class="layui-card">
    <div class="layui-card-body">
        <form class="layui-form layui-form-pane" action="">
        	<div class="layui-form-item">
        		<div class="layui-form-item layui-inline">
        			<label class="layui-form-label">查询关键字</label>
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
        <table id="permission-table" lay-filter="permission-table"></table>
    </div>
</div>

<script type="text/html" id="permission-toolbar">
    @can('system.permission.create')
        <button class="pear-btn pear-btn-primary pear-btn-md" lay-event="add"><i class="layui-icon layui-icon-add-1"></i>添 加</button>
    @endcan
    <button class="pear-btn pear-btn-danger pear-btn-md" lay-event="batchRemove">
        <i class="layui-icon layui-icon-delete"></i>
        删除
    </button>
	<button class="pear-btn pear-btn-success pear-btn-md" lay-event="expandAll">
	    <i class="layui-icon layui-icon-spread-left"></i>
	    展开
	</button>
	<button class="pear-btn pear-btn-success pear-btn-md" lay-event="foldAll">
	    <i class="layui-icon layui-icon-shrink-right"></i>
	    折叠
	</button>
</script>
<script type="text/html" id="tmp-icon">
    <i class="layui-icon @{{ d.icon }}"></i>
</script>
<script type="text/html" id="options-bar">
    <button class="pear-btn pear-btn-primary pear-btn-sm" lay-event="edit"><i class="layui-icon layui-icon-edit"></i></button>
    <button class="pear-btn pear-btn-danger pear-btn-sm" lay-event="remove"><i class="layui-icon layui-icon-delete"></i></button>
</script>

@endsection

@section('script')
    <script>
        layui.use(['table','form','notice','jquery','treetable'],function () {
            let table = layui.table;
            let form = layui.form;
            let notice = layui.notice;
            let $ = layui.jquery;
            let treetable = layui.treetable;

            let notify = function (type,message) {
                switch (type) {
                    case 'success':notice.success(message);break
                    case 'warning':notice.warning(message);break
                    case 'error':notice.error(message);break
                    default :notice.info(message);break
                }
            }

            window.parent.notify = notify;
            treetable.render({
                treeColIndex: 1,
                treeSpid: 0,
                treeIdName: 'id',
                treePidName: 'parent_id',
                skin:'line',
                treeDefaultClose: true,
                toolbar:'#permission-toolbar',
                elem: '#permission-table',
                url: '{{ route('admin.permission.data') }}',
                response: {statusCode: 200},
                page: false,
                cols: [
                    [
                        {type: 'checkbox'},
                        {field: 'display_name', title: '显示名称'},
                        {field: 'name', sort: true, title: '权限名称'},
                        {field: 'icon_id', title: '图标', templet: '#tmp-icon'},
                        {field: 'type_name', title: '类型'},
                        // {field: 'enable', title: '是否可用',templet:'#power-enable'},
                        {field: 'sort', title: '排序'},
                        {title: '操作',toolbar: '#options-bar', width: 150, align: 'center'}
                    ]
                ]
            });

            table.on('tool(permission-table)',function(obj){
                if (obj.event === 'remove') {
                    window.remove(obj);
                } else if (obj.event === 'edit') {
                    window.edit(obj);
                }
            })


            table.on('toolbar(permission-table)', function(obj){
                if(obj.event === 'add'){
                    window.add();
                } else if(obj.event === 'batchRemove'){
                    window.batchRemove(obj);
                }  else if(obj.event === 'expandAll'){
                    treetable.expandAll("#permission-table");
                } else if(obj.event === 'foldAll'){
                    treetable.foldAll("#permission-table");
                }
            });

            window.add = function(){
                parent.layer.open({
                    type: 2,
                    title: '新增',
                    shade: 0.1,
                    area: ['500px', '450px'],
                    content: '{{ route('admin.permission.create') }}',
                    end: function () {
                        treetable.reload('#permission-table');
                    }
                });
            }

            window.edit = function(obj){
                parent.layer.open({
                    type: 2,
                    title: '修改',
                    shade: 0.1,
                    area: ['500px', '450px'],
                    content: '/admin/permission/' + obj.data.id + '/edit',
                    end: function () {
                        treetable.reload('#permission-table');
                    }
                });
            }
            window.remove = function(obj){
                parent.layer.confirm('确定要删除该权限？', {icon: 3, title:'提示'}, function (index) {
                    parent.layer.close(index)
                    const loading = layer.load();
                    $.post("{{ route('admin.permission.destroy') }}", {
                        _method: 'delete',
                        ids: [obj.data.id]
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
            window.batchRemove = function(obj) {
                let data = table.checkStatus(obj.config.id).data;
                if (data.length === 0) {
                    layer.msg("未选中数据", {
                        icon: 3,
                        time: 1000
                    });
                    return false;
                }
                let ids = "";
                for (let i = 0; i < data.length; i++) {
                    ids += data[i].userId + ",";
                }
                ids = ids.substr(0, ids.length - 1);
                layer.confirm('确定要删除这些用户', {
                    icon: 3,
                    title: '提示'
                }, function(index) {
                    layer.close(index);
                    let loading = layer.load();
                    $.ajax({
                        url: MODULE_PATH + "batchRemove/" + ids,
                        dataType: 'json',
                        type: 'delete',
                        success: function(result) {
                            layer.close(loading);
                            if (result.success) {
                                layer.msg(result.msg, {
                                    icon: 1,
                                    time: 1000
                                }, function() {
                                    table.reload('user-table');
                                });
                            } else {
                                layer.msg(result.msg, {
                                    icon: 2,
                                    time: 1000
                                });
                            }
                        }
                    })
                });
            }
        })
    </script>
@endsection
