<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/5/2021
 * Time: 12:42 PM
 */
?>
<html>
<head>
    <title>thêm mới nhân sự</title>
    <link rel="stylesheet" href="assets/css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css-fotnawesome/all.min.css">
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        .main_container {
            max-width: 50%;
            margin: 0 auto;
            margin-top: 0px;
        }
        .title {
            text-align: center;
        }
        i{
            margin-right: 5px;
            font-size: 20px;
        }
        .start:after {
            content:" * ";color:red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="main_container">
        <div class="title"><h2>Create Record</h2></div>
        <hr>
        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <i class="fas fa-user"></i><label class="start">Name:</label>
                <input type="text" name="name" class="form-group form-control" value="<?php echo isset($_POST['name'])?$_POST['name']:'' ?>">
                <i class="fas fa-audio-description"></i><label class="start">Description:</label>
                <textarea name="description" id="" cols="5" rows="3" class="form-control form-group"><?php echo isset($_POST['description'])?$_POST['description']:'' ?></textarea>
                <i class="fas fa-donate"></i><label class="start">Salary:</label>
                <input type="number" name="salary" class="form-group form-control"  value="<?php echo isset($_POST['salary'])?$_POST['salary']:'' ?>">
                <i class="fas fa-venus-mars"></i><label class="start">Gender:</label><br>
                <?php
                $checkbox_male = "";
                $checkbox_female = "";
                if(isset($_POST['gender'])){
                    if($_POST['gender'] == 0){
                        $checkbox_male = "checked";
                    }else{
                        $checkbox_female = "checked";
                    }
                }
                ?>
                <input type="radio" name="gender" <?php echo $checkbox_male ?>  value="0"> Male
                <input type="radio" name="gender" <?php echo $checkbox_female ?>  value="1" class="form-group"> Female<br>
                <i class="fas fa-birthday-cake"></i><label class="start">Birthday</label>
                <input type="date" class="form-control form-group" name="birthday" value="<?php echo isset($_POST['birthday'])?$_POST['birthday']:''?>"><br>
                <input type="submit" name="submit" value="save" class="btn btn-primary">
                <button class="btn btn-secondary" id="cancel" name="cancel"><a href=index.php>Cancel</a></button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
