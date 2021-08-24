<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Oops!!!无访问权限</title>
		<link href="{{asset(BE_COMPONENT.'pear/css/pear.css')}}" rel="stylesheet" />
		<link href="{{asset(BE_ADMIN.'css/other/error.css')}}" rel="stylesheet" />
	</head>
	<body>
		<div class="content">
			<img src="{{asset(BE_ADMIN.'images/403.svg')}}" alt="">
			<div class="content-r">
				<h1>403</h1>
				<p>抱歉，你无权访问该页面</p>
				<button class="pear-btn pear-btn-primary">返回首页</button>
			</div>
		</div>
		<script src="{{asset(BE_COMPONENT.'layui/layui.js')}}"></script>
		<script src="{{asset(BE_COMPONENT.'pear/pear.js')}}"></script>
	</body>
</html>
