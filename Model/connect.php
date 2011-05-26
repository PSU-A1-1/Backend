<?PHP 
$dbhost = '';
$dbuser = '';
$dbpass = '';
$dbname = '';

mysql_connect($dbhost, $dbuser, $dbpass) or die ('MYSQL connection error');
mysql_select_db($dbname);

?>
