<?PHP 
$dbhost = 'kasperhelweg.dk.mysql';
$dbuser = 'kasperhelweg_dk';
$dbpass = 'sql2211';
$dbname = 'kasperhelweg_dk';

mysql_connect($dbhost, $dbuser, $dbpass) or die ('MYSQL connection error');
mysql_select_db($dbname);

?>
