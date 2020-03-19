<?php
$db_server = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'demo';

$connection = mysqli_connect($db_server, $db_user, $db_password, $db_name);

//checking the connection
if(!$connection)
{
    die("not connected" . mysqli_connect_error());
}
?>