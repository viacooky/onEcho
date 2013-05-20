<?php
/*
 * 添加文章页面
 */
// 加载后台全局项
require_once 'global.php';
// 包含header
include 'html/header.php';

if (isset ( $_GET ['add'] )) {
	$title = $_POST ['title'];
	$content = $_POST ['content'];
	$datetime = date ( 'Y-m-d H:i:s', time () );
	
	$isSuccess = Sql::addArticle ( $title, $content, $datetime );
	
	if ($isSuccess) {
		echo '<script type="text/javascript">alert("文章添加成功！！");window.location.href="listArt.php"</script>';
	} else {
		echo '<script type="text/javascript">alert("文章添加失败！！");window.location.href="listArt.php"</script>';
	}
}

?>
<!-- HTML -->
<!-- Background wrapper -->

<div id="bgwrap">

	<!-- Main Content -->
	<div id="content">
		<div id="main">
			<h1>添加文章</h1>
			<div class="pad20">
				<!-- Big buttons -->
				<!-- End of Big buttons -->
			</div>
			<hr />



			<form action="addArt.php?add" method="post" accept-charset="utf-8">
				<fieldset>
					<p>
						<label for="lf">标题:</label>
						<input class="lf" type="text" name="title" size="110px" value=""></input>
						<span class="validate_error">必填！</span>
					</p>

					<p>
						<label for="lf">文章正文:</label>
						<textarea name="content"
							style="width: 800px; height: 400px; visibility: visible;"></textarea>

					</p>

					<p>
						<input class="button" type="submit" name="sub" value="提交"></input>
					</p>


					<b></b>
					</h2>



				</fieldset>
			</form>




			<hr />
		</div>
	</div>
	<!-- End of Main Content -->







<?php
// 包含footer
include 'html/footer.php';
?>