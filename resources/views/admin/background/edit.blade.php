@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新活动</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.background.update',['id'=>$article->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.background._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.background._js')
@endsection
