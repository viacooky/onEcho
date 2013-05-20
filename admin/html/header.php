<?php
/*
 * 后台页面共用header
 */
// 加载SQL操作类
require_once ONECHO_ROOT . '/include/lib/sql.class.php';

// 文章总数
$artTotal = Sql::getArtTotal();
// 用户总数
$userTotal = Sql::getUserTotal();


?>




<!-- HTML -->
<!DOCTYPE html>
<html>
<head>
<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- End of Meta -->

<!-- Page title -->
<title>onEcho :: 后台管理</title>
<!-- End of Page title -->

<!-- Libraries -->
<link type="text/css" href="html/css/layout.css" rel="stylesheet" />

<script type="text/javascript" src="html/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="html/js/easyTooltip.js"></script>
<script type="text/javascript"
	src="html/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="html/js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="html/js/hoverIntent.js"></script>
<script type="text/javascript" src="html/js/superfish.js"></script>
<script type="text/javascript" src="html/js/custom.js"></script>

<!-- KindEditer -->
<style>
form {
	margin: 0;
}

textarea {
	display: block;
}
</style>
<script charset="utf-8" src="html/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="html/kindeditor/lang/zh_CN.js"></script>
<script>
			var editor;
			KindEditor.ready(function(K) {
				// 内容
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true
				});

				
				K('input[name=getHtml]').click(function(e) {
					alert(editor.html());
				});
				K('input[name=isEmpty]').click(function(e) {
					alert(editor.isEmpty());
				});
				K('input[name=getText]').click(function(e) {
					alert(editor.text());
				});
				K('input[name=selectedHtml]').click(function(e) {
					alert(editor.selectedHtml());
				});
				K('input[name=setHtml]').click(function(e) {
					editor.html('<h3>Hello KindEditor</h3>');
				});
				K('input[name=setText]').click(function(e) {
					editor.text('<h3>Hello KindEditor</h3>');
				});
				K('input[name=insertHtml]').click(function(e) {
					editor.insertHtml('<strong>插入HTML</strong>');
				});
				K('input[name=appendHtml]').click(function(e) {
					editor.appendHtml('<strong>添加HTML</strong>');
				});
				K('input[name=clear]').click(function(e) {
					editor.html('');
				});
			});
		</script>

<!-- KindEditer -->


<!-- End of Libraries -->
</head>
<body>
	<!-- Container -->
	<div id="container">

		<!-- Header -->
		<div id="header">

			<!-- Top -->
			<div id="top">
				<!-- Logo -->
				<div class="logo">
					<a href="#" title="onEcho :: 后台管理" class="tooltip"><img
						src="html/assets/logo.png" alt="Wide Admin" /></a>
				</div>
				<!-- End of Logo -->

				<!-- Meta information -->
				<div class="meta">
					<p>Hi, <b><?php echo $_COOKIE['nickname'] ?></b>!</p>
					<ul>
						<li><a href="logout.php" title="Logout" class="tooltip"><span
								class="ui-icon ui-icon-power"></span>注销登录</a></li>
						<li><a href="config.php" title="Change system settings" class="tooltip"><span
								class="ui-icon ui-icon-wrench"></span>系统设置</a></li>
						<li><a href="../index.php" title="Go to your home" class="tooltip"><span
								class="ui-icon ui-icon-person"></span>返回前台</a></li>
					</ul>
				</div>
				<!-- End of Meta information -->
			</div>
			<!-- End of Top-->

			<!-- The navigation bar -->
			<div id="navbar"></div>
			<!-- End of navigation bar" -->

			<!-- Search bar -->
			<!-- End of Search bar -->

		</div>
		<!-- End of Header -->
