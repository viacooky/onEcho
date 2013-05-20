<?php
/*
 * 更新文章页面
 */
// 加载后台全局项
require_once 'global.php';
// 包含header
include 'html/header.php';

// 获得文章id
if(isset($_GET['id']) > 0){
	$id = $_GET['id'];
	
	$rs = Sql::selectArtbyId($id);
}

if(isset($_GET['update'])){
	$id = $_GET['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$datetime =  date('Y-m-d H:i:s',time());
	
	$isSuccess = Sql::updateArticle($id, $title, $content, $datetime);
	
	if($isSuccess){
		echo '<script type="text/javascript">alert("文章更新成功！！");window.location.href="listArt.php"</script>';
	}else{
		echo '<script type="text/javascript">alert("文章更新失败！！");window.location.href="listArt.php"</script>';
	}
}

?>
<!-- HTML -->
			<!-- Main Content -->
			<div id="content">
				<div id="main">
					<h1>编辑文章</h1>
					<div class="pad20">
						<!-- Big buttons -->
						<!-- End of Big buttons -->
					</div>
					<hr />



					<form action="updateArt.php?update&id=<?php echo $id?>" method="post" accept-charset="utf-8">
						<fieldset>
							<p>
								<label for="lf">标题:</label> <input class="lf" type="text"
									name="title" size="110px" value="<?php echo $rs['title']?>"></input>
								<span class="validate_error">必填！</span>
							</p>

							<p>
								<label for="lf">文章正文:</label>
								<textarea name="content"
									style="width: 800px; height: 400px; visibility: visible;"><?php echo $rs['content']?></textarea>

							</p>

							<p>
								<input class="button" type="submit" name="update" value="提交"></input>
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