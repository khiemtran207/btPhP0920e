<?php
    $arrs = ['1','a','b','c'];
   $newArr =  array_map('strtoupper', $arrs);
    var_dump($newArr);
//    strtoupper()
echo "<br>";
$arr2 = ['a',0,null, false];
    $newArr2 = array_map('strtoupper',$arr2);
    var_dump($newArr2);
?>