<?php
/*
 * 前台模板 --- body
 */
// 加载分页类
require_once ONECHO_ROOT . '/include/lib/page.class.php';

// 设置每页显示的页数
$pageSize = 5;

// 当前页 如果不存在page参数，则默认为1
$pageIndex = isset ( $_GET ['page'] ) ? $_GET ['page'] : 1;

// 文章总数
$artTotal = Sql::getArtTotal ();

// 实例分页类
$page = new Page ( $artTotal, $pageSize, $pageIndex );

$sql = "SELECT * FROM onecho_article ORDER BY id DESC " . $page->limit;

$result = mysql_query ( $sql );

$html = '';

// 循环输出文章信息
while ( $rs = mysql_fetch_assoc ( $result ) ) {
	$html .= '<br>';
	// 文章标题
	$html .= '<h2>' . $rs ['title'] . '</h2>';
	// 文章时间等信息
	$html .= '<h5>发布时间：' . $rs ['editDate'] . '</h5>';
	// 文章简介
	$html .= '<p>' . mb_strimwidth ( strip_tags ( $rs ['content'] ), 0, 200, "...", "utf-8" ) . '</p>';
	// $html .= '<p>' . $rs ['content'] . '</p>';
	// 文章链接
	$html .= '<p><stroge><a href="index.php?id=' . $rs ['id'] . '">阅读全文 >></a></stroge></p>';
	$html .= '<hr />';
}

?>
<!-- HTML -->
<div class="content">
	<?php
	echo $html;
	// 首页的分页
	echo $page->indexPage ();
	?>
</div>
</div>