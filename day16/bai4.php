<?php
    function show($n){
        $gach = '-';
        for($i=1;$i<=$n;$i++){
            if($i==$n){
                $gach = '';
            }
           echo $bt = $i.$gach;
        }
    }
   echo show(100);
?>