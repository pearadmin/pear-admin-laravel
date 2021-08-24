@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>
                @if($flag==0)
                    <div class="layui-form-item">
                        {{ $article->title }} 预览
                        <a class="layui-btn" href="/admin/project/{{ $article->id }}/edit" style="float: right;">编辑</a>
                    </div>
                @endif

                @if($flag==1)
                    <div class="layui-form-item">
                        {{ $article->title }} 预览
                        <a class="layui-btn" href="/admin/handbook/{{ $article->id }}/edit" style="float: right;">编辑</a>
                    </div>
                @endif
            </h2>
        </div>
        <div class="layui-card-body">
            <lable>标题：</lable>
            {!! $article->title !!}
        </div>
        <div class="layui-card-body">
            <lable>简介：</lable>
            {!! $article->description !!}
        </div>
        <div class="layui-card-body">
            <lable>图片：</lable>
            <img src="{!! $article->thumb !!}" alt="预览图片" width="100px" height="100px">
        </div>
        <div class="layui-card-body">
            {{csrf_field()}}
            <lable>内容：</lable>
            {!! $article->content !!}
        </div>
    </div>
@endsection

@section('script')
    @include('admin.article._js')
@endsection
