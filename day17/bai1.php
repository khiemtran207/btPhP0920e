<?php
    $arrs = [2, 5, 6, 9, 2, 5, 6, 12 ,5];
    echo "Tổng các phần tử = ".implode(' + ',$arrs)." = ".array_sum($arrs)."<br>";

    $hieu = 2*$arrs[0];
    $tich = 1;
    $thuong = 2*$arrs[0];
    foreach ($arrs as $value) {
        $hieu -= $value;
        $tich *= $value;
        $thuong /= $value;
    }
    echo "Hiệu các phần tử = ".implode( ' - ',$arrs)." = ".$hieu."<br>";
    echo "Tích các phần tử = ".implode(' * ',$arrs)." = ".$tich."<br>";
    echo "Thương các phần tử = ".implode(' / ',$arrs)." = ".$thuong;
?>
