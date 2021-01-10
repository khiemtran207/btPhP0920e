<html>
    <head>
        <title>cờ</title>
        <style>
            table{
                border:"1px solid black";

            }
            td{
                width: 50px;
                height: 50px;
                border: 1px solid black;
            }
            .balck{
                background: black;
            }
        </style>
    </head>
    <body>
        <?php
        echo "<table cellspacig=\"0\" >";
            for($i=1;$i<=8;$i++){
                echo "<tr>";
                for($x=1;$x<=8;$x++) {
                    $trclass = "<td>";
                    if( $i % 2 !== 0 && $x % 2 !== 0 || $i % 2 == 0 && $x % 2 == 0){
                        $trclass = "<td class=\"balck\">";
                    }

                    echo $trclass;
                    echo "</td>";
                };
                echo "</tr>";
            };
        echo "<table>";
        ?>
    </body>
</html>