<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Oops!!!页面找不到了</title>
		<link href="{{asset(BE_COMPONENT.'pear/css/pear.css')}}" rel="stylesheet" />
		<link href="{{asset(BE_ADMIN.'css/other/error.css')}}" rel="stylesheet" />
	</head>
	<body>
		<div class="content">
			<img src="{{asset(BE_ADMIN.'images/404.svg')}}" alt="">
			<div class="content-r">
				<h1>404</h1>
				<p>抱歉，你访问的页面不存在或仍在开发中</p>
				<button class="pear-btn pear-btn-primary">返回首页</button>
			</div>
		</div>
		<script src="{{asset(BE_COMPONENT.'layui/layui.js')}}"></script>
		<script src="{{asset(BE_COMPONENT.'pear/pear.js')}}"></script>
	</body>
</html>
