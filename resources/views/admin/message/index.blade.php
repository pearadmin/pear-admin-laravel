@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-body">
            <form class="layui-form layui-form-pane" action="">
                <div class="layui-form-item">
                    <div class="layui-form-item layui-inline">
                        <label class="layui-form-label">关键字</label>
                        <div class="layui-input-inline">
                            <input type="text" name="keyword" placeholder="" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-inline">
                        <button class="pear-btn pear-btn-md pear-btn-primary" lay-submit lay-filter="message-query">
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
            <table id="message-table" lay-filter="message-table"></table>
        </div>
    </div>
    <script type="text/html" id="message-toolbar">
        <button class="pear-btn pear-btn-danger pear-btn-md" lay-event="batchRead"><i class="layui-icon layui-icon-delete"></i>删除</button>
    </script>

    <script type="text/html" id="message-person">
        <img src="@{{d.album}}" height="30">名称:@{{d.name}}|邮箱:@{{d.email}}|电话:@{{d.phone}}
    </script>
    <script type="text/html" id="message-bar">
        <button class="pear-btn pear-btn-primary pear-btn-sm" lay-event="edit"><i class="layui-icon layui-icon-edit"></i></button>
    </script>
@endsection

@section('script')
    <script>
        layui.use(['table', 'form','notice','loading','jquery'], function() {
            let table = layui.table;
            let form = layui.form;
            let notice = layui.notice;
            let $ = layui.jquery;
            let loading = layui.loading;

            const dataTable = function() {
                table.render({
                    elem: '#message-table'
                    , url: "{{ route('admin.message.data') }}" //数据接口
                    , response: {statusCode: 200}
                    , skin: 'line'
                    , toolbar: '#message-toolbar'
                    , defaultToolbar: ['filter', 'print', 'exports']
                    ,limit:15
                    ,page: {
                        layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip']
                        ,limits:[15,50,100]
                        ,first: false
                        ,last: false
                    }
                    , cols: [[ //表头
                        {checkbox: true, fixed: true}
                        , {title: '序号', sort: true, width: 70, type: 'numbers'}
                        , {field: 'subject', title: '主题'}
                        , {field: 'name', title: '留言人', toolbar: '#message-person'}
                        , {field: 'context', title: '留言内容'}
                        , {field: 'created_at', title: '创建时间'}
                        , {fixed: 'right', width: 90, align: 'center', toolbar: '#message-bar'}
                    ]]
                });
            }

            ;
            table.on('tool(message-table)', function(obj) {
                if (obj.event === 'read') {
                    window.read(obj);
                }
            });

            table.on('toolbar(message-table)', function(obj) {
                if (obj.event === 'batchRead') {
                    window.batchRead(obj);
                }
            });

            form.on('submit(message-query)', function(data) {
                table.reload('#message-query',{where:data.field});
                return false;
            });

            form.on('switch(message-enable)', function(obj) {
                layer.tips(this.value + ' ' + this.name + '：' + obj.elem.checked, obj.othis);
            });

            window.read = function(obj) {
                loading.Load(5,'正在删除');
                $.post("{{ route('admin.role.destroy') }}", {
                    _method: 'delete',
                    ids: [obj.data.id]
                }, function (result) {
                    loading.loadRemove(0);
                    if (result.code === 200) {
                        table.reload('#message-query');
                        notice.success(result.msg)
                    } else {
                        notice.error(result.msg)
                    }
                });
            }

            window.batchRead = function(obj){
                let data = table.checkStatus(obj.config.id).data;
                if(data.length === 0){
                    notice.error('未选中数据')
                    return false;
                }
                let ids = [];
                for(let i = 0;i<data.length;i++){
                    ids.push(data[i].id);
                }
                parent.layer.confirm('确定要把这些信息置为已读?', {icon: 3, title:'提示'}, function(index){
                    parent.layer.close(index);
                    loading.Load(5,'正在处理');
                    $.post("{{ route('admin.message.read') }}", {
                        _method: 'delete',
                        ids: ids
                    }, function (result) {
                        loading.loadRemove(0);
                        if (result.code === 200) {
                            table.reload('#message-query');
                            notice.success(result.msg)
                        } else {
                            notice.error(result.msg)
                        }
                    });
                });
            }

            window.refresh = function(param) {
                table.reload('#message-query');
            }
        })
    </script>
@endsection
