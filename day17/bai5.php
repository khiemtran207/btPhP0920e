<?php
$a = [
    'a' => [
        'b' => 0,
        'c' => 1
    ],
    'b' => [
        'e' => 2,
        'o' => [
            'b' => 3
        ]
    ]
];

////    echo $a['b'];
//    foreach ($a['b']['o'] as $key => $value){
//        ec
//ho "giá trị của phần tử có key là ".$key." trong mảng là: ".$value;
//    }
echo "giá trị của phần tử có key là b trong mảng là ".$a['b']['o']['b']."<br>";
echo "giá trị của phần tử có key là c trong mảng là ".$a['a']['c']."<br>";

foreach ($a['a'] as $key => $value){
    echo "giá trị của phần tử có key là a là mảng kết hợp có"." key ".$key." = ".$value."<br>";
}

?>