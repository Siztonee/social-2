<?php

  require 'conn_msql.php';



  if(isset($_POST['sendMess'])) {
    $message = $_POST['mess'];
    $time = time();
    $toBase = "INSERT INTO `message` (`id`, `name`, `login`, `message`, `time`) VALUES ('$profileId1', '$profileName1', '$profileLogin1', '$message', '$time')";
  //  $toBase = "UPDATE `message` SET `message` = '$message' WHERE `message`.`id` = '$profileId1'";
    $mysql->query($toBase);
    header('Location: index.php');
  }












 ?>
