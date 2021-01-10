<?php
    $error = '';
    $result = '';
    if(isset($_POST['show'])){
        $obj_name = $_POST['name'];
        $obj_email = $_POST['email'];
        $obj_date = $_POST['date'];
        $obj_class = $_POST['class'];

        if(empty($obj_name)){
            $error = "Không được để trống name";
        }else if(empty($obj_email)){
            $error = "không được để trống email";
        }else if(!filter_var($obj_email, FILTER_VALIDATE_EMAIL)){
            $error = "email không đúng địng dạng";
        }else if(empty($obj_date)){
            $error = "không được để trống time";
        }else if(empty($obj_class)){
            $error = "không được để trống class";
        }else if(!isset($_POST['gender'])){
            $error = "phải chọn gender";
        }

        if($error == ''){
            $result = "Tên vừa nhập vào là: $obj_name";
            $result .= "<br>Email vừa nhập vào là: $obj_email";
            $result .= "<br>date vừa nhập vào là: $obj_date";
            $result .= "<br>class vừa nhập vào là: $obj_class";
            if(isset($_POST['gender'])){
                switch ($_POST['gender']){
                    case 0: $result .= "<br>giới tính vừa nhập vào là: Female";break;
                    case 1: $result .= "<br>giới tính vừa nhập vào là: Male";break;
                }
            }
        }

    }

?>
<html>
    <head>
        <title>Bài 1</title>
    </head>
    <body>
    <h3 style="color: red"><?php echo $error;?></h3>
    <form action="" method="post">
        <h1>Tutotials Point Absolute classes resgistration</h1>
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="<?php echo isset($_POST['name'])? $_POST['name'] : ' '?>"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="<?php echo isset($_POST['email'])? $_POST['email'] : ' '?>"></td>
            </tr>
            <tr>
                <td>Specific Time:</td>
                <td><input type="date" name="date" value="<?php echo isset($_POST['date'])? $_POST['date'] : ' '?>"></td>
            </tr>
            <tr>
                <td>Class details:</td>
                <td>
                    <textarea name="class" cols="23" rows="5" value="<?php echo isset($_POST['class'])? $_POST['class'] : ' '?>"></textarea>
                </td>
            </tr>
            <?php
            $check_Female = '';
            $check_Male = '';
                if(isset($_POST['gender'])){
                    switch ($_POST['gender']){
                        case 0: $check_Female = 'checked';break;
                        case 1: $check_Male = 'checked';break;
                    }
                }
            ?>
            <tr>
                <td>Gender:</td>
                <td><input type="radio" name="gender"  value="0" <?php echo $check_Female;?>>Female
                    <input type="radio" name="gender" value="1" <?php echo $check_Male;?>>Male
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="show" value="Show info"></td>
                <td></td>
            </tr>
        </table>
    </form>
    <h3 style="color: green"><?php echo  $result ; ?></h3>
    </body>
</html>
