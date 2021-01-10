<?php
session_start();
include_once 'database.php';
$error = '';
if (isset($_POST['create'])) {
    $avatar = $_FILES['avatar'];
    $obj_name = $_POST['name'];
    $obj_price = $_POST['price'];
    if (empty($obj_name)) {
        $error = "không được để trống tên sản phẩm!";
    } else if (empty($obj_price)) {
        $error = "không được để trống giá sản phẩm!";
    } else if ($avatar['error'] == 0) {
        // kiểm tra xem có phải là ảnh hay không
        $check_file = pathinfo($avatar['name'], PATHINFO_EXTENSION);
        $check_file = strtolower($check_file);
        $file_success = ['jpg', 'jpeg', 'png', 'gif'];
        $size_file = $avatar['size'];
        $size_file_mb = $size_file / (1024 * 1024);
        $size_file_mb = round($size_file_mb, 2);
        if (!in_array($check_file, $file_success)) {
            $error = "file tải lên phải là ảnh";
        } else if ($size_file_mb > 1) {
            $error = "ảnh tải lên phải có kích thước nhỏ hơn 1mb!";
        }
        // kiểm tra kích thước file

    }
    if (empty($error)) {
        // lưu amhr vào thư mục
        $container_file = "container";
        if (!file_exists($container_file)) {
            mkdir($container_file);
        }
        $name_avatar = time() . '-' . $avatar['name'];
        move_uploaded_file($avatar['tmp_name'], $container_file . '/' . $name_avatar);
        // lưu thông tin sp mới vào csdl
        $sql_insert = "INSERT INTO products(name, avatar, price) VALUES ('$obj_name', '$name_avatar', '$obj_price')";
        $query = mysqli_query($connection, $sql_insert);
        if (!$query) {
            $error = "thêm mới sản phẩm thất bại";
        } else {
            $_SESSION['success'] = "thêm mới sản phẩm thành công";
            header('location: index.php');
            exit();
        }
    }
}
?>
<html>
<head>
    <style>
        body{
            margin: 0px;
            padding: 0;
        }
        .container {
            height: 650px;
            max-width: 80%;
            margin: 0 auto;
            text-align: center;
            font-family: arial,sans-serif;
            text-transform: capitalize;
            background: url("anh1.png");
            background-size: cover;
            background-position: center;
        }
        .title {
            padding: 40px 0 40px 0;
            color: black;
        }
        .form {
            margin: 0 0 0 20%;
            width: 60%;
        }
        td {
            width: 300px;
            height: 40px;
            line-height: 40px;
            /* text-align: center; */
        }
        input[type='text']{
            border: none;
            width: 100%;
            height: 30px;
            border-bottom: 2px solid #a58f8f;
            background: rgba(0,0,0,0);
        }
        input[type="submit"], input[type="reset"]  {
            width: 120px;
            height: 30px;
            border-radius: 13px;
            background: #23dc86;
            border: none;
            text-transform: capitalize;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="title"><h2>Thêm mới sản phẩm</h2></div>
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <table cellpadding="10" cellspacing="0" border="1px solid black">
                <tr>
                    <td>Product name</td>
                    <td><input type="text" name="name" placeholder="Nhập tên sản phẩm...."
                               value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" id="obj_name"></td>
                </tr>
                <tr>
                    <td>Product avatar</td>
                    <td><input type="file" name="avatar"></td>
                </tr>
                <tr>
                    <td>Product price</td>
                    <td><input type="text" name="price" placeholder="Nhập giá sản phẩm..."
                               value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>" id="obj_price"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="create" value="thêm sản phẩm">
                        <input type="reset" value="Reset" id="reset"/>
                    </td>
                </tr>
            </table>
        </form>
        <h3 style="color: red"><?php echo $error; ?></h3>
        <script>
            window.onload = function () {
                document.getElementById('reset').addEventListener('click', function () {
                    document.getElementById('obj_name').innerHTML = '';
                    document.getElementById('obj_price').innerHTML = '';
                });
                event.preventDefault();
            }
        </script>
    </div>
</div>
</body>
</html>
