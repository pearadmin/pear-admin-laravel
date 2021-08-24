{{csrf_field()}}
<div class="layui-form-item">
    <label for="" class="layui-form-label">标题</label>
    <div class="layui-input-block">
        <input type="text" name="title" lay-verify="required" value="{{$article->title??old('title')}}" placeholder="请输入标题" class="layui-input" autocomplete="off" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">分类</label>
    <div class="layui-input-block">
        <select name="category" lay-verify="required" id="category_id">
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


<div class="layui-form-item">
    <label for="" class="layui-form-label">标签</label>
    <div class="layui-input-block">
        <select name="tags" xm-select="select2" xm-select-skin="normal">
            @foreach($tagss as $tag)
                <option value="{{ $tag->id }}" >{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">简介</label>
    <div class="layui-input-block">
        <input type="text" name="description" value="{{$article->description??old('description')}}" placeholder="请输入简介" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">缩略图</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear pear-upload-box">
                    @if(isset($article->thumb))
                        <li><img src="{{ $article->thumb }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="thumb" id="file" value="{{ $article->thumb??'' }}">
            </div>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <script id="container" name="content" lay-verify="required" type="text/plain" style="width: 100%">
        {!! $article->content??old('content') !!}
    </script>
</div>
