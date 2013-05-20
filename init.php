<?php
/*
 * 初始化
 */
// 定义根路径
define('ONECHO_ROOT', dirname(__FILE__));
// 定义模板路径
define('TEPL_PATH', ONECHO_ROOT . '/template/');
// 数据库连接
require_once 'include/lib/conn.php';
// 设置时区
ini_set("date.timezone","Asia/Chongqing");
?>
