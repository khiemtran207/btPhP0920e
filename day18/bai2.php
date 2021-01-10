<?php
    $error = '';
    $result = '';

    if(isset($_POST['submit'])){
        $obj_name = $_POST['user'];
        $obj_pass = $_POST['pass'];
//    $obj_type = $_POST['type'];
        $obj_display = $_POST['display'];
        $obj_address = $_POST['add'];
        $obj_email = $_POST['email'];

        if(empty($obj_name)){
            $error = "Không được để trống user";
        }else if(empty($obj_pass)){
            $error = "Không được để trống password";
        }else if(empty($obj_display)){
            $error = "Không được để trống display";
        }else if(empty($obj_address)){
            $error = "Không được để trống address";
        }else if(empty($obj_email)){
            $error = "Không được để trống email";
        }else if(!strlen($obj_display) > 24){
            $error = "display không được vượt quá 24 kí tự";
        }else if(!isset($_POST['gender'])){
            $error = "không được để trống gender";
        }else if(!isset($_POST['checkbox'])){
            $error = "không được để trống checkbox";
        }else if(!filter_var($obj_email, FILTER_VALIDATE_EMAIL)){
            $error = "email không đúng định dạng";
        }
        if($error == ''){
            $result = "user vừa nhập vào là ".$obj_name;
            $result .= "<br>password vừa nhập vào là ".$obj_pass;
            if(isset($_POST['type'])){
                foreach ($_POST['type'] as $item){
                    switch ($item){
                        case 0: $result .= "<br>type vừa nhập vào là  type1";break;
                        case 1: $result .= "<br>type vừa nhập vào là  type2";break;
                        case 2: $result .= "<br>type vừa nhập vào là  type3";break;
                    }
                }
            }
            $result .= "<br>display vừa nhập vào là ".$obj_display;
            $result .= "<br>address vừa nhập vào là ".$obj_address;
            $result .= "<br>email vừa nhập vào là ".$obj_email;
            if (isset($_POST['gender'])){
                switch ($_POST['gender']){
                    case 0: $result .= "<br>giới tính vừa nhập vào là Male ";break;
                    case 1: $result .= "<br>giới tính vừa nhập vào là Famale ";break;
                }
            }
        }
    }
?>
<html>
    <head>
        <title>bài 2</title>
        <style>
           form{
               margin-left: 30%;
           }
            table{
                width: 500px;

            }
        </style>
    </head>
    <body>
    <form action="" method="post">
        <table border="1px solid gray"  cellspacing="0">
            <tr>
                <td colspan="2"><h3>Registration Form</h3></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="user" value="<?php echo ($_POST['user'])? $_POST['user'] : '' ?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="pass" value="<?php echo ($_POST['pass'])? $_POST['pass'] : '' ?>"></td>
            </tr>
            <?php
            $value0 = '';
            $value1 = '';
            $value2 = '';
                if(isset($_POST['type'])){
                    foreach ($_POST['type'] as $item){
                        switch ($item){
                            case 0: $value0 = "selected";break;
                            case 1: $value1 = "selected";break;
                            case 2: $value2 = "selected";break;
                        }
                    }
                }
            ?>
            <tr>
                <td>User Type:</td>
                <td>
                    <select name="type[]" id="">
                        <option value="0" <?php echo  $value0; ?> >type 1</option>
                        <option value="1" <?php echo  $value1; ?>>type 2</option>
                        <option value="2" <?php echo  $value2 ?>>type 3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Display Name:</td>
                <td><input type="text" name="display" value="<?php echo ($_POST['display'])? $_POST['display']: '' ?>"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>
                    <textarea name="add" cols="22" rows="5" ></textarea>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="<?php echo ($_POST['email'])? $_POST['email']: '' ?>"></td>
            </tr>
            <?php
            $checkedMale = '';
            $checkedFemale = '';
                if(isset($_POST['gender'])){
                    switch ($_POST['gender']){
                        case 0: $checkedMale = 'checked';break;
                        case 1: $checkedFemale = 'checked';break;
                    }
                }
            ?>
            <tr>
                <td>Gender:</td>
                <td><input type="radio" name="gender" value="0" <?php echo  $checkedMale?>>Male
                    <input type="radio" name="gender" value="1" <?php echo $checkedFemale?>>Female
                </td>
            </tr>
            <?php
            $checkbox = '';
                if(isset($_POST['checkbox'])){
                    $checkbox = 'checked';
                }
            ?>
            <tr>
                <td></td>
                <td>
                    <input type="checkbox" name="checkbox" value="0" <?php echo $checkbox ?> >I accept Tém and Conditions
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="submit">
                    <input type="reset" name="reset" value="reset">
                </td>
            </tr>
        </table>
    </form>
    <h3 style="color: red"><?php echo $error; ?></h3>
    <h3 style="color: green"><?php echo $result; ?></h3>
    </body>
</html>
