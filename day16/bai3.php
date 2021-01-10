<?php
    const PI = 3.14;
function ht($a){
    echo "chiều dài đường kính hình tròn là: ".$a;
    echo "<br>";
//    echo "chiều rộng hình chữ nhật là: ".$b;
//    echo "<br>";
    echo "chu vi hình tròn là: ".($a * PI);
    echo "<br>";
    echo "diện tích hình tròn là: ".($a*$a*PI)."m<sup>2</sup>";
}
echo ht(10);
?>