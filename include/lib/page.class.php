<?php
/*
 * 分页类
 */
class Page {
	
	// 总记录行数
	private $total;
	// 每页显示行数
	private $pageSize;
	// 总页数
	private $pageNum;
	// 当前页码
	private $pageIndex;
	// url
	private $url;
	// LIMIT
	private $limit;
	// 输出配置
	private $config = array (
			"first" => "首   页",
			"last" => "尾   页",
			"prev" => "上一页",
			"next" => "下一页" 
	);
	
	/*
	 * 构造函数
	 */
	function __construct($total, $pageSize, $pageIndex) {
		// 获取总记录行数
		$this->total = $total;
		// 获取每页显示的行数
		$this->pageSize = $pageSize;
		// 进一取整 获取总页数
		$this->pageNum = ceil ( $this->total / $this->pageSize );
		// 获取当前页
		$this->pageIndex = $pageIndex;
		// 获取URI
		$this->url = $this->getUrl ();
		// 获取LIMIT
		$this->limit = $this->setLimit ();
	}
	
	/*
	 * 获取limit
	 */
	private function __get($str) {
		if ($str == "limit") {
			return $this->limit;
		} else {
			return null;
		}
	}
	
	/*
	 * 设置limit
	 */
	private function setLimit() {
		return "LIMIT " . ($this->pageIndex - 1) * $this->pageSize . ", " . $this->pageSize;
	}
	
	/*
	 * 获取URl
	 */
	function getUrl() {
		// 获取URL 判断URL后有没有? 如果没有就加上
		$url = $_SERVER ['REQUEST_URI'] . (strpos ( $_SERVER ['REQUEST_URI'], '?' ) ? '' : '?');
		$i = parse_url ( $url );
		// 判断是否有请求
		if (isset ( $i ["query"] )) {
			// 解析到数组
			parse_str ( $i ["query"], $urls );
			// 清空数组下标为page的值
			unset ( $urls ['page'] );
			// 将路径与请求重构
			$url = $i ['path'] . '?' . http_build_query ( $urls );
		}
		return $url;
	}
	/*
	 * 开始行数
	 */
	private function start() {
		if ($this->total == 0) {
			return 0;
		} else {
			return ($this->pageIndex - 1) * $this->pageSize + 1;
		}
	}
	/*
	 * 结束行数
	 */
	private function end() {
		return min ( $this->pageIndex * $this->pageSize, $this->total );
	}
	/*
	 * 首页
	 */
	private function firstPage() {
		$html = "";
		if ($this->pageIndex == 1) {
			return $html .= '';
		} else {
			$html .= "<a href=" . $this->url . "page=1>" . $this->config ['first'] . "</a>";
		}
		return $html;
	}
	/*
	 * 尾页
	 */
	private function lastPage() {
		$html = "";
		if ($this->pageIndex == $this->pageNum) {
			return $html .= '';
		} else {
			$html .= "<a href=" . $this->url . "page=" . $this->pageNum . ">" . $this->config ['last'] . "</a>";
		}
		return $html;
	}
	/*
	 * 上一页
	 */
	private function prevPage() {
		$html = "";
		if ($this->pageIndex == 1) {
			return $html .= '';
		} else {
			$html .= "<a href=" . $this->url . "&page=" . ($this->pageIndex - 1) . ">" . $this->config ['prev'] . "</a>";
		}
		return $html;
	}
	/*
	 * 下一页
	 */
	private function nextPage() {
		$html = "";
		if ($this->pageIndex == $this->pageNum) {
			return $html .= '';
		} else {
			$html .= "<a href=" . $this->url . "&page=" . ($this->pageIndex + 1) . ">" . $this->config ['next'] . "</a>";
		}
		return $html;
	}
	
	/*
	 * 分页
	 * 可自定义  
	 */
	function fPage() {
		$html = "";
		$html .= "共有 {$this->total} 篇文章&nbsp;&nbsp;";
		$html .= "每页显示" . ($this->end () - $this->start () + 1) . "条,本页{$this->start()} - {$this->end()} 条&nbsp;&nbsp;";
		$html .= "{$this->pageIndex}/{$this->pageNum}&nbsp;&nbsp;<br>";
		$html .= $this->firstPage ();
		$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$html .= $this->prevPage ();
		$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$html .= $this->nextPage ();
		$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$html .= $this->lastPage ();
		return $html;
	}
	
	/*
	 * 首页的分页
	 */
	function indexPage(){
		$html = '';
		$html .= '<p align="right">';
		$html .= '<strong>'. $this->prevPage() .'</strong>';
		$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$html .= '<strong>'. $this->nextPage() .'</strong>';
		$html .= '</p>';
		$html .= '<p align="right">'. $this->pageIndex . ' / ' . $this->pageNum .'</p>';
		return $html;
	}
	
	

}
?>