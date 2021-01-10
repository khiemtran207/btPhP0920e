<?php
    require ("xuly.php");
?>
<html>
<head>
    <title>Bài 5 ngày 18</title>
    <link rel="stylesheet" type="text/css" href="../css-fotnawesome/all.min.css">
    <meta charset="utf-8">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 50%;
            margin: 0 auto;
           padding-top: 30px;
            width: 50%;
            background-image: url("../image/image-human-brain_99433-298.jpg");
            background-size: auto;
            background-position: center ;
            font-family: Arial, san-serif;
        }
        p {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0 20px 15%;
            border-bottom: 1px solid #fff;
            width: 70%;
        }
        input[type="text"], input[type='password'] {
            width: 95%;
            height: 30px;
            border: none;
            background-color: rgba(0,0,0,0);
            margin-left: 10px;
            color: #fff;
            autocomplete : false;
        }
        label {
            margin-left: 15%;
            color: #c7b4b4;
            font-size: 15px;
        }
        input[type="checkbox"] {
            /* border: none; */
            margin: 0 10px 20px 15%;
        }
        .remember {
            margin: 0;
            font-size: 16px;
        }
        input[type="submit"] {
            margin: 20px 0 40px 15%;
            border: none;
            background: #65c370;
            width: 75px;
            height: 30px;
            color: #fff;
            border-radius: 5px;
            text-transform: uppercase;
            font-size: 11px;
        }
        i {
            width: 5%;
            color: #fff;
            font-size: 14px;
        }
        h5{
            font-weight: normal;
            /*padding: 0 0 20px 15%;*/
            margin: 0 0  20px 15%;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label>User Name:</label><br>
            <p><i class="fas fa-user"></i><input type="text" name="username" value="<?php echo (isset($_POST['username']))?$_POST['username']:'' ?>"></p><br>
            <label>Password</label><br>
           <p><i class="fas fa-lock"></i><input type="password" name="password"  value="<?php echo (isset($_POST['password']))?$_POST['password']:'' ?>"></p><br>
            <?php
            $checkbox = '';
                if (isset($_POST['remember'])){
                    $checkbox = 'checked';
                }
            ?>
            <input type="checkbox" name="remember" <?php echo $checkbox ;?>><label class="remember">Remember Me</label><br>
            <input type="submit" name="login" value="Login">
        </form>
        <h5 style="color: #e3e4e3"><?php echo $error;?></h5>
        <h5 style="color: #e3e4e3"><?php echo $result;?></h5>
    </div>
</body>
</html>
