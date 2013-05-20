<?php
/*
 * 登录页面
 */
header("Content-type: text/html; charset=utf-8");
// 加载初始化
require_once '../init.php';

// 加载验证用户函数
include ONECHO_ROOT . '/include/lib/checkUser.function.php';
// 判断是否登录
if(isLogin()){
	header("Location:index.php");
}
// 如果提交登录
if(isset($_POST['login'])){
	// 获取HTML表单
	$user = $_POST['user'];
	$psw = $_POST['psw'];
	// 验证用户名密码
	checkUser($user, $psw);
	
	
	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Meta -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- End of Meta -->
		
		<!-- Page title -->
		<title>onecho :: Login</title>
		<!-- End of Page title -->
		
		<!-- Libraries -->
		<link type="text/css" href="html/css/login.css" rel="stylesheet" />
		<!-- End of Libraries -->	
	</head>
	<body>
	<div id="container">
		<div class="logo">
			<a href="#"><img src="html/assets/logo.png" alt="" /></a>
		</div>
		<div id="box">
			<form action="login.php" method="post" accept-charset="utf-8">
			<p class="main">
				<label>Username: </label>
				<input type="text" name="user" value="">
				<label>Password: </label>
				<input type="password" name="psw" value="">
			</p>
			<p class="space">
				<input type="submit" name="login" value="login" class="login">
			</p>
			</form>
		</div>
	</div>

	</body>
</html>