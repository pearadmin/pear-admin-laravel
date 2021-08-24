@extends('admin.base')

@section('content')
    {{--<div class="layui-card">
        <div class="layui-card-body">
            <form class="layui-form layui-form-pane" action="">
                <div class="layui-form-item">
                    <div class="layui-form-item layui-inline">
                        <label class="layui-form-label">分类</label>
                        <div class="layui-input-inline">
                            <select name="category" lay-verify="required">
                                <option value="">请选择分类</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                    @if(isset($category->allChilds)&&!$category->allChilds->isEmpty())
                                        @foreach($category->allChilds as $child)
                                            <option value="{{ $child->id }}" >&nbsp;&nbsp;&nbsp;┗━━{{ $child->name }}</option>
                                            @if(isset($child->allChilds)&&!$child->allChilds->isEmpty())
                                                @foreach($child->allChilds as $third)
                                                    <option value="{{ $third->id }}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;┗━━{{ $third->name }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item layui-inline">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" placeholder="请输入文章标题" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-inline">
                        <button class="pear-btn pear-btn-md pear-btn-primary" lay-submit lay-filter="article-query">
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
    </div>--}}
    <div class="layui-card">
        <div class="layui-card-body">
            <table id="article-table" lay-filter="article-table"></table>
        </div>
    </div>
    <script type="text/html" id="tags">
        <div class="layui-btn-container tag" lay-filter="tags">
            @{{# layui.each(d.tags, function(index, tag){     }}
            <button lay-id="@{{tag.id}}" type="button" class="tag-item tag-item-warm">@{{tag.name}}</button>
            @{{# }); }}
        </div>
    </script>
    <script type="text/html" id="category">
        @{{d.category.name}}
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
            var data_url = "{{ route('admin.article.data') }}";

            // 渲染表格
            var dataTable = table.render({
                skin:'line',
                method:'get',
                toolbar:'#power-toolbar',
                elem: '#article-table',
                url: data_url,
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
                    , {field: 'tags', sort: true, title: '标签', toolbar: '#tags'}
                    , {field: 'category', sort: true, title: '分类', toolbar: '#category'}
                    , {field: 'click', sort: true, title: '点击量'}
                    , {field: 'updated_at', width: 180,sort: true, title: '更新时间'}
                    , {fixed: 'right', width: 160, align: 'center', toolbar: '#options'}
                ]]
            });

            table.on('tool(article-table)',function(obj){
                if (obj.event === 'remove') {
                    window.remove(obj);
                } else if (obj.event === 'edit') {
                    window.edit(obj);
                }
            })


            table.on('toolbar(article-table)', function(obj){
                if(obj.event === 'add'){
                    window.add();
                }
            });

            window.add = function(){
                parent.layer.open({
                    type: 2,
                    title: '新增',
                    shade: 0.1,
                    area: ['800px', '680px'],
                    content: '{{ route('admin.article.create') }}',
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
                    area: ['800px', '680px'],
                    content: '/admin/article/' + obj.data.id + '/edit',
                    end: function () {
                        dataTable.reload()
                    }
                });
            }
            window.remove = function(obj){
                parent.layer.confirm('确定要删除该文章？', {icon: 3, title:'提示'}, function (index) {
                    parent.layer.close(index)
                    const loading = layer.load();
                    $.post("{{ route('admin.article.destroy') }}", {
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

            form.on('submit(article-query)', function(data){
                dataTable.reload({where:data.field})
                return false;
            });
        })
    </script>
@endsection







