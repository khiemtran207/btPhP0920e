<?php
$array = [12, 5, 200, 10, 125, 60, 90, 345, -123, 100,  -125, 0];
$newArr = [];
foreach ($array as $item) {
   if(200>= $item && $item >=100 && $item % 5 ==0){
       array_push($newArr, $item);
   }
}
sort($newArr);
echo   "các số từ 100 đến 200 chia hết cho 5 trong mảng là: ".implode(",",$newArr);
?>