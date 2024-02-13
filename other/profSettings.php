<?php
require 'other/conn_msql.php';

$avatar = $_FILES['upld_file'] ?? null;
$avatarPath = null;
$flagg = 0;

// upload avatar profile



if (isset($_POST['sub_file'])) {


  // var_dump($_FILES['upld_file']);
  if(!empty($avatar)) {
    $types = ['image/img', 'image/png', 'image/jpg', 'image/jpeg'];
    if(!in_array($avatar['type'], $types)) {
      $err_m['warn_type'] = '<small id="name_dang" class="dang_mes" style="position: absolute; top: 130px; color: #9c1f28;">Данный формат изображения не поддерживается !</small>';
      $flagg = 1;
    }

    if($avatar['size'] / 1000000 >= 1) {
      $err_m['warn_type'] = '<small id="name_dang" class="dang_mes" style="position: absolute; top: 130px; color: #9c1f28;">Большой размер изображения !</small>';
      $flagg = 1;
    }


    if($flagg == 0) {
      $avatarPath = uploadFile($avatar, 'avatar');


    }


    if(!empty($avatar)) {
      require 'other/conn_msql.php';
      $intsql = $_SESSION['logined'];
      $intoSql = "UPDATE `userinfo` SET `avatar` = '$avatarPath' WHERE `userinfo`.`login` = '$intsql'";
      // $sql_z = "INSERT INTO `userinfo` (`avatar`) VALUES ('$avatarPath')";
      $mysql->query($intoSql);
      print('Успешно сохранено !');

     }


  }
}


// require 'other/conn_msql.php';
// $exSqll = $_SESSION['logined'];
// $sqlProfile = $mysql->query("SELECT * FROM `userinfo` WHERE `login` = '$exSqll'");
// while($us = mysqli_fetch_assoc($sqlProfile)) {
//   $profilePhoto = $us['avatar'];
// }
 ?>
