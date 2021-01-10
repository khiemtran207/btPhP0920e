<html>
    <head>
        <title>bài 5</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <style>
            p .color{
                color: green;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
                $_name = "Nhập họ tên của bạn";
            $_email = "Nhập email của bạn";
            $_phone = "Nhập số điện thoại của bạn";
            $_messenger = "Nhập messenger";
            ?>
            <form action="#" method="post">
            <div class="row">
                <div class="col-4">
                    <label class="text-muted">Name*</label>
                    <input type="text" name="name" class="form-control form-group" placeholder= "<?php echo $_name ?>"/>
                </div>
                <div class="col-4">
                    <label class="text-muted">Email*</label>
                    <input type="text" name="email" class="form-control form-group"  placeholder= "<?php echo $_email ?>"/>
                </div>
                <div class="col-4">
                    <label class="text-muted">Phone*</label>
                    <input type="text" name="phone" class="form-control form-group" placeholder= "<?php echo $_phone ?>"/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <textarea name="detail" class="form-control form-group" placeholder= "<?php echo $_messenger ?>" >

                    </textarea>

                </div>
            </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" name="click" class="btn btn-success" value="gửi thông tin">
                        <p class="text-muted">*these fields are required.</p>
                    </div>
                </div>
            </form>
            <?php
            if(isset($_POST['click'])){
                $obj_name = $_POST['name'];
                $obj_email = $_POST['email'];
                $obj_phone = $_POST['phone'];
                $obj_abc = $_POST['detail'];

                echo "<p class='text-muted color'>$obj_name</p>";
                echo "<p class='text-muted color' >$obj_email</p>";
                echo "<p class='text-muted color'>$obj_phone</p>";
                echo "<p class='text-muted color'>$obj_abc</p>";
            }
            ?>
        </div>
    </body>
</html>