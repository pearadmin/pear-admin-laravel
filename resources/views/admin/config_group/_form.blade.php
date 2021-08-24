{{csrf_field()}}
<div class="layui-form-item">
    <label for="" class="layui-form-label">名称</label>
    <div class="layui-input-inline">
        <input type="text" name="name" value="{{ $configGroup->name ?? old('name') }}" lay-verify="required" placeholder="请输入名称" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">生效位置</label>
    <div class="layui-input-inline">
        <select name="local" lay-verify="required" value="{{ $configGroup->local ?? 'frontend' }}">
            <option value="frontend">frontend</option>
            <option value="backend">backend</option>
        </select>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">排序</label>
    <div class="layui-input-inline">
        <input type="number" name="sort" value="{{ $configGroup->sort ?? 10 }}" lay-verify="required|number" placeholder="请输入数字" class="layui-input" >
    </div>
</div>
