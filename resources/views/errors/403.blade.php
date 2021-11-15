<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Oops!!!无访问权限</title>
		<link href="{{asset(config('static.be_static').'component/pear/css/pear.css')}}" rel="stylesheet" />
		<link href="{{asset(config('static.be_static').'admin/css/other/error.css')}}" rel="stylesheet" />
	</head>
	<body>
		<div class="content">
			<img src="{{asset(config('static.be_static').'admin/images/403.svg')}}" alt="">
			<div class="content-r">
				<h1>403</h1>
				<p>抱歉，你无权访问该页面</p>
				<button class="pear-btn pear-btn-primary">返回首页</button>
			</div>
		</div>
		<script src="{{asset(config('static.be_static').'component/layui/layui.js')}}"></script>
		<script src="{{asset(config('static.be_static').'component/pear/pear.js')}}"></script>
	</body>
</html>
