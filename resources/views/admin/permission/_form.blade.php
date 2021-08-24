{{csrf_field()}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">父级</label>
    <div class="layui-input-block">
        <ul id="parent_id" class="dtree" data-id="0" data-value="{{$permission->parent_id??0}}"></ul>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">名称</label>
    <div class="layui-input-block">
        <input type="text" name="name" value="{{$permission->name??old('name')}}" lay-verify="required" class="layui-input" placeholder="如：system.index">
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">显示名称</label>
    <div class="layui-input-block">
        <input type="text" name="display_name" value="{{$permission->display_name??old('display_name')}}" lay-verify="required" class="layui-input" placeholder="如：系统管理">
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">类型</label>
    <div class="layui-input-block">
        <input type="radio" name="type" value="1" title="按钮" lay-filter="select-type" @if(isset($permission) && $permission->type==1) checked @endif >
        <input type="radio" name="type" value="2" title="菜单" lay-filter="select-type" @if(isset($permission) && $permission->type==2) checked @endif>
        <input type="radio" name="type" value="3" title="链接" lay-filter="select-type" @if(isset($permission) && $permission->type==3) checked @endif>
    </div>
</div>
<div class="layui-form-item" id="type2" style="display: none;">
    <label for="" class="layui-form-label">路由</label>
    <div class="layui-input-block">
        <input class="layui-input" type="text" name="route" value="{{$permission->route??old('route')}}" placeholder="如：admin.member" >
    </div>
</div>
<div class="layui-form-item" id="type3" style="display: none;">
    <label for="" class="layui-form-label">链接</label>
    <div class="layui-input-block">
        <input class="layui-input"  type="text" name="link" value="{{$permission->link??old('link')}}" placeholder="如：https://www.taobao.com" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">图标</label>
    <div class="layui-input-block">
        <input type="text" name="icon" id="iconPicker" value="{{$permission->icon??'layui-icon-face-smile-fine'}}" lay-filter="iconPicker">
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">排序</label>
    <div class="layui-input-block">
        <input class="layui-input" type="number" name="sort" value="{{$permission->sort??0}}" placeholder="" >
    </div>
</div>

