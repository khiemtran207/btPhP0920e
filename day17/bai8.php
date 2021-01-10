<?php
//$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];
//
//$max = min($array);
//echo $max;
//?>
<html>

<head>
    <title>Tìm độ dài ngắn/dài nhất của phần tử dạng chuỗi trong mảng</title>
</head>
<body>

<?php
$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];
$mang_tam = array_map('strlen', $array);
sort($mang_tam);
//sử dụng hàm max() và hàm min() để tìm chuỗi có độ dài dài/ngắn nhất
echo "Độ dài ngan nhat của phần tử trong mang la: "."$mang_tam[0]." . min($mang_tam) .
    ". <br>Độ dài dai nhat của phần tử trong mang la: " . max($mang_tam).'.';
?>

</body>
</html>
