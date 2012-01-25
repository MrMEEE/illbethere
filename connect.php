<?php


/* Database config */

$db_host = 'DBHOST';
$db_user = 'DBUSER';
$db_pass = 'DBPASS';
$db_database = 'DBDATABASE';

/* End config */


$link = @mysql_pconnect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);

?>

