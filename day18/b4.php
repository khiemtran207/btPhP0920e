<?php
$error = '';
$result = '';

if (isset($_POST['submit'])){
    $obj_fistname = $_POST['fistname'];
    $obj_lastname = $_POST['lastname'];
    if(empty($obj_fistname)){
        $error = "không được để trống fistname";
    }else if (empty($obj_lastname)){
        $error = "không được để trống lastname";
    }else if(!isset($_POST['gender'])){
       $error = 'phải chọn gender';
    }

    if (empty($error)){
        $result = "Đăng nhập thành công<br>";
        $result .= "Thông tin của bạn:<br>";
        $result .= "Tên của bạn là: $obj_fistname $obj_lastname <br>";
        if(isset($_POST['gender'])){}
        $obj_gender = $_POST['gender'];
        switch ($obj_gender){
            case 0: $result .= "Giới tính bạn chọn là: Nam <br>";break;
            case 1: $result .= "Giới tính bạn chọn là: Nữ <br>";
        }
        if(isset($_POST['state'])){
            $obj_state = $_POST['state'];
            //$result .= "state bạn vừa chọn là: $obj_state";
            foreach ($_POST['state'] as $item){
                switch ($item){
                    case 0: $result .= "state bạn vừa chọn là: Johor";break;
                    case 1: $result .= "state bạn vừa chọn là: Johor1";break;
                    case 2: $result .= "state bạn vừa chọn là: Johor2";
                }
            }
        }
    }
}
?>
<html>
<head>
    <title>bài 4 ngày 18</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <style>
        .col-md-8, .col-md-4{
            border: 1px solid gray;
            border-radius: 10px;
            margin-top: 20px;
        }
        .title{
            color: blue;
            border-bottom: 1px solid gray;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="title">
                <h2>Registration FORM</h2>
            </div>
            <div class="form">
                <form action="" method="post">
                    <label class="text-muted">Fistname</label>
                    <input type="text" class="form-control form-group" name="fistname"
                           value="<?php echo ($_POST['fistname'])?$_POST['fistname']:''; ?>">
                    <label class="text-muted">Lastname</label>
                    <input type="text" class="form-control form-group" name="lastname"
                           value="<?php echo ($_POST['lastname'])?$_POST['lastname']:''; ?>">
                    <?php
                        $_male = '';
                        $_female = '';
                        if (isset($_POST['gender'])){
                            switch ($_POST['gender']){
                                case 0: $_male = "checked";break;
                                case 1: $_female = "checked";
                            }
                        }
                    ?>
                    <span class="text-muted">Gender</span> <input type="radio" name="gender" value="0"
                    <?php echo $_male;?>>Nam
                    <input type="radio" name="gender" value="1" class="form-group" <?php echo $_female;?>>Nữ<br>
                    <label class="text-muted form-group">State</label>
                    <?php
                        $johor = '';
                        $johor1 = '';
                        $johor2 = '';
                        if(isset($_POST['state'])){
                            foreach ($_POST['state'] as $item) {
                                switch ($item){
                                    case 0: $johor = 'selected';break;
                                    case 1: $johor1 = 'selected';break;
                                    case 2: $johor2 = 'selected';
                                }
                            }
                        }
                    ?>
                    <select name="state[]" id="" class="form-control form-group">
                        <option value="0" <?php echo $johor ;?>>Johor</option>
                        <option value="1" <?php echo $johor1 ;?>>Johor1</option>
                        <option value="2" <?php echo $johor2 ;?>>Johor2</option>
                    </select>
                    <input type="submit" name="submit" class="btn btn-success" value="Save Record">
                    <input type="reset" class="btn btn-secondary" value="Reset">
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="title">
                <h2>Exercies List</h2>

            </div>
        </div>
    </div>
    <p style="color: red    "><?php echo $error ;?></p>
    <p style="color: green"><?php echo $result ;?></p>
</div>

</body>
</html>
