<?php
    $varible1 = '123abc';
    $varible2 = null;
    $varible3 = "";
    $varible4 = 'abc123';
    $varible5 = 'null';

    echo "<table>";
        echo "<tr>";
            echo "<td>";
            echo "Khai báo biến";
            echo "</td>";
            echo "<td>";
            echo "Ép sang int";
            echo "</td>";
            echo "<td>";
            echo "Ép sang Float";
            echo "</td>";
            echo "<td>";
            echo "Ép sang String";
            echo "</td>";
            echo "<td>";
            echo "Ép sang Boolean";
            echo "</td>";
        echo "</tr>";
        for($i = 0; $i<6; $i++) {
            echo "<tr>";
                echo "<td>";
                    echo $variable.$i;
                echo "</td>";
                echo "<td>";
                    echo (int) $variable.$i;
                echo "</td>";
                echo "<td>";
                    echo (float) $variable.$i;
                echo "</td>";
                echo "<td>";
                    echo (string) $variable.$i;
                echo "</td>";
                echo "<td>";
                    echo (bool) $variable.$i;
                echo "</td>";
            echo "<tr>";
        }
    echo "</table>";

?>