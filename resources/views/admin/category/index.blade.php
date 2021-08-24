@extends('admin.base')

@section('content')
<div class="layui-card">
    <div class="layui-card-body">
        <table id="category-table" lay-filter="category-table"></table>
    </div>
</div>

<script type="text/html" id="options">
    <div class="layui-btn-group">
        <button class="pear-btn pear-btn-primary pear-btn-sm" lay-event="edit"><i class="layui-icon layui-icon-edit"></i></button>
        <button class="pear-btn pear-btn-danger pear-btn-sm" lay-event="del"><i class="layui-icon layui-icon-delete"></i></button>
    </div>
</script>
<script type="text/html" id="power-toolbar">
    <button class="pear-btn pear-btn-primary pear-btn-md" lay-event="add"><i class="layui-icon layui-icon-add-1"></i>添 加</button>
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
@endsection

@section('script')
    <script>
        layui.use(['layer','table','form','jquery','notice','treetable'],function () {
            let $ = layui.jquery;
            let layer = layui.layer;
            let notice = layui.notice;
            let form = layui.form;
            let table = layui.table;
            let treetable = layui.treetable;

            // 渲染表格
            var dataTable = treetable.render({
                treeColIndex: 1,
                treeSpid: 0,
                treeIdName: 'id',
                treePidName: 'parent_id',
                treeDefaultClose: true,
                skin:'line',
                method:'get',
                toolbar:'#power-toolbar',
                page: false,
                elem: '#category-table',
                url: "{{ route('admin.category.data') }}",
                response: {statusCode: 200},
                cols: [[ //表头
                    {type: 'checkbox'}
                    , {field: 'name', sort: true, title: '名称'}
                    , {field: 'sort', sort: true, title: '序号'}
                    , {field: 'updated_at', sort: true, title: '更新时间'}
                    , {fixed: 'right', width: 260, align: 'center', toolbar: '#options'}
                ]]
            });

            table.on('tool(category-table)',function(obj){
                if (obj.event === 'remove') {
                    window.remove(obj);
                } else if (obj.event === 'edit') {
                    window.edit(obj);
                }
            })


            table.on('toolbar(category-table)', function(obj){
                if(obj.event === 'add'){
                    window.add();
                } else if(obj.event === 'batchRemove'){
                    window.batchRemove(obj);
                }  else if(obj.event === 'expandAll'){
                    dataTable.expandAll();
                } else if(obj.event === 'foldAll'){
                    dataTable.foldAll();
                }
            });

            window.add = function(){
                parent.layer.open({
                    type: 2,
                    title: '新增',
                    shade: 0.1,
                    area: ['400px', '280px'],
                    content: '{{ route('admin.category.create') }}',
                    end: function () {
                        dataTable.reload();
                    }
                });
            }

            window.edit = function(obj){
                parent.layer.open({
                    type: 2,
                    title: '修改',
                    shade: 0.1,
                    area: ['400px', '280px'],
                    content: '/admin/category/' + obj.data.id + '/edit',
                    end: function () {
                        dataTable.reload();
                    }
                });
            }
            window.remove = function(obj){
                parent.layer.confirm('确定要删除该分类？', {icon: 3, title:'提示'}, function (index) {
                    parent.layer.close(index)
                    const loading = layer.load();
                    $.post("{{ route('admin.category.destroy') }}", {
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

        })
    </script>
@endsection
