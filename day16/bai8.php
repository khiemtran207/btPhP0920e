<?php
    function showStar($star){
        for($i=0; $i<=$star; $i++){
            for($j=($star-$i); $j<= $star; $j++){
                echo "*";
            }
                echo "<br>";
        }
        for($h=0; $h<=$star; $h++) {
            for ($k = ($star - $h); $k >= 0; $k--) {
                echo "*";
            }
            echo "<br>";
        }
    }
    echo showStar(100);
?>