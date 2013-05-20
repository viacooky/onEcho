<?php
/*
 * 前台模板 --- header
 */
// 获取sizeName
$rs = Sql::getConfig ();
// 获取userInfo
$userinfo = Sql::getUserInfo ();

// 获取links
$sql = "SELECT * FROM onecho_links  WHERE linkActive=1 ORDER BY lid DESC";
$result = mysql_query ( $sql );

$links = '';
// 循环输出文章列表
while ( $linksResult = mysql_fetch_assoc ( $result ) ) {
	$links .= '<li><a target="_blank" href="http://' . $linksResult ['linkUrl'] . '"title="' . $linksResult ['linkInfo'] . ' ">' . $linksResult ['linkName'] . '</a></li>';
}

?>
<!-- HTML -->
<!DOCTYPE HTML>
<html>

<head>
<title><?php echo $rs['sizeName'] ?></title>
<meta name="description" content="website description" />
<meta name="keywords" content="website keywords, website keywords" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="template/css/style.css" />
<!-- modernizr enables HTML5 elements and feature detects -->
<script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body>
	<div id="main">
		<header>
			<div id="logo">
				<div id="logo_text">
					<!-- class="logo_colour", allows you to change the colour of the text -->
					<h1>
						<a href="index.php"><span class="logo_colour"><?php echo $rs['sizeName']; ?></span></a>
					</h1>
					<h3><?php echo $rs['sizeInfo']; ?></h3>
				</div>
			</div>
			<nav>
				<div id="menu_container">
					<ul class="sf-menu" id="nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php?bloger">Bloger</a></li>
						<li><a href="index.php?about">About</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<div id="site_content">
			<div id="sidebar_container">
				<div class="sidebar">
					<h3>Bloger</h3>
					<h4><?php echo $userinfo['nickName']; ?></h4>
					<h5><?php echo $userinfo['userSignature']; ?></h5>
					<p><?php echo mb_strimwidth(strip_tags($userinfo['userInfo']), 0, 30,"...", "utf-8"); ?></p>
					<p><a href="index.php?bloger">read more ...</a></p>
				</div>
				<div class="sidebar">
					<h3>Links</h3>
					<ul>
						
						<?php echo $links; ?>
					</ul>
				</div>
			</div>
