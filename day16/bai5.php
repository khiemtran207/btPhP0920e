<?php

    function Showsum($n){
        $sum = 0;
        $cong = "+";
        for($i = 1; $i <= $n ; $i++){
            if($i == $n){
                $cong = '';
            }
            $bt = "1/".$i.$cong;
            echo $bt;
        }
        $sum += (1/$i);
        return " = $sum";
    }
    echo Showsum(20);
?>