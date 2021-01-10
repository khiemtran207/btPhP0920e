<html>
    <head>
        <title>bài 11</title>
    </head>
    <style>
        #mau{
            background: #0b8c8c;
        }
    </style>
    <body>
        <?php
        $xd = "";
        echo "<table>";
        echo "<tr>";
        for($j=1; $j<=100; $j++) {
            if($j%10===0){
                $xd = "<br>";
            }
            echo $j.$xd;
        }
        echo "</tr>";
        echo "</table>";
        ?>
    </body>
</html>