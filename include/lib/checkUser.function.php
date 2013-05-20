<?php
/*
 * 用户验证函数库
 */
// 判断登录状态
function isLogin() {
	if (isset ( $_COOKIE ['isLogin'] ) == 1) {
		// 已经登录
		return true;
	} else {
		// 没有登录
		return false;
	}
}

// 验证用户
function checkUser($user, $psw) {
	// 判断输入是否为空
	if (trim ( $user ) == "" || trim ( $psw ) == "") {
		return false;
	} else {
		
		$sql = "SELECT * FROM onecho_user WHERE user='{$user}' AND psw=md5('{$psw}')";
		$result = mysql_query ( $sql );
		
		// 判断验证结果
		if (! mysql_num_rows ( $result ) > 0) {
			echo "用户名密码错误";
		} else {
			
			$rs = mysql_fetch_assoc ( $result );
			// 设置cookie
			// cookie保存时间 1周
			$cookieTime = time () + 60 * 60 * 24 * 7;
			setcookie ( "user", $rs ['user'], $cookieTime );
			setcookie ( "uid", $rs ['uid'], $cookieTime );
			setcookie ( "isLogin", 1, $cookieTime );
			setcookie ( "nickname", $rs ['nickName'], $cookieTime );
			
			// 关闭数据库连接
			mysql_close ();
			// 跳转到index
			header ( "Location:index.php" );
		}
	}
}

// 退出登录
function logout() {
	
	// 设置cookie
	// 设置cookie过期
	$cookieTime = time () - 1024;
	setcookie ( "user", "", $cookieTime );
	setcookie ( "uid", "", $cookieTime );
	setcookie ( "isLogin", 0, $cookieTime );
	setcookie ( "nickname", "", $cookieTime );
}

?>