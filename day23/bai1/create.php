    <?php
        session_start();
        require_once 'database.php';
        $error = '';
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
        if(isset($_POST['submit'])){
            $obj_name = $_POST['name'];
            $obj_description = $_POST['description'];
            $obj_salary = $_POST['salary'];
            if(isset($_POST['birthday'])){
                $obj_birthday = $_POST['birthday'];
            }else{
                $obj_birthday = "";
            }
          // validate
            if(empty($obj_name)){
                $error = "Name không được để trống!";
            }
            if(empty($error)){
                if(isset($_POST['gender'])){
                    if($_POST['gender'] == 0){
                        $obj_gender = "male";
                    }else if($_POST['gender'] == 1){
                        $obj_gender = "female";
                    }else{
                        $obj_gender = "";
                    }
                }
                // lưu vào csdl
                // viết câu truy vấn
                    $sql_insert = "INSERT INTO staff(name, description, salary, gender, birthday) VALUES (
            '$obj_name', '$obj_description','$obj_salary','$obj_gender','$obj_birthday'
    )";
                // thực hiện truy vấn
                $is_insert = mysqli_query($connection, $sql_insert);
                if($is_insert){
                    $_SESSION['success'] = "thêm mới nhân viên thành công!";
                    header('location: index.php');
                    exit();
                }else{
                    $error = "thêm mới nhân viên thất bại!";
                }
            }

    }
    ?>
    <html>
        <head>
            <title>thêm mới nhân sự</title>
            <link rel="stylesheet" href="../../ngay27/bai1/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="../../ngay27/bai1/css-fotnawesome/all.min.css">
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
            <script>
                window.onload = function () {
                   document.getElementById('cancel').addEventListener('click', function(){
                       window.location="http://localhost:82/PHP0920E_SKDA/btPHP0920e/bai23/bai1/index.php";
                   });
                }
            </script>
        </head>
        <body>
            <div class="container">
                <div class="main_container">
                    <div class="title"><h2>Create Record</h2></div>
                    <hr>
                    <div class="form">
                        <form action="" method="post" enctype="multipart/form-data">
                            <i class="fas fa-user"></i><label class="start">Name:</label>
                            <input type="text" name="name" class="form-group form-control">
                            <i class="fas fa-audio-description"></i><label class="start">Description:</label>
                            <textarea name="description" id="" cols="5" rows="3" class="form-control form-group"></textarea>
                            <i class="fas fa-donate"></i><label class="start">Salary:</label>
                            <input type="number" name="salary" class="form-group form-control">
                            <i class="fas fa-venus-mars"></i><label class="start">Gender:</label><br>
                            <input type="radio" name="gender"  value="0"> Male
                            <input type="radio" name="gender"  value="1" class="form-group"> Female<br>
                            <i class="fas fa-birthday-cake"></i><label class="start">Birthday</label>
                            <input type="date" class="form-control form-group" name="birthday"><br>
                            <input type="submit" name="submit" value="save" class="btn btn-primary">
                           <button class="btn btn-secondary" id="cancel" name="cancel">Cancel</button>
                        </form>
                    </div>
                    <p style="color: red"><?php echo $error; ?></p>
                </div>
            </div>
        </body>
    </html>