@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-body">
            <form class="layui-form layui-form-pane" action="">
                <div class="layui-form-item">
                    <div class="layui-form-item layui-inline">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" placeholder="请输入文章标题" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-inline">
                        <button class="pear-btn pear-btn-md pear-btn-primary" lay-submit lay-filter="service-query">
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
            <table id="service-table" lay-filter="service-table"></table>
        </div>
    </div>
    <script type="text/html" id="icons">
        <i class="layui-icon @{{ d.icon }}"></i>
    </script>
    <script type="text/html" id="image">
        @{{# layui.each(d.file, function(index, item){  }}
        <img src="@{{  item.link }}" height="35">
        @{{# }); }}
    </script>
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
    </script>
@endsection

@section('script')
    <script>
        layui.use(['layer','table','form','tag','jquery','notice'],function () {
            let $ = layui.jquery;
            let layer = layui.layer;
            let notice = layui.notice;
            let form = layui.form;
            let table = layui.table;
            var tag = layui.tag;
            let notify = function (type,message) {
                switch (type) {
                    case 'success':notice.success(message);break
                    case 'warning':notice.warning(message);break
                    case 'error':notice.error(message);break
                    default :notice.info(message);break
                }
            }

            window.parent.notify = notify;
            // 渲染表格
            var dataTable = table.render({
                skin:'line',
                method:'get',
                toolbar:'#power-toolbar',
                elem: '#service-table',
                url: '{{ route('admin.service.data') }}',
                response: {statusCode: 200},
                limit:15,
                defaultToolbar: ['filter', 'print', 'exports'],
                page: {
                    layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip']
                    ,limits:[15,50,100]
                    ,first: false
                    ,last: false
                },
                cols: [[
                    {type: 'checkbox'}
                    , {title: '序号', sort: true, width: 70,type:'numbers'}
                    , {field: 'title', width: 360,sort: true, title: '标题'}
                    , {field: 'icon', sort: true, title: '图标', toolbar: '#icons'}
                    , {field: 'image', sort: true, title: '图片', toolbar: '#image'}
                    , {field: 'updated_at', width: 180,sort: true, title: '更新时间'}
                    , {fixed: 'right', width: 160, align: 'center', toolbar: '#options'}
                ]]
            });

            table.on('tool(service-table)',function(obj){
                if (obj.event === 'remove') {
                    window.remove(obj);
                } else if (obj.event === 'edit') {
                    window.edit(obj);
                }
            })


            table.on('toolbar(service-table)', function(obj){
                if(obj.event === 'add'){
                    window.add();
                }
            });

            window.add = function(){
                parent.layer.open({
                    type: 2,
                    title: '新增',
                    shade: 0.1,
                    area: ['600px', '500px'],
                    content: '{{ route('admin.service.create') }}',
                    end: function () {
                        dataTable.reload()
                    }
                });
            }

            window.edit = function(obj){
                parent.layer.open({
                    type: 2,
                    title: '修改',
                    shade: 0.1,
                    area: ['600px', '500px'],
                    content: '/admin/service/' + obj.data.id + '/edit',
                    end: function () {
                        dataTable.reload()
                    }
                });
            }
            window.remove = function(obj){
                parent.layer.confirm('确定要删除该文章？', {icon: 3, title:'提示'}, function (index) {
                    parent.layer.close(index)
                    const loading = layer.load();
                    $.post("{{ route('admin.service.destroy') }}", {
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

            form.on('submit(service-query)', function(data){
                dataTable.reload({where:data.field})
                return false;
            });
        })
    </script>
@endsection







