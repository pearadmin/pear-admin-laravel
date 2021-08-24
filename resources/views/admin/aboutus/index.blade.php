@extends('admin.base')

@section('content')
    <div class="layui-card">
    <div class="layui-card-body">
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <li class="layui-this">公司介绍</li>
                <li>核心团队</li>
                <li>开放数据</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <form class="layui-form">
                        <div class="layui-form-item">
                            <label for="" style="min-width: 145px" class="layui-form-label">公司名称</label>
                            <div class="layui-input-inline" style="min-width: 600px">
                                <input type="input" class="layui-input" name="present_title" value="{{$aboutus->present_title??old('present_title')}}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="" class="layui-form-label">展览图片</label>
                            <div class="layui-input-block">
                                <div class="layui-upload">
                                    <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
                                    <div class="layui-upload-list" >
                                        <ul id="layui-upload-box" class="layui-clear pear-upload-box">
                                            @if(isset($aboutus->present_thumb))
                                                <li><img src="{{ $aboutus->present_thumb }}" /><p>上传成功</p></li>
                                            @endif
                                        </ul>
                                        <input type="hidden" name="present_thumb" id="file" value="{{ $aboutus->present_thumb??'' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <script id="container" name="content" lay-verify="required" type="text/plain" style="width: 100%">
                                {!! $aboutus->present_content??old('present_content') !!}
                            </script>
                        </div>
                        <hr/>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button type="submit" class="pear-btn pear-btn-info pear-btn-sm" lay-submit="" lay-filter="config_group"><i class="layui-icon layui-icon-ok"></i>提交</button>
                                <button type="button" class="pear-btn pear-btn-primary pear-btn-sm  add-config_group"><i class="layui-icon layui-icon-add-1"></i>新增</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="layui-tab-item">
                    <form class="layui-form">
                        <div class="layui-form-item">
                            <label for="" style="min-width: 145px" class="layui-form-label">公司名称</label>
                            <div class="layui-input-inline" style="min-width: 600px">
                                <input type="input" class="layui-input" name="present_title" value="{{$aboutus->present_title??old('present_title')}}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="" class="layui-form-label">展览图片</label>
                            <div class="layui-input-block">
                                <div class="layui-upload">
                                    <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
                                    <div class="layui-upload-list" >
                                        <ul id="layui-upload-box" class="layui-clear pear-upload-box">
                                            @if(isset($aboutus->present_thumb))
                                                <li><img src="{{ $aboutus->present_thumb }}" /><p>上传成功</p></li>
                                            @endif
                                        </ul>
                                        <input type="hidden" name="present_thumb" id="file" value="{{ $aboutus->present_thumb??'' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <script id="container" name="present_content" lay-verify="required" type="text/plain" style="width: 100%">
                                {!! $aboutus->present_content??old('present_content') !!}
                            </script>
                        </div>
                        <hr/>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button type="submit" class="pear-btn pear-btn-info pear-btn-sm" lay-submit="" lay-filter="config_group"><i class="layui-icon layui-icon-ok"></i>提交</button>
                                <button type="button" class="pear-btn pear-btn-primary pear-btn-sm  add-config_group"><i class="layui-icon layui-icon-add-1"></i>新增</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="layui-tab-item">
                    <form class="layui-form">
                        <div class="layui-form-item">
                            <label for="" style="min-width: 145px" class="layui-form-label">公司名称</label>
                            <div class="layui-input-inline" style="min-width: 600px">
                                <input type="input" class="layui-input" name="present_title" value="{{$aboutus->present_title??old('present_title')}}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="" class="layui-form-label">展览图片</label>
                            <div class="layui-input-block">
                                <div class="layui-upload">
                                    <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
                                    <div class="layui-upload-list" >
                                        <ul id="layui-upload-box" class="layui-clear pear-upload-box">
                                            @if(isset($aboutus->present_thumb))
                                                <li><img src="{{ $aboutus->present_thumb }}" /><p>上传成功</p></li>
                                            @endif
                                        </ul>
                                        <input type="hidden" name="present_thumb" id="file" value="{{ $aboutus->present_thumb??'' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <script id="container" name="content" lay-verify="required" type="text/plain" style="width: 100%">
                                {!! $aboutus->present_content??old('present_content') !!}
                            </script>
                        </div>
                        <hr/>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button type="submit" class="pear-btn pear-btn-info pear-btn-sm" lay-submit="" lay-filter="config_group"><i class="layui-icon layui-icon-ok"></i>提交</button>
                                <button type="button" class="pear-btn pear-btn-primary pear-btn-sm  add-config_group"><i class="layui-icon layui-icon-add-1"></i>新增</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('editor')
    @include('admin.editor')
@endsection

@section('upload')
    @include('admin.upload')
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
                            notice.success(result.msg);
                            $(elem).parent('.layui-upload').find('.layui-upload-box').html('<li><img src="'+res.url+'" /><p>上传成功</p></li>');
                            $(elem).parent('.layui-upload').find('.layui-upload-input').val(res.url);

                            /*layer.msg(res.msg,{icon:1},function () {
                                $(elem).parent('.layui-upload').find('.layui-upload-box').html('<li><img src="'+res.url+'" /><p>上传成功</p></li>');
                                $(elem).parent('.layui-upload').find('.layui-upload-input').val(res.url);
                            })*/
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
