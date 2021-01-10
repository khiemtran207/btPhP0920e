<?php
$arrs = ['1','B','c','e'];
$newArrs = [];
foreach ($arrs as $value){
    array_push($newArrs, strtolower($value));
}
var_dump($newArrs);
echo "<br>";
$arrs = ['a', 0, null, false];
$newArrs = [];
foreach ($arrs as $value){
    array_push($newArrs, strtolower($value));
}
var_dump($newArrs);
?>