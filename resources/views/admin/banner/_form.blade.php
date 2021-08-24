{{csrf_field()}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">标题</label>
    <div class="layui-input-block">
        <input type="text" name="banner_title" value="{{$article->banner_title??old('banner_title')}}" placeholder="请输入标题" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">Banner链接</label>
    <div class="layui-input-block">
        <input type="text" name="banner_url" value="{{$article->banner_url??old('banner_url')}}" placeholder="请输入Banner链接" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">banner图片</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear pear-upload-box">
                    @if(isset($article->img_path))
                        <li><img src="{{ $article->img_path }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="img_path" id="thumb" value="{{ $article->img_path??'' }}">
            </div>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">排序</label>
    <div class="layui-input-block">
        <input type="text" name="sort" value="{{$article->sort??old('sort')}}" placeholder="请输入排序" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">是否发布</label>
    <div class="layui-input-block">
        <input type="radio" name="disable" value="0" title="否" @if(isset($article) && $article->disable == 0) checked @endif/>
        <input type="radio" name="disable" value="1" title="是" @if(isset($article) && $article->disable == 1) checked @endif/>
    </div>
</div>

<div class="layui-form-item">
        <label for="" class="layui-form-label">展示时间</label>
        <div class="layui-input-inline">
            <input type="text" name="start_time" id="start_time" placeholder="开始时间" class="layui-input" value="{{$article->start_time??old('start_time')}}">
        </div>
        <div class="layui-form-mid layui-word-aux">-</div>
        <div class="layui-input-inline">
            <input type="text" name="end_time" id="end_time" placeholder="结束时间" class="layui-input" value="{{$article->end_time??old('end_time')}}">
        </div>
</div>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('admin.banner')}}" >返 回</a>
    </div>
</div>
