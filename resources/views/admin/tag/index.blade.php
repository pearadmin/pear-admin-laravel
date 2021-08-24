@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header">标签管理</div>
        <div class="layui-card-body">
            <div class="layui-btn-container tag" lay-filter="fillet" lay-allowclose="true" lay-newTag="true">
                @foreach($tags as $tag)
                    <button lay-id="{{$tag->id}}" type="button" class="tag-item">{{$tag->name}}</button>
                @endforeach
            </div>
        </div>
    </div>
    <form class="layui-form" id="tag_form" action="{{route('admin.tag.store')}}" method="post" style="display: none">
        {{csrf_field()}}
        <input type="hidden" name="name" id="tag_add"/>
    </form>
@endsection

@section('script')
    <script>
        layui.use(['layer', 'tag', 'notice','loading'], function () {
            var $ = layui.jquery;
            var layer = layui.layer;
            var notice = layui.notice;
            var tag = layui.tag;
            var loading = layui.loading;

            let notify = function (type,message) {
                switch (type) {
                    case 'success':notice.success(message);break
                    case 'warning':notice.warning(message);break
                    case 'error':notice.error(message);break
                    default :notice.info(message);break
                }
            }
            window.parent.notify = notify;

            tag.render("fillet", {
                skin: 'layui-btn layui-btn-primary layui-btn-sm layui-btn-radius', //标签样式
                tagText: '<i class="layui-icon layui-icon-add-1"></i>添加标签' //标签添加按钮提示文本
            });

            tag.on('click(fillet)', function(data) {
                /*console.log('点击');
                console.log(this); //当前Tag标签所在的原始DOM元素
                console.log(data.index); //得到当前Tag的所在下标
                console.log(data.elem); //得到当前的Tag大容器*/
            });

            tag.on('add(fillet)', function(data) {
                var othis = data.othis;
                var tag = $(othis).attr('lay-value');
                loading.Load(5,"");
                $.ajax({
                    url:'{{route('admin.tag.store')}}',
                    data: {'_token': '{{csrf_token()}}','name':tag},
                    dataType:'json',
                    type:'post',
                    success:function(result){
                        loading.loadRemove(100);
                        if (result.code === 200) {
                            notice.success(result.msg)
                        } else {
                            notice.error(result.msg)
                            return false;
                        }
                    },
                    error:function(msg){
                        loading.loadRemove(100);
                        console.log(msg)
                        let json = JSON.parse(msg.responseText);
                        json = json.errors;
                        for (const item in json) {
                            for (let i = 0; i < json[item].length; i++) {
                                notice.warning(json[item][i])
                                return false ; //遇到验证错误，就退出
                            }
                        }
                    }
                })
            });

            tag.on('input(fillet)', function(data) {
                console.log('输入');
                console.log(this); //当前Tag标签所在的原始DOM元素
                console.log(data); //得到新增的DOM对象
                return false; //返回false 取消新增操作； 同from表达提交事件。
                var load = layer.load();
                $.post("{{ route('admin.tag.store') }}", {
                    _method: 'post',
                    tag: tag
                }, function (res) {
                    layer.close(load);
                    if (res.code === 200) {
                        notice.success(res.msg)
                    } else {
                        notice.error(res.msg)
                    }
                });
            });

            tag.on('delete(fillet)', function(data) {
                layer.confirm('确认删除吗？', function (index) {
                    layer.close(index);
                    var load = layer.load();
                    $.post("{{ route('admin.tag.destroy') }}", {
                        _method: 'delete',
                        ids: [data.id]
                    }, function (res) {
                        layer.close(load);
                        if (res.code === 200) {
                            layer.msg(res.msg, {icon: 1}, function () {
                                obj.del();
                            })
                        } else {
                            layer.msg(res.msg, {icon: 2})
                        }
                    });
                });
                console.log('删除');
                console.log(this); //当前Tag标签所在的原始DOM元素
                console.log(data.index); //得到当前Tag的所在下标
                console.log(data.elem); //得到当前的Tag大容器
            });
        })
    </script>
@endsection
