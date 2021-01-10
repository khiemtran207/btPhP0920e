<html>
    <head>
        <title>bài 4</title>
    </head>
    <body>
    <form action="#" method="post">
        <table>
            <h2>THÔNG TIN</h2>
            <tr>
                <td>tên của bạn:</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>tuổi của bạn:</td>
                <td><input type="text" name="age"></td>
            </tr>
            <tr>
                <td>ngày sin:</td>
                <td><input type="text" name="date"></td>
            </tr>
            <tr>
                <td>giới tính:</td>
                <td><input type="text" name="gender"></td>
            </tr>
            <tr>
                <td>quê quán:</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="click"></td>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST['click'])){
            $obj_name = $_POST['name'];
            $obj_age = $_POST['age'];
            $obj_date = $_POST['date'];
            $obj_gender = $_POST['gender'];
            $obj_address = $_POST['address'];

            setcookie("name", $obj_name, time() + 600);
            setcookie("age", $obj_age, time() + 600);
            setcookie("date", $obj_date, time() + 600);
            setcookie("gender", $obj_gender, time() + 600);
            setcookie("address", $obj_address, time() + 600);

            echo "<table>";
            for($i = 0; $i < 100; $i++){

            }
            echo "</table>";
        }
    ?>
    </body>
</html>
