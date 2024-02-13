<?php
  require 'conn_msql.php';



  $sqlGet = "SELECT * FROM `message` ORDER BY `message`.`time` DESC";
  $getMess = $mysql->query($sqlGet);





  $stopF = 0;

  if ($getMess->num_rows > 0) {
    while ($get = $getMess->fetch_assoc()) {

        echo "<div class='messText'>" . "<a href='#'>" . $get["login"] . "</a>" . $idProfile . ": " . $get["message"] . "</div>" ."<br>";


        // if (mb_strlen($get["message"]) > 20) {
        //   echo '<br>';
        // }
        $stopF++;
        if ($stopF == 35) {
          break;
        }
    }
}




 ?>
