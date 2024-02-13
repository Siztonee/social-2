<?php
$mysql = new mysqli('localhost', 'root', 'root', 'second_data');
$mysql->query("SET NAMES 'utf8'");
if($mysql->connect_error) {
  echo 'Error: '.$mysql->connect_error;
  exit;
}
 ?>
