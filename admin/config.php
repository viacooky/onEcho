<?php
/*
 * 后台主页
 */
// 加载后台全局项
require_once 'global.php';
// 包含header
include 'html/header.php';

// 获取获取sizeConfig
$config = Sql::getConfig();

if(isset($_GET['updateConfig'])){
	$sizeName = $_POST['sizeName'];
	$sizeInfo = $_POST['sizeInfo'];
	
	$isSuccess = Sql::setConfig($sizeName, $sizeInfo);
	
	if($isSuccess){
		echo '<script type="text/javascript">alert("站点设置修改成功！！");window.location.href="config.php"</script>';
	}else{
		echo '<script type="text/javascript">alert("站点设置修改失败！！");window.location.href="config.php"</script>';
	}
}

?>
<!-- HTML -->
			<!-- Background wrapper -->
			<div id="bgwrap">
		
				<!-- Main Content -->
				<div id="content">
				  <div id="main">
					<h1>系统设置</h1>
					
					<div class="pad20">
					<!-- Big buttons -->
						
						<!-- End of Big buttons -->
					</div>
				
					<hr />
						<form action="config.php?updateConfig" method="post" accept-charset="utf-8">
			
				<fieldset>
					<p>
						<label for="lf">博客名：</label> 
						<input class="lf" type="text" name="sizeName" size="110px" value="<?php echo $config['sizeName']; ?>"></input> 
												
					</p>
					<p>
						<label for="lf">博客简介：</label> 
						<input class="lf" type="text" name="sizeInfo" size="110px" value="<?php echo $config['sizeInfo']; ?>"></input> 
												
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