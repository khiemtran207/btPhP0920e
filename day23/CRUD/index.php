<?php
session_start();
require_once 'database.php';
$sql_select_all = "SELECT * FROM products ORDER BY id DESC ";
$result_all = mysqli_query($connection, $sql_select_all);
$product = mysqli_fetch_all($result_all, MYSQLI_ASSOC);

?>
<html>
<head>
<style>
    body{
        margin: 0px;
        padding: 0;
        background: url("anh1.png");
        background-size: cover;
        background-position: top;
    }
    .container{
        height: 650px;
        max-width: 80%;
        margin: 0 auto;
        text-align: center;
        font-family: arial,sans-serif;
        text-transform: capitalize;
    }
    .row {
        display: flex;
    }
    .link {
        height: 80px;
        width: 15%;
        line-height: 80px;
        margin: 40px 0 40px 5%;
    }
    a{
         text-decoration: none;
         color: black;
         font-size: 14px;
        padding: 10px;
        border-radius: 17px;
        background: #67e0ae;
     }
    p {
        margin: 0;
        padding: 0;
        font-family: arial,sans-serif;
    }
    .content {
        /* width: 100%; */
        margin: 0 auto;
        max-width: 90%;
    }
    td {
        padding: 0;
        margin: 0;
        text-align: center;
    }
    th {
        /* width: 0%; */
        height: 50px;
        line-height: 50px;
    }
    .title {
        padding: 40px 0 40px 20%;
    }
    img {
        border-radius:50%;
        -moz-border-radius:50%;
        -webkit-border-radius:50%;
    }
</style>
</head>
<body>
<div class="container">
    <div class="row top">
        <div class="link">
           <a class="create" href="create.php">Thêm sản phẩm mới</a>
        </div>
        <div class="title">
    <h2>Danh mục các sản phẩm</h2>
        </div>
    </div>
    <div class="content">
    <table width="100%" cellspacing="0px" cellpadding="0px" border="1px solid black">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>avatar</th>
        <th>price</th>
        <th>date update</th>
        <th>sửa/xóa sản phẩm</th>
    </tr>
    <?php foreach ($product as $item) :?>
    <tr>
            <td><?php echo $item['id'] ;?></td>
            <td><?php echo $item['name'] ;?></td>
            <td>
                <img src="container/<?php echo $item['avatar'] ;?>" height="150px" width="150px" alt="">
            </td>
            <td><?php echo $item['price'] ;?></td>
            <td>
                <?php echo date('d/m/y H:i:s', strtotime($item['created_at']));?>
            </td>
            <td>
                <p style="margin-bottom: 30px"><a href="update.php?id=<?php echo $item['id']; ?>">
                        <i class="fas fa-eye">
                </a></p>
               <p><a href="delete.php?id=<?php echo $item['id']; ?>"
                   onclick="return confirm('Có muốn xóa ko?')">
                    Delete
                </a></p>
            </td>
    </tr>
    <?php endforeach; ?>
</table>
        <br>
        <p style="color: red">
            <?php
            if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
        </p>
    </div>
</div>
</body>
</html>
