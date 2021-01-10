<?php
$keys = array(
    "field1"=>"first",
    "field2"=>"second",
    "field3"=>"third"
);
$values = array(
    "field1value"=>"dinosaur",
    "field2value"=>"pig",
    "field3value"=>"platypus"
);

$newkey = array_values($keys);
$newvalue = array_values($values);
//for($i = 0; $i<3;$i++){
//    $newArr += [$newkey[$i]=>$newvalue[$i]];
//    echo $newArr[1];
//}
$newArr = array($newkey[0]=>$newvalue[0],$newkey[1]=>$newvalue[1],$newkey[2]=>$newvalue[2]);
var_dump($newArr);
?>