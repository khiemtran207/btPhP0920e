<?php

function hcn(){

    $length = 19;
    $width = 13;
    $cv = ($length + $width)/2;
    $dt = $length * $width;

        echo "chiều dài hình chữ nhật là: $length";
        echo "<br>";
        echo "chiều rộng hình chữ nhật là: $width";
        echo "<br>";
        echo "chu vi hình chữ nhật là: $cv";
        echo "<br>";
        echo "diện tích hình chữ nhật là: $dt";
    }
    echo hcn();
?>