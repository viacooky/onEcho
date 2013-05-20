<?php
/*
 * 数据库连接
 */
mysql_connect('localhost', 'root', 'root');
mysql_select_db('onecho');
// 设置数据库编码
mysql_query('set names utf8');
?>