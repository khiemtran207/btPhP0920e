<?php
function hv($a){
    echo "chiều dài cạnh hình vuông là: ".$a;
    echo "<br>";
//    echo "chiều rộng hình chữ nhật là: ".$b;
//    echo "<br>";
    echo "chu vi hình vuông là: ".($a * 4);
    echo "<br>";
    echo "diện tích hình chữ nhật là: ".($a*$a);
}
echo hv(10);
?>