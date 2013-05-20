<?php
/*
 * 前台模板 -- 单页
 */
// 获取文章ID
$id = $_GET['id'];
$rs = Sql::selectArtbyId($id);
?>
<!-- HTML -->
<div class="content">
<h2><?php echo $rs['title']; ?></h2>
<h5>发布时间：<?php echo $rs['editDate']; ?></h5>
<p><?php echo $rs ['content']; ?></p>

</div>
</div>