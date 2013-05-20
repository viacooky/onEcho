<?php
/*
 * 后台主页
 */
// 加载后台全局项
require_once 'global.php';
// 包含header
include 'html/header.php';
?>
<!-- HTML -->
			<!-- Background wrapper -->
			<div id="bgwrap">
		
			<!-- Main Content -->
			<div id="content">
				<div id="main">
					<h1>
						友情链接管理
					</h1>
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
								<td>操作</td>
							</tr>
						</thead>
						<tbody>
					
					<?php
					$sql = "SELECT * FROM onecho_links ORDER BY lid DESC ";
					$result = mysql_query ( $sql );
					// 循环输出文章列表
					while ( $links = mysql_fetch_assoc ( $result ) ) {
						$html = '<tr class="odd">';
						$html .= '<td>'. $links ['lid'] . '</td>';
						$html .= '<td>'. $links ['linkName'] . '</td>';
						$html .= '<td>http://'. $links ['linkUrl'] . '</td>';
						$html .= '<td>'. $links ['linkActive'] .'</td>';
						$html .= '<td>'. $links ['linkInfo'] . '</td>';
						$html .= '<td><a href="linksEdit.php?lid=' . $links ['lid'] . '">编辑</a></td>';
						$html .= '</tr>';
						
						echo $html;
					}
					?>
					</tbody>
					</table>
					
					<hr />
				</div>
			</div>
			<!-- End of Main Content -->







<?php 
// 包含footer
include 'html/footer.php';
?>