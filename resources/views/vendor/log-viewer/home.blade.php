@extends('log-viewer::layout')

@section('log-viewer::title', 'Laravel Log Viewer')

@section('log-viewer::content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h3>{{ trans('log-viewer::log-viewer.dashboard.dashboard_title') }}</h3>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
