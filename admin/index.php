<?php
/*
 * 后台主页
 */
// 加载后台全局项
require_once 'global.php';
// 包含header
include 'html/header.php';
?>
<!-- HTML -->
			<!-- Background wrapper -->
			<div id="bgwrap">
		
				<!-- Main Content -->
				<div id="content">
				  <div id="main">
					<h1>Welcome <b><?php echo $_COOKIE['nickname']; ?></b></h1>
					<p>What would you like to do today?</p>
					
					<div class="pad20">
					<!-- Big buttons -->
						
						<!-- End of Big buttons -->
					</div>
				
					<hr />
					
					<h1>服务器信息：</h1>
					<h2><strong>服务器地址：</strong><?php echo $_SERVER["HTTP_HOST"]; ?></h2>
					<h2><strong>服务器系统类型：</strong><?php echo php_uname('s'); ?></h2>
					<h2><strong>服务器系统版本：</strong><?php echo php_uname('r'); ?></h2>
					<h2><strong>服务器端口：</strong><?php echo $_SERVER['SERVER_PORT']; ?></h2>
					<h2><strong>PHP版本：</strong><?php echo PHP_VERSION; ?></h2>
					<h2><strong>MySql版本：</strong><?php echo mysql_get_server_info(); ?></h2>
					<h2><strong>页面协议信息：</strong><?php echo $_SERVER['SERVER_PROTOCOL']; ?></h2>
					<h2><strong>当前用户IP：</strong><?php echo $_SERVER['REMOTE_ADDR']; ?></h2>
					
					
					
					<div class="pad20">
					
						<!-- Tabs --><!-- End of Tabs -->
				    </div>
						
						<hr />
					</div>
				</div>
				<!-- End of Main Content -->

<?php 
// 包含footer
include 'html/footer.php';
?>