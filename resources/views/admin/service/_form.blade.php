{{csrf_field()}}
<div class="layui-form-item">
    <label for="" class="layui-form-label">标题</label>
    <div class="layui-input-block">
        <input type="text" name="title" lay-verify="required" value="{{$service->title??old('title')}}" placeholder="请输入标题" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">副标题</label>
    <div class="layui-input-block">
        <input type="text" name="sub_title" lay-verify="required" value="{{$service->sub_title??old('sub_title')}}" placeholder="请输入标题" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">图标</label>
    <div class="layui-input-block">
        <input type="text" name="icon" id="iconPicker" lay-verify="required" value="{{$service->icon??'layui-icon-face-smile-fine'}}" lay-filter="iconPicker">
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">图片</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear pear-upload-box">
                    @if(isset($service->image))
                        <li><img src="{{ $service->image }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="image" id="file" value="{{ $service->image??'' }}">
            </div>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">介绍</label>
    <div class="layui-input-block">
        <textarea name="description" placeholder="请输入介绍" lay-verify="required" class="layui-textarea">{{$service->description??old('description')}}</textarea>
    </div>
</div>
