<?php
$array = array(1, 2, 3, 4, 5);
$newArr = [];
for($i = 0; $i< count($array); $i++){
    if($array[$i] !== 4){
        array_push($newArr, $array[$i]);
    }
}
var_dump($newArr);
?>