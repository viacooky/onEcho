<?php
/*
 * 首页模板 --- bloger
 */
// 获取博主信息
$rs = Sql::getUserInfo();
$bloger = $rs['userInfo'];
?>
<!-- HTML -->
<div class="content">
<h1>Bloger</h1>

<p><?php echo $bloger; ?></p>

</div>
</div>