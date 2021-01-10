<html>
<head>
    <title>bài 3 day 18</title>
    <style>
        .container {
            max-width: 70%;
            margin: 0 auto;
            background: #ddeedd;
            width: 500px;
            text-align: center;
        }
        table {
            width: 100%;
        }
        td {
            text-align: right;
        }
        td.input {
            text-align: left;
        }
        textarea {
            width: 90%;
            margin: 0 20px;
            border-top: 2px solid blue;
            border-left: 2px solid blue;
            border-bottom: none;
            border-right: none;
        }
        input[type="text"] {
            border-top: 2px solid blue;
            border-left: 2px solid blue;
            border-bottom: none;
            border-right: none;
            width: 90%;
            margin-right: 20px;
        }
        select {
            border-top: 2px solid blue;
            border-left: 2px solid blue;
            border-bottom: none;
            border-right: none;
        }
        input[type="submit"] {
            border-bottom: 2px solid blue;
            border-right: 2px solid blue;
            border-top: none;
            border-left: none;
        }
    </style>
</head>
<body>
<?php
     $error = '';
     $result = '';
     if(isset($_POST['submit'])){
         $obj_user = $_POST['email'];
         $obj_pass = $_POST['pass'];
         $obj_text = $_POST['text'];
         $obj_level = $_POST['level'];

         if(empty($obj_user)){
             $error = 'không được để trống email address';
         }else if(empty($obj_pass)){
             $error = 'không được để trống mật khẩu email';
         }else if(empty($obj_text)){
             $error = 'không được để trống ghi chú';
         }else if(!isset($_POST['taken'])){
             $error = "phải chọn taken";
         }else if(!isset($_POST['concentration'])){
             $error = 'phải chọn concentration';
         }else if(!filter_var($obj_user, FILTER_VALIDATE_EMAIL)){
             $error = "email không đúng định dạng";
         }

         if($error == ''){
             $result = "email bạn vừa nhập là: $obj_user";
             $result .= "<br> mật khẩu bạn vừa nhập là: $obj_pass";
             $result .= "<br> text bạn vừa nhập là: $obj_text";
//             if(isset($obj_level)){
//                 foreach ($obj_level as $item){
                     switch ($obj_level){
                         case 0: $result .= "<br> level bạn vừa nhập là: Freshman";break;
                         case 1: $result .= "<br> level bạn vừa nhập là: Freshman1";break;
                         case 2: $result .= "<br> level bạn vừa nhập là: Freshman2";break;
                     }
//                 }
//             }
             foreach ($_POST['taken'] as $item){
                $result.= "<br> taken vừa chọn là: $item";
             }

             foreach ($_POST['concentration'] as $item){
                 switch ($item){
                     case 0: $result .= "<br> concentration vừa chọn là: Computer Science(CS)";break;
                     case 1: $result .= "<br> concentration vừa chọn là: Infomation Science(IS)";break;
                     case 2: $result .= "<br>    concentration vừa chọn là: Infomation Technology(IT)";break;
                 }
             }
         }
     }
?>
<div class="container">
<form action="#" method="post">
    <table cellspacing="0" cellpadding="10">
        <tr>
            <td>Enter e-mail address</td>
            <td class="input"><input type="text" name="email" value="<?php echo ($_POST['email'])?$_POST['email']:'' ;?>"></td>
        </tr>
        <tr>
            <td>Enter Password</td>
            <td class="input"><input type="text" name="pass" value="<?php echo ($_POST['pass'])?$_POST['pass']:'' ;?>"></td>
        </tr>
        <tr>
            <td>Select academic level</td>
            <td class="input">
                <select name="level[]" id="">
                    <option value="0">Freshman</option>
                    <option value="1">Freshman1</option>
                    <option value="2">Freshman2</option>
                </select>
            </td>
        </tr>
        <tr>
             <td>Identify coures taken:</td>
            <td class="input">
                <input type="checkbox" value="CSCI 1710" name="taken[]">CSCI 1710<br>
                <input type="checkbox" value="CSCI 1800" name="taken[]">CSCI 1800<br>
                <input type="checkbox" value="CSCI 2800" name="taken[]">CSCI 2800<br>
                <input type="checkbox" value="CSCI 2151" name="taken[]">CSCI 2151<br>
                <input type="checkbox" value="CSCI 2910" name="taken[]">CSCI 2910<br>
            </td>
        </tr>
        <tr>
            <td>Select concentration</td>
            <td class="input">
                <input type="radio" value="0" name="concentration[]">Computer Science(CS)<br>
                <input type="radio" value="1" name="concentration[]">Infomation Science(IS)<br>
                <input type="radio" value="2" name="concentration[]">Infomation Technology(IT)<br>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="input">
                <textarea name="text" id="" cols="55" rows="8" placeholder="Enter any comment you have here.."></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="input"><input type="submit" name="submit" value="submit Data">  </td>

        </tr>
    </table>
</form>
    <h3 style="color: red"><?php echo $error ; ?></h3>
    <h3 style="color: green"><?php echo $result ; ?></h3>
</div>
</body>
</html>