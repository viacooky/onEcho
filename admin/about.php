<?php
/*
 * 后台主页
 */
// 加载后台全局项
require_once 'global.php';
// 包含header
include 'html/header.php';

// 获取About页面信息
$rs = Sql::getConfig();
$about = $rs['sizeAbout'];


if(isset($_GET['updateAbout'])){
	$about = $_POST['content'];
	
	$isSuccess = Sql::setAbout($about);
	
	if($isSuccess){
		echo '<script type="text/javascript">alert("About页面修改成功！！");window.location.href="about.php"</script>';
	}else{
		echo '<script type="text/javascript">alert("About页面修改失败！！");window.location.href="about.php"</script>';
	}
}

?>
<!-- HTML -->
<!-- Background wrapper -->
<div id="bgwrap">

	<!-- Main Content -->
	<div id="content">
		<div id="main">
			<h1>About页面</h1>


			<div class="pad20">
				<!-- Big buttons -->

				<!-- End of Big buttons -->
			</div>

			<form action="about.php?updateAbout" method="post" accept-charset="utf-8">
				<fieldset>

					<p>
						<textarea name="content"
							style="width: 800px; height: 600px; visibility: visible;"><?php echo $about; ?></textarea>
					</p>

					<p>
						<input class="button" type="submit" name="sub" value="提交"></input>
					</p>


					<b></b>
					</h2>



				</fieldset>
			</form>


			<hr />
			<div class="pad20">

				<!-- Tabs -->
				<!-- End of Tabs -->
			</div>

			<hr />
		</div>
	</div>
	<!-- End of Main Content -->

<?php
// 包含footer
include 'html/footer.php';
?>