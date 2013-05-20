<?php
/*
 * 文章列表
 */
// 加载后台全局项
require_once 'global.php';
// 加载分页类
require_once ONECHO_ROOT . '/include/lib/page.class.php';
// 包含header
include 'html/header.php';

// 文章总数
$artTotal = Sql::getArtTotal();
// 设置每页显示的页数
$pageSize = 10;
// 当前页 如果不存在page参数，则默认为1
$pageIndex = isset ( $_GET ['page'] ) ? $_GET ['page'] : 1;
// 实例分页类
$page = new Page ( $artTotal, $pageSize, $pageIndex );
?>
<!-- HTML -->
			<!-- Background wrapper -->
			<div id="bgwrap">
		
			<!-- Main Content -->
			<div id="content">
				<div id="main">
					<h1>
						文章列表
					</h1>
					<div class="pad20">
						<!-- Big buttons -->
						<!-- End of Big buttons -->
					</div>
					<hr />




					<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
						<thead>
							<tr>
								<td>文章ID</td>
								<td>标题</td>
								<td>编辑时间</td>
								<td>操作</td>
							</tr>
						</thead>
						<tbody>
					
					
					
					<?php
					$sql = "SELECT * FROM onecho_article ORDER BY id DESC " . $page->limit;
					$result = mysql_query ( $sql );
					// 循环输出文章列表
					while ( $rs = mysql_fetch_assoc ( $result ) ) {
						$html = '<tr class="odd">';
						$html .= '<td>' . $rs ['id'] . '</td>';
						$html .= '<td>' . $rs ['title'] . '</td>';
						$html .= '<td>' . $rs ['editDate'] . '</td>';
						$html .= '<td><a href="updateArt.php?id=' . $rs ['id'] . '">编辑</a> | <a href="delArt.php?id=' . $rs ['id'] . '">删除</a></td>';
						$html .= '</tr>';
						
						echo $html;
					}
					?>
					
					
					</tbody>
					</table>
					<p align="right"><?php echo $page->fPage() ?></p>

					<hr />
				</div>
			</div>
			<!-- End of Main Content -->









<?php 
// 包含footer
include 'html/footer.php';
?>