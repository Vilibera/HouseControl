
<?php

// Include the ORM library
require_once('lib/idiorm.php');

$host = 'smarthouse.mysql.database.azure.com';
$user = 'vilibera';
$pass = 'Laikrodis4321';
$database = 'collecteddata';

ORM::configure("mysql:host=$host;dbname=$database");
ORM::configure('username', $user);
ORM::configure('password', $pass);


ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
?>