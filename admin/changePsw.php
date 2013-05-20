<?php
/*
 * 后台主页
 */
// 加载后台全局项
require_once 'global.php';
// 包含header
include 'html/header.php';


if(isset($_GET['changePsw'])){
	$oldPassword = $_POST['oldPassword'];
	$newPassword = $_POST['newPassword'];
	$newPasswordConfirm = $_POST['newPasswordConfirm'];
	$user = $_COOKIE['user'];
	
	$isSuccess = Sql::changePsw($oldPassword, $newPassword, $newPasswordConfirm, $user);
	
	switch ($isSuccess) {
		case 1 :
			echo '<script type="text/javascript">alert("输入不能为空！！");window.location.href="changePsw.php"</script>';
			break;
		case 2 :
			echo '<script type="text/javascript">alert("两次输入的密码不一致！！");window.location.href="changePsw.php"</script>';
			break;
		case 3 :
			echo '<script type="text/javascript">alert("原密码错误！！");window.location.href="changePsw.php"</script>';
			break;
		case 4 :
			// 注销登录
			logout ();
			echo '<script type="text/javascript">alert("修改成功！！请重新登录！！！");window.location.href="index.php"</script>';
			break;
		case 5 :
			echo '<script type="text/javascript">alert("修改失败，请重试！！");window.location.href="changePsw.php"</script>';
			break;
	}
}

?>
<!-- HTML -->
			<!-- Background wrapper -->
			<div id="bgwrap">
		
				<!-- Main Content -->
				<div id="content">
				  <div id="main">
					<h1>修改密码</h1>
					
					<div class="pad20">
					<!-- Big buttons -->
						
						<!-- End of Big buttons -->
					</div>
				
					<hr />
						<form action="changePsw.php?changePsw" method="post" accept-charset="utf-8">
			
				<fieldset>
					<p>
						<label for="lf">原密码：</label> 
						<input class="lf" type="password" name="oldPassword" size="110px" value=""></input> 
												
					</p>
					<p>
						<label for="lf">新密码：</label> 
						<input class="lf" type="password" name="newPassword" size="110px" value=""></input> 
												
					</p>
					<p>
						<label for="lf">新密码确认：</label> 
						<input class="lf" type="password" name="newPasswordConfirm" size="110px" value=""></input> 
												
					</p>
					<p>
						<input class="button" type="submit" name="sub" value="提交"></input>
					</p>


					<b></b>
					</h2>



				</fieldset>
			</form>
					
					
					
					
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