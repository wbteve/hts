<?php
$dbhost = 'localhost';		//数据库服务器
$dbuser = 'root';			//数据库用户名
$dbpasswd = '11111';		//数据库密码
$dbname = 'hts';		//数据库名
if(is_file($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php')){
    require_once($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php');
} // 注意文件路径
?>