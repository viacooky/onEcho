<?php
/*
 * 后台主页
 */
// 加载后台全局项
require_once 'global.php';
// 包含header
include 'html/header.php';


if(isset($_GET['lid'])){
	$lid = $_GET['lid'];
	
	$sql = "SELECT * FROM onecho_links WHERE lid='$lid'";
	$result = mysql_query($sql);
	$link = mysql_fetch_assoc($result);
}


if(isset($_GET['updateLink'])){
	$lid = $_POST['lid'];
	$linkName = $_POST['linkName'];
	$linkUrl = $_POST['linkUrl'];
	$linkInfo = $_POST['linkInfo'];
	$linkActive = $_POST['linkActive'];
	
	$isSuccess = Sql::updateLink($lid, $linkName, $linkUrl, $linkInfo, $linkActive);
	
	if($isSuccess){
		echo '<script type="text/javascript">alert("友情连接编辑成功！！");window.location.href="links.php"</script>';
	}else{
		echo '<script type="text/javascript">alert("友情连接编辑失败！！");window.location.href="links.php"</script>';
	}
}
?>

<!-- HTML -->
			<!-- Background wrapper -->
			<div id="bgwrap">
		
				<!-- Main Content -->
				<div id="content">
				  <div id="main">
					<h1>友情链接设置</h1>
					<p>是否激活选项，设置为1则在首页显示，设置为0则不显示</p>
					
					<div class="pad20">
					<!-- Big buttons -->
						
						<!-- End of Big buttons -->
					</div>
				
					<hr />
					<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
						<thead>
							<tr>
								<td>id</td>
								<td>linkName</td>
								<td>URL</td>
								<td>是否激活</td>
								<td>link信息</td>
							</tr>
						</thead>
						<tbody>
						<form action="linksEdit.php?updateLink&lid=<?php echo $link['lid'] ?>" method="post" accept-charset="utf-8">
						<td><input class="sf" type="text" name="lid" size="110px" value="<?php echo $link['lid'] ?>"></input></td>
						<td><input class="sf" type="text" name="linkName" size="110px" value="<?php echo $link['linkName'] ?>"></input></td>
						<td>http://<input class="sf" type="text" name="linkUrl" size="110px" value="<?php echo $link['linkUrl'] ?>"></input></td>
						<td><input class="sf" type="text" name="linkActive" size="110px" value="<?php echo $link['linkActive'] ?>"></input></td>
						<td><input class="sf" type="text" name="linkInfo" size="110px" value="<?php echo $link['linkInfo'] ?>"></input></td>
						
						</tr>
						</tbody>
						</table>
						<input class="button" type="submit" name="sub" value="提交"></input>
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