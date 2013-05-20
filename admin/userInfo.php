<?php
/*
 * 后台主页
 */
// 加载后台全局项
require_once 'global.php';
// 包含header
include 'html/header.php';

// 获取获取sizeConfig
$userInfo = Sql::getUserInfo();

if(isset($_GET['updateUserInfo'])){
	$user = $_POST['user'];
	$nickName = $_POST['nickName'];
	$userSignature = $_POST['userSignature'];
	$userInfo = $_POST['userInfo'];
	
	$isSuccess = Sql::setUserInfo($user, $nickName, $userSignature, $userInfo);
	
	if($isSuccess){
		logout();
		echo '<script type="text/javascript">alert("个人信息设置成功,请重新登录！！");window.location.href="login.php"</script>';
	}else{
		echo '<script type="text/javascript">alert("个人信息设置失败！！");window.location.href="userInfo.php"</script>';
	}
}

?>
<!-- HTML -->
			<!-- Background wrapper -->
			<div id="bgwrap">
		
				<!-- Main Content -->
				<div id="content">
				  <div id="main">
					<h1>个人信息设置</h1>
					
					<div class="pad20">
					<!-- Big buttons -->
						
						<!-- End of Big buttons -->
					</div>
				
					<hr />
						<form action="userInfo.php?updateUserInfo" method="post" accept-charset="utf-8">
			
				<fieldset>
					<p>
						<label for="lf">登录名：</label> 
						<input class="lf" type="text" name=user size="110px" value="<?php echo $userInfo['user']; ?>"></input> 
												
					</p>
					<p>
						<label for="lf">昵称：</label> 
						<input class="lf" type="text" name=nickName size="110px" value="<?php echo $userInfo['nickName']; ?>"></input> 
												
					</p>
					<p>
						<label for="lf">个性签名：</label> 
						<input class="lf" type="text" name="userSignature" size="110px" value="<?php echo $userInfo['userSignature']; ?>"></input> 
												
					</p>
					<p>
						<label for="lf">个性简介：</label> 
						<input class="lf" type="text" name="userInfo" size="110px" value="<?php echo $userInfo['userInfo']; ?>"></input> 
												
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