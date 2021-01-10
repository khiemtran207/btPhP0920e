<?php
    function hcn($a,$b){
        echo "chiều dài hình chữ nhật là: ".$a;
        echo "<br>";
        echo "chiều rộng hình chữ nhật là: ".$b;
        echo "<br>";
        echo "chu vi hình chữ nhật là: ".(($a + $b)/2);
        echo "<br>";
        echo "diện tích hình chữ nhật là: ".($a*$b);
    }
    echo hcn(10,20);
?>