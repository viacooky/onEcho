<?php
/*
 * 共用footer
 */
?>
<!-- HTML -->
				<!-- Sidebar -->
				<div id="sidebar">
				
					<!-- End of Sortable Dialogs -->
					
					<!-- Lists -->
				  <h2>管理菜单</h2>
					<ul>
						<li><a href="index.php">管理首页</a></li>
						<li>文章管理
							<ul>
								<li><a href="addArt.php">添加文章</a></li>
								<li><a href="listArt.php">文章列表</a></li>
							</ul>
						</li>
						<li>用户管理
							<ul>
								<li><a href="changePsw.php">修改密码</a></li>
								<li><a href="userInfo.php">个人信息</a></li>
							</ul>
						</li>
						<li>系统设置
							<ul>
								<li><a href="links.php">友情链接</a></li>
								<li><a href="about.php">关于页面</a></li>
								<li><a href="config.php">系统设置</a></li>
							</ul>
						</li>
						<li><a href="logout.php">注销登录</a></li>
					</ul>
					<!-- End of Lists -->
					
					<!-- Statistics -->
					<h2>统计</h2>
					<p><b>文章总数:</b> <?php echo $artTotal ?></p>
					<p><b>用户总数:</b> <?php echo $userTotal ?></p>
					<!-- End of Statistics -->
				
			  </div>
				<!-- End of Sidebar -->
				
			</div>
			<!-- End of bgwrap -->
		</div>
		<!-- End of Container -->
		
		<!-- Footer -->
		<div id="footer">
			<p class="mid">
				<!-- Change this to your own once purchased -->
				&copy; onEcho 2013. All rights reserved.   |   design from Wide Admin
				<!-- -->
			</p>
		</div>
		<!-- End of Footer -->


	</body>
</html>
<?php 
// 关闭数据库连接
Sql::close();
?>
