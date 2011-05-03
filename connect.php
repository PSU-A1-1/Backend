<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'stengade';
mysql_connect($dbhost, $dbuser, $dbpass) or die ('MYSQL connection error');
mysql_select_db($dbname);
?>