<?php
    $error = '';
    $result = '';
    $style = '';
    if(isset($_POST['tong']) || isset($_POST['hieu']) || isset($_POST['tich']) || isset($_POST['thuong'])){
        $obj_numberA = $_POST['numbera'];
        $obj_numberB = $_POST['numberb'];
        if(empty($obj_numberA)){
            $error = "không được để trống số a";
        }else if(empty($obj_numberB)){
            $error = "không được để trống số b";
        }else if(!is_numeric($obj_numberA)){
            $error = "số a nhập vào cần phải là số";
        }else if(!is_numeric($obj_numberB)){
            $error = "số b nhập vào cần phải là số";
        }
        if(empty($error)){
            $style = 'class="color"';
            if(isset($_POST['tong'])){
                $tong = $obj_numberA + $obj_numberB;
                $result = "a + b = $tong";
            }else if(isset($_POST['hieu'])){
                $hieu = $obj_numberA - $obj_numberB;
                $result = "a - b = $hieu";
            }else if(isset($_POST['tich'])){
                $tich = $obj_numberA * $obj_numberB;
                $result = "a * b = $tich";
            }else if(isset($_POST['thuong'])){
                $thuong = $obj_numberA / $obj_numberB;
                $result = "a / b = $thuong";
            }
        }
    }
?>
<html>
<head>
    <title>bài 5 ngày 18</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        .color{
            border-color: red ;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="oab">
            <div><h1>Thực Hành Toán Tử</h1></div>
            <div>
            <form action="" method="post">
                <label class="text-muted">Nhập số a</label>
                <input type="text" class="form-control form-group <?php echo $style ;?> " name="numbera" value="<?php
                    echo ($_POST['numbera'])?$_POST['numbera']:'';
                ?>">
                <label class="text-muted">Nhập số b</label>
                <input type="text" class="form-group form-control" name="numberb"  value="<?php
                echo ($_POST['numberb'])?$_POST['numberb']:''; $style ;
                ?>">
                <input type="submit" name="tong" class="btn btn-success" value="a + b">
                <input type="submit" name="hieu" class="btn btn-info" value="a - b">
                <input type="submit" name="tich" class="btn btn-danger" value="a * c">
                <input type="submit" name="thuong" class="btn btn-warning" value="a / c">
            </form>
            </div>
            <div>
                <p style="color: red"><?php  echo $error ;?></p>
                <p style="color: green"><?php  echo $result ;?></p>
            </div>
        </div>
    </div>
</body>
</html>