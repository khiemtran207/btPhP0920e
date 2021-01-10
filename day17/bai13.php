<?php
$numbers = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
//•	Tính toán giá trị trung bình của mảng trên
$tb = array_sum($numbers)/(count($numbers));
echo "giá trị trung bình của mảng trên là: ".$tb;
//	Liệt kê các số có giá trị lớn hơn giá trị trung bình đó
echo "<br>";
array_filter()
?>