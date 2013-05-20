<?php
/*
 * 后台全局项
 */
// 发送头信息 设置编码
header("Content-type: text/html; charset=utf-8");
// 加载初始化
require_once '../init.php';
// 加载验证用户函数
require_once ONECHO_ROOT . '/include/lib/checkUser.function.php';
// 判断登录状态
if(!isLogin()){
	header("Location:login.php");
}

?>