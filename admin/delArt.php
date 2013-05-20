<?php
/*
 * 删除文章页面
 */
// 加载后台全局项
require_once 'global.php';
// 包含header
include 'html/header.php';



if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$isSuccess = Sql::delArticle($id);
	
	if($isSuccess){
		echo '<script type="text/javascript">alert("文章删除成功！！");window.location.href="listArt.php"</script>';
	}else{
		echo '<script type="text/javascript">alert("文章删除失败！！");window.location.href="listArt.php"</script>';
	}
}
?>

<?php 
// 包含footer
include 'html/footer.php';
?>