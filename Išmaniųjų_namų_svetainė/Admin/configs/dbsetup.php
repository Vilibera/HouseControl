
<?php

// Include the ORM library
require_once('../User/lib/idiorm.php');

$host = 'database address';
$user = 'database login name';
$pass = 'database login password';
$database = 'database name';

ORM::configure("mysql:host=$host;dbname=$database");
ORM::configure('username', $user);
ORM::configure('password', $pass);


ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
