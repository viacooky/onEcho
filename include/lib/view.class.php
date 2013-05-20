<?php
/*
 * 视图控制
 */
class View{
	function getView($template, $ext = ".php"){
		if(!is_dir(TEPL_PATH)){
			echo "模板路径损坏";
		}else{
			return TEPL_PATH . $template . $ext;
		}
	}
	
	
	function adminView($template, $ext = ".php"){
			if(!is_dir(ADMIN_TEMPLATE_PATH)){
			echo "模板路径损坏";
		}else{
			return ADMIN_TEMPLATE_PATH . $template . $ext;
		}
	}

}
?>