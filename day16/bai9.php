<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        table{
            width: 50%;
            margin-left: 25%;
            border: 1px solid black;
            border-bottom: 2px solid black;
            border-top: none;
        }
        td{
            width: 10%;
            height: 20px;
            text-align: center;
            border: 1px solid black;

            margin-right: 10px;
            border-bottom: none;
            border-top: none;
            font-size: 13px;
            padding: 0 1px;
        }
        th{
            border: 1px solid black;
            background: #0b8c8c;
            border-bottom: 2px solid black;
            border-top: 2px solid black;
        }
        .bcc{
            text-align: center;
            text-transform: capitalize;
            color: green;
        }
    </style>
</head>
<body>
<?php
echo "<h2 class='bcc'>bảng cửu chương</h2>";
echo "<table cellspacing='0'>";
    echo "<tr>";
        for($a=1;$a<=5;$a++){
            echo "<th>";
            echo $a;
            echo "</th>";
        }
    echo "</tr>";
        for($i = 1; $i <= 10; $i++){
            echo "<tr>";
            for($x = 1; $x <= 5; $x++){
                $a = $i * $x;
                echo "<td>";
                echo $x. " x " .$i. " = ".$a ;
                echo "</td>";
            }
            echo "</tr>";
        }
    echo "<tr>";
        for($a=6;$a<=10;$a++){
            echo "<th>";
            echo $a;
            echo "</th>";
        }
    echo "</tr>";
    for($i = 1; $i <= 10; $i++){
        echo "<tr>";
        for($x = 6; $x <= 10; $x++){
            $a = $i * $x;
            echo "<td>";
            echo $x. " x " .$i. " = ".$a ;
            echo "</td>";
        }
        echo "</tr>";
    }
echo "</table>";
?>
</body>
</html>