<?php
// viết chương trình giải pt bậc 2: ax2 + bx _ c = 0;
/**
 * @param $a
 * @param $b
 * @param $c
 */
function Pt($a, $b, $c){
    $delta = ($b * $b)- 4*$a*$c;
    $nghiemkep = -$b/2*$a;
    $x1 = ((-$b)-sqrt($delta))/(2*$a);
    $x2 = ((-$b)+sqrt($delta))/(2*$a);
    if($delta < 0){
        echo "phương trình vô nghiệm <br>";
    }else if($delta == 0){
        echo "PHương trình có nghiệm kép";
        echo "x1 = $nghiemkep <br>";
        echo "x2 = $nghiemkep <br>";
    }else if($delta > 0){
        echo "phương trình có 2 nghiệm phân biệt<br>";
        echo "x1 = $x1 <br>";
        echo "x2 = $x2";
    }

}

echo Pt(0,55,5);
?>