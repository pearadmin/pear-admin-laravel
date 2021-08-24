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
        <table id="config_group-table" lay-filter="config_group-table"></table>
    </div>
</div>

<script type="text/html" id="config_group-toolbar">
    @can('configuration.config_group.create')
    <button class="pear-btn pear-btn-primary pear-btn-md" lay-event="add"><i class="layui-icon layui-icon-add-1"></i>新增</button>
    @endcan
    @can('configuration.config_group.destroy')
    <button class="pear-btn pear-btn-danger pear-btn-md" lay-event="batchRemove"><i class="layui-icon layui-icon-delete"></i>删除</button>
        @endcan
</script>

<script type="text/html" id="config_group-bar">
    <button class="pear-btn pear-btn-primary pear-btn-sm" lay-event="edit"><i class="layui-icon layui-icon-edit"></i></button>
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

            var dataTable = table.render({
                elem: '#config_group-table',
                url: '{{ route('admin.config_group.data') }}',
                response: {statusCode: 200},
                skin: 'line',
                toolbar: '#config_group-toolbar',
                defaultToolbar: ['filter', 'print', 'exports'],
                limit:15,
                page: {
                    layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip']
                        ,limits:[15,50,100]
                        ,first: false
                        ,last: false
                },
                cols: [[ //表头
                    {checkbox: true, fixed: true}
                    , {title: '序号', sort: true, width: 70, type: 'numbers'}
                    , {field: 'name', title: '名称'}
                    , {field: 'local', sort: true, title: '生效位置'}
                    , {field: 'sort', sort: true, title: '排序'}
                    , {field: 'created_at', title: '创建时间'}
                    , {field: 'updated_at', title: '更新时间'}
                    , {fixed: 'right', width: 195, align: 'center', toolbar: '#config_group-bar'}
                ]]
            });

            table.on('tool(config_group-table)', function(obj){
                if(obj.event === 'remove'){
                    window.remove(obj);
                } else if(obj.event === 'edit'){
                    window.edit(obj);
                }
            });

            table.on('toolbar(config_group-table)', function(obj){
                if(obj.event === 'add'){
                    window.add();
                } else if(obj.event === 'refresh'){
                    window.refresh();
                } else if(obj.event === 'batchRemove'){
                    window.batchRemove(obj);
                }
            });

            form.on('submit(config_group-query)', function(data){
                dataTable.reload({where:data.field})
                return false;
            });

            form.on('switch(config_group-enable)', function(obj){
                layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
            });

            window.add = function(){
                parent.layer.open({
                    type: 2,
                    title: '新增',
                    shade: 0.1,
                    area: ['400px', '250px'],
                    content: '{{ route('admin.config_group.create') }}',
                    end: function () {dataTable.reload();}
                });
            }

            window.edit = function(obj){
                parent.layer.open({
                    type: 2,
                    title: '修改',
                    shade: 0.1,
                    area: ['400px', '250px'],
                    content: '/admin/config_group/' + obj.data.id + '/edit',
                    end: function () {dataTable.reload();}
                });
            }

            window.remove = function(obj){
                parent.layer.confirm('确定要删除该组', {icon: 3, title:'提示'}, function(index){
                    parent.layer.close(index);
                    let loading = layer.load();
                    $.post("{{ route('admin.config_group.destroy') }}", {
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
                    $.post("{{ route('admin.config_group.destroy') }}", {
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

            window.refresh = function(){
                dataTable.reload();
            }
        })
    </script>
@endsection
