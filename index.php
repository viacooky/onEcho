<?php
/*
 * 前台首页
 */
// 加载初始化
require_once 'init.php';
// 加载视图控制
require_once 'include/lib/view.class.php';
// 加载数据库操作
require_once 'include/lib/sql.class.php';
header('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />');

// 输出header
require (View::getView ( 'header' ));

// 获取操作
if (isset ( $_GET ['bloger'] )) {
	include (View::getView ( 'bloger' ));
} else if (isset ( $_GET ['id'] )) {
	include (View::getView ( 'page' ));
} else if (isset ( $_GET ['about'] )) {
	include (View::getView ( 'about' ));
} else {
	include (View::getView ( 'body' ));
}

// 输出footer
require (View::getView ( 'footer' ));

?>