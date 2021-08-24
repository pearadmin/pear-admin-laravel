@extends('admin.base')

@section('content')
    <div class="layui-card">
    <div class="layui-card-body">
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                @foreach($groups as $group)
                    <li @if($loop->index==0) class="layui-this" @endif >{{$group->name}}</li>
                @endforeach
            </ul>
            <div class="layui-tab-content">
                @foreach($groups as $group)
                    <div class="layui-tab-item @if($loop->index==0) layui-show @endif">
                        <form class="layui-form">
                            @foreach($group->configs as $config)
                                <div class="layui-form-item">
                                    <label for="" style="min-width: 145px" class="layui-form-label">{{$config->label}}</label>
                                    <div class="layui-input-inline" style="min-width: 600px">
                                        @switch($config->type)
                                            @case('input')
                                            <input type="input" class="layui-input" name="{{$config->key}}" value="{{$config->val}}">
                                            @break
                                            @case('textarea')
                                            <textarea name="{{$config->key}}" class="layui-textarea">{{$config->val}}</textarea>
                                            @break
                                            @case('select')
                                            <select name="{{$config->key}}">
                                                @if($config->content)
                                                    @foreach(explode("|",$config->content) as $v)
                                                        @php
                                                            $key = \Illuminate\Support\Str::before($v,':');
                                                            $val = \Illuminate\Support\Str::after($v,':');
                                                        @endphp
                                                        <option value="{{$key}}" @if($key==$config->val) selected @endif >{{$val}}</option>
                                                    @endforeach
                                                @endif
                                                </select>
                                            @break
                                            @case('radio')
                                            @if($config->content)
                                                @foreach(explode("|",$config->content) as $v)
                                                    @php
                                                        $key = \Illuminate\Support\Str::before($v,':');
                                                        $val = \Illuminate\Support\Str::after($v,':');
                                                    @endphp
                                                    <input type="radio" name="{{$config->key}}" value="{{$key}}" @if($key==$config->val) checked @endif title="{{$val}}">
                                                @endforeach
                                            @endif
                                            @break
                                            @case('image')
                                            <div class="layui-upload">
                                                    <button type="button" class="layui-btn layui-btn-sm uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
                                                    <div class="layui-upload-list" >
                                                        <ul class="layui-upload-box layui-clear">
                                                            @if($config->val)
                                                                <li><img src="{{ $config->val }}" /><p>上传成功</p></li>
                                                            @endif
                                                        </ul>
                                                        <input type="hidden" class="layui-upload-input" name="{{$config->key}}" value="{{$config->val}}">
                                                    </div>
                                                </div>
                                            @break
                                            @default
                                            @break
                                        @endswitch
                                    </div>
                                    <div class="layui-form-mid layui-word-aux">{!! $config->tips !!}</div>
                                </div>
                            @endforeach
                            <hr/>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button type="submit" class="pear-btn pear-btn-info pear-btn-sm" lay-submit="" lay-filter="config_group"><i class="layui-icon layui-icon-ok"></i>提交</button>
                                    <button type="button" class="pear-btn pear-btn-primary pear-btn-sm  add-config_group"><i class="layui-icon layui-icon-add-1"></i>新增</button>
                                </div>
                            </div>
                        </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        layui.use(['layer', 'table','notice','loading', 'form','upload','element'], function () {
            var $ = layui.jquery;
            var layer = layui.layer;
            var form = layui.form;
            var table = layui.table;
            var notice = layui.notice;
            var loading = layui.loading;
            var upload = layui.upload;
            let notify = function (type,message) {
                switch (type) {
                    case 'success':notice.success(message);break
                    case 'warning':notice.warning(message);break
                    case 'error':notice.error(message);break
                    default :notice.info(message);break
                }
            }
            window.parent.notify = notify;

            //图片
            $(".uploadPic").each(function (index,elem) {
                upload.render({
                    elem: $(elem)
                    ,url: '{{ route("api.upload_file") }}'
                    ,multiple: false
                    ,data:{"_token":"{{ csrf_token() }}"}
                    ,done: function(result){
                        //如果上传失败
                        if(result.code === 200){
                            layer.msg(res.msg,{icon:1},function () {
                                $(elem).parent('.layui-upload').find('.layui-upload-box').html('<li><img src="'+res.url+'" /><p>上传成功</p></li>');
                                $(elem).parent('.layui-upload').find('.layui-upload-input').val(res.url);
                            })
                        }else {
                            notice.error(result.msg)
                        }
                    }
                });
            })
            //提交
            form.on('submit(config_group)',function (data) {
                var parm = data.field;
                parm['_method'] = 'put';
                loading.Load(5,'正在更新');
                $.post("{{route('admin.config.update')}}",data.field,function (result) {
                    loading.loadRemove(0);
                    if (result.code === 200) {
                        notice.success(result.msg)
                    } else {
                        notice.error(result.msg)
                    }
                });
                return false;
            });
            //新增
            $('.add-config_group').click(function () {
                parent.layer.open({
                    type: 2,
                    title: '新增',
                    shade: 0.1,
                    area: ['500px', '400px'],
                    content: '{{ route('admin.config.create') }}',
                    end: function () {
                        window.location.reload()
                    }
                });
            })
        })
    </script>
@endsection
