<?php
    function showStar($star){
        $sao = "*";
        for($i=0; $i<$star;$i++){
          for($j = ($star - $i); $j <= $star ;$j++){
              echo "*";
          }
          echo "<br>";
        }
};
    echo showStar(5);
?>