<?php
/*
 * SQL操作
 */
class Sql {
	
	/*
	 * 设置用户信息
	 */
	function setUserInfo($user, $nickName, $userSignature, $userInfo) {
		$sql = "UPDATE onecho_user SET user='$user', nickName='$nickName', userSignature='$userSignature', userInfo='$userInfo' WHERE uid=1";
		$result = mysql_query ( $sql );
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 * 获取用户信息
	 */
	function getUserInfo() {
		$sql = "SELECT * FROM onecho_user WHERE uid=1";
		$result = mysql_query ( $sql );
		$rs = mysql_fetch_assoc ( $result );
		
		return $rs;
	}
	
	/*
	 * 设置About信息
	 */
	function setAbout($about) {
		$sql = "UPDATE onecho_config SET sizeAbout='$about' WHERE configId=1";
		$result = mysql_query ( $sql );
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 * 设置sizeConfig
	 */
	function setConfig($sizeName, $sizeInfo) {
		$sql = "UPDATE onecho_config SET sizeName='$sizeName', sizeInfo='$sizeInfo' WHERE configId=1";
		$result = mysql_query ( $sql );
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 * 获取sizeConfig
	 */
	function getConfig() {
		$sql = "SELECT * FROM onecho_config";
		$result = mysql_query ( $sql );
		$rs = mysql_fetch_assoc ( $result );
		
		return $rs;
	}
	
	/*
	 * 设置友情链接
	 */
	function updateLink($lid, $linkName, $linkUrl, $linkInfo, $linkActive) {
		$sql = "UPDATE onecho_links SET linkName='$linkName', linkUrl='$linkUrl', linkInfo='$linkInfo', linkActive='$linkActive' WHERE lid='$lid'";
		$result = mysql_query ( $sql );
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 * 修改密码
	 */
	function changePsw($oldPassword, $newPassword, $newPasswordConfirm, $user) {
		$sql = "SELECT * FROM onecho_user WHERE user='{$user}' AND psw=md5('{$oldPassword}')";
		
		// 判断3个密码输入是否为空
		if (trim ( $oldPassword ) == "" || trim ( $newPassword ) == "" || trim ( $newPasswordConfirm ) == "") {
			return 1;
			// 判断新密码是否相等
		} else if (strcmp ( $newPassword, $newPasswordConfirm ) != 0) {
			return 2;
			// 判断旧密码是否正确
		} else if (! mysql_num_rows ( mysql_query ( $sql ) ) > 0) {
			return 3;
		} else {
			// $update = "UPDATE onecho_user SET psw=md5(" . $newPassword . ")
			// WHERE user='$user'";
			$update = "UPDATE onecho_user SET psw=md5('$newPassword')  WHERE user='$user'";
			$result = mysql_query ( $update );
			if ($result) {
				return 4;
			} else {
				return 5;
			}
		}
	}
	
	/*
	 * 删除文章 返回布尔值	删除成功：true	删除失败：false
	 */
	function delArticle($id) {
		$sql = $sql = "DELETE FROM onecho_article WHERE id=" . $id;
		$result = mysql_query ( $sql );
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 * 更新文章 返回布尔值	更新成功：true	更新失败：false
	 */
	function updateArticle($id, $title, $content, $datetime) {
		$sql = "UPDATE onecho_article SET title='$title', content='$content', editDate='$datetime' WHERE id='$id'";
		// $sql = "UPDATE onecho_article SET title='" . $title . "', summary='"
		// . $summary . "', content='" . $content . "', authorId='" . $_COOKIE
		// ['uid'] . "' WHERE id=" . $_GET ['id'];
		$result = mysql_query ( $sql );
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 * 添加文章 返回布尔值	添加成功：true 添加失败：false
	 */
	function addArticle($title, $content, $datetime) {
		$sql = "INSERT INTO onecho_article(title,content,editDate) VALUES('$title', '$content', '$datetime')";
		$result = mysql_query ( $sql );
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 * 通过ID查询某篇文章 返回关联数组
	 */
	function selectArtbyId($id) {
		$sql = "SELECT * FROM onecho_article WHERE id=" . $id;
		$result = mysql_query ( $sql );
		$rs = mysql_fetch_assoc ( $result );
		
		return $rs;
	}
	
	/*
	 * 关闭数据库连接
	 */
	function close() {
		mysql_close ();
	}
	
	/*
	 * 获取用户总数
	 */
	function getUserTotal() {
		$sql = "SELECT COUNT(*) AS users FROM onecho_user";
		$result = mysql_query ( $sql );
		$rs = mysql_fetch_assoc ( $result );
		
		return $rs ['users'];
	}
	
	/*
	 * 获取文章总数
	 */
	function getArtTotal() {
		$sql = "SELECT COUNT(*) AS total FROM onecho_article";
		$result = mysql_query ( $sql );
		$rs = mysql_fetch_assoc ( $result );
		
		return $rs ['total'];
	}
}
?>