<!--•	Lấy ra phần tử đầu tiên, phần tử cuối cùng trong mảng trên
•	Tìm số lớn nhất, số nhỏ nhất, tổng các giá trị từ mảng trên
•	Sắp xếp mảng theo chiều tăng, giảm các giá trị
•	Sắp xếp mảng theo chiều tăng, giảm các key
-->
<?php
$numbers = [
    'key1' => 12,
    'key2' => 30,
    'key3' => 4,
    'key4' => -123,
    'key5' => 1234,
    'key6' => -12565,
];
//Lấy ra phần tử đầu tiên, phần tử cuối cùng trong mảng trên
$newvalueArr = array_values($numbers);
$newkeyArr = array_keys(($numbers));
echo "phần tử đầu tiên của mảng có key = $newkeyArr[0] và có value = $newvalueArr[0]";
//Tìm số lớn nhất, số nhỏ nhất, tổng các giá trị từ mảng trên
echo "<br>";
$max = max($numbers);
$min = min($numbers);
echo "giá trị lớn nhất của các giá trị trong mảng trên là: $max <br>";
echo "giá trị nhỏ nhất của các giá trị trong mảng trên là: $min <br>";
//Sắp xếp mảng theo chiều tăng, giảm các giá trị
//sort($numbers);
//echo "mảng được sắp xếp theo giá trị tăng đần giá trị là:";
//echo implode(',',$numbers);
//echo "<br>";
//Sắp xếp mảng theo chiều tăng, giảm các key
ksort($numbers);
echo "mảng được sắp xếp theo key tăng đần là:";
//echo implode(',',$numbers);
foreach ($numbers as $key => $number) {
    echo $key.",";
}
?>