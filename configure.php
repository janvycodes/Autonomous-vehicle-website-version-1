<?php
 define('DB_SERVER', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASS', '');
 define('DB_NAME', 'av-db');

$conn = new mysqli('localhost', 'root', '', 'av-db');

if($conn->connect_errno){
      echo $mysqli->connect_errno.": ".$mysqli->connect_error;
   }
 ?>