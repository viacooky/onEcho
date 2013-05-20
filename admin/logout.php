<?php
/*
 * 退出页面
 */
header("Content-type: text/html; charset=utf-8");
// 加载后台全局
require_once 'global.php';

// 退出登录
logout ();

?>
<script type="text/javascript">alert("成功退出!");window.location.href="../index.php"</script>
