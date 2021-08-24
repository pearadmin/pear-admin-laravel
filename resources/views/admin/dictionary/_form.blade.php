{{csrf_field()}}
<div class="layui-form-item">
    <label for="" class="layui-form-label">上级分类</label>
    <div class="layui-input-block">
        <select name="parent_id" lay-search  lay-filter="parent_id">
            <option value="0">一级分类</option>
            @foreach($dictionaries as $first)
                <option value="{{ $first->id }}" @if(isset($dictionary->parent_id)&&$dictionary->parent_id==$first->id) selected @endif>{{ $first->name }}</option>
                @if($first->childs->isNotEmpty())
                    @foreach($first->childs as $second)
                        <option value="{{ $second->id }}" {{ isset($dictionary->id) && $dictionary->parent_id==$second->id ? 'selected' : '' }}>┗━━{{$second->name}}</option>
                    @endforeach
                @endif
            @endforeach
        </select>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">名称</label>
    <div class="layui-input-block">
        <input type="text" name="name" value="{{ $dictionary->name ?? old('name') }}" lay-verify="required" placeholder="请输入名称" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">代码</label>
    <div class="layui-input-block">
        <input type="text" name="code" value="{{ $dictionary->code ??  old('code')  }}" lay-verify="required" placeholder="请输入英文代码" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">排序</label>
    <div class="layui-input-block">
        <input type="number" name="sort" value="{{ $dictionary->sort ?? 10 }}" lay-verify="required|number" placeholder="请输入数字" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">字典介绍</label>
    <div class="layui-input-block">
        <textarea name="desc" placeholder="请输入介绍内容" class="layui-textarea">{{ $dictionary->desc ?? '' }}</textarea>
    </div>
</div>
