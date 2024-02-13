<?php
session_start();
if($_SESSION['logined'] == '') {
  header('Location: auth.php');
}
 ?>

<?php
if(isset($_GET['id']) & $_GET['id'] != $_SESSION['id-user']) {
    require 'other/conn_msql.php';
    $users = $mysql->query("SELECT * FROM `userinfo` WHERE `id`=".$_GET['id']);
    while($us = mysqli_fetch_assoc($users)) {
      $profilePhotos = $us['avatar'];
      $profileLogin = $us['login'];
      $profileId = $us['id'];
      $profileName = $us['name'];

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require 'other/settings.php'; ?>
    <meta charset="utf-8">
    <title><?=$profileLogin?></title>

  </head>
  <body>


     <!-- ?> -->


    <?php   ?>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@100;300;400;600&display=swap');
    </style>

    <h2>профиль: </h2>

    <div class="profile" style="display: grid;
     margin-left: 15%;

     ">
      <img src="<?=$profilePhotos?>" style="width: 200px;
       height:200px;
       border-radius: 50%;
       border: 3px solid silver;
       ">
      <h2 id="frst"><?=$profileLogin?></h2>
      <hr>
      <h2 id="secnd">ID: <?=$profileId?></h2>
      <hr>
      <h1><?=$profileName?></h1>
    </div>

    <style media="screen">

      * {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 400;
      }

      body {
        background: #d1d0d9;
      }

      .profile {
         background: #a09fab;
         /* box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); */
         border-radius: 10px;
         width: 700px;
         padding: 70px 30px;
      }

      .profile h1 {
        position: absolute;
        left: 40%;
        font-size: 40px;
      }
      .profile h2 {
        position: absolute;
        font-size: 30px;
      }
      .profile #frst {
        left: 40%;
        top: 190px;
        left: 38,5%;
      }

      .profile #secnd {
        top: 340px;
        left: 24%;
      }

    </style>
  <?php
    $mysql->close();
   ?>


  </body>
</html>
<?php
  }
}

elseif(isset($_SESSION['id-user']) or $_GET['id'] == $_SESSION['id-user']) {
  require 'other/conn_msql.php';
  $me_info = $mysql->query("SELECT * FROM `userinfo` WHERE `id`=" . $_SESSION['id-user']);
  while($me = mysqli_fetch_assoc($me_info)) {
    $profilePhotos1 = $me['avatar'];
    $profileLogin1 = $me['login'];
    $profileId1 = $me['id'];
    $profileName1 = $me['name'];

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <?php require 'other/settings.php'; ?>
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <title>Главная страница</title>
   </head>
   <body>

     <style>
       @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@100;300;400;600&display=swap');
     </style>




     <!-- <h1>Привет, <?//=$profileLogin1?>. Чтобы выйти нажмите на <a href="other/exit.php">ВЫЙТИ.</a></h1> -->
     <h2 id="exitBut"><a href="other/exit.php">выйти</a></h2>
     <h2 id="homeBut" class="material-symbols-outlined" style="padding-top: 10px;">home<a href="/"></a></h2>

     <div class="profile" style="display: grid;
      margin-left: 10%;">
       <img src="<?=$profilePhotos1?>"  style="width: 200px;
        height:200px;
        border-radius: 50%;
        border: 3px solid silver;
        ">
       <h2 id="frst"><?=$profileLogin1?></h2>
       <hr>
       <h2 id="secnd">ID: <?=$profileId1?></h2>
       <hr>
       <h1><?=$profileName1?></h1>

     </div>


     <?php
       require 'other/profSettings.php';
      ?>


     <!-- <div class="settingsOfProfile">
       <form class="formOfSettings" action="index.php" method="post" enctype="multipart/form-data">
         <h2>Изменить аватарку</h2>
         <input type="file" name="upld_file"><br><br>
         <?//php echo $err_m['warn_type'] ?>
         <input type="submit" name="sub_file" value="Изменить">
       </form>
     </div> -->



     <style media="screen">
         * {
           font-family: 'Roboto Condensed', sans-serif;
           font-weight: 400;
         }

        body {
          background: #d1d0d9;
        }

        #exitBut a {

          color: #000;
          text-decoration: none;
        }

        #exitBut {
          padding-top: 10px;
          width: 110px;
          height: 40px;
          background: #a09fab;
          text-align: center;
          border-radius: 5px;
          position: absolute;
          right: 20px;
          top: 0px;
        }

        #homeBut a {
          color: #000;
          text-decoration: none;
        }



        #homeBut {
          width: 50px;
          height: 40px;
          background: #a09fab;
          text-align: center;
          border-radius: 5px;
          position: absolute;
          top: 0px;
        }

       .profile {
          background: #a09fab;
          /* box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); */
          border-radius: 10px;
          width: 700px;
          padding: 70px 30px;
          position: absolute;
          top: 100px;
          left: 50px;
       }

       .settingsOfProfile {
         margin-top: 100px;
       }

       .profile h1 {
         position: absolute;
         left: 37%;
         top: 80px;
         font-size: 40px;
       }
       .profile h2 {
         position: absolute;
         font-size: 30px;
       }
       .profile #frst {
         left: 40%;
         top: 135px;
         left: 37%;
       }

       .profile #secnd {
         left: 13%;
         top: 270px;

       }

       .messForm input {
         background: #5f6661;
         color: #d3e0d7;
         height: 30px;
         border: 3px solid silver;
         border-radius: 10px;
       }

       #mess {
         width: 400px;
       }

       .messages {
         background: #5f6661;
         color: #d3e0d7;
         border: 3px solid silver;
         border-radius: 5px;
         width: 400px;
         height: 300px;
         margin-top: 1px;
         overflow: scroll;
       }

       .hiddenMess {
         z-index: 999;
         background: red;
         width: 400px;
         height: 100px;
       }
       .messages span {
         position: relative;

         top: 15px;
         z-index: 1;
         width: 100px;
       }
         .messBlock {
           margin-top: 300px;
         }

         .messText {
           margin-left: 10px;
         }

         a {

           color: #909695;
         }

         .messBlock {
           display: grid;
           margin-left: 30%;
           margin-top: 50%;
         }


     </style>

<br><br><br>

<?php require 'other/message.php'; ?>

     <div class="messBlock">
       <form class="messForm" action="/" method="post">
         <input id="mess" type="text" name="mess" placeholder="Сообщение">
         <input id="sendMess" type="submit" name="sendMess" value="Отправить">
         <button type="submit" name="button">Перезагрузить</button>
       </form>


       <div class="messages">
         <?php require 'other/getMess.php';?>
       </div>



     </div>




   <?php
     $mysql->close();
    ?>



   </body>
 </html>


 <?php
  }
}
  ?>
