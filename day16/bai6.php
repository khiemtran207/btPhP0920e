<?php
    function showTotal($n){
        $sum = 0;
        for($i=0; $i<=$n;$i++){
          $sum+= $i;
        }
        return "tổng các số từ 1 đến $n là: ".$sum;
    }
    echo showTotal(23);
?>