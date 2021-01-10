<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 1/4/2021
 * Time: 7:51 PM
 * views/layouts/main.php
 * File layout/bố cục chính của trang
 */

?>
<!DOCTYPE html>
<html>
<head>
    <!--        file layout luôn đc gọi trong phương thức của controller-->
    <!-- Do tiêu đề trang là nd động, nên khai báo trong controller cha -->
    <title><?php echo $this->page_title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/main.php"></script>
    <!--        Khai báo SEO bằng các thẻ meta, sd cơ chế động cho các nội dung SEO này-->
</head>
<body>
<div class="header">
    <h1>Đây là header</h1>
</div>
<div class="main">
    <!--        do file layout là file đc gọi ở bất cứ 1 chức năng/phương thức nào, nên hiển thị các thôn báo lỗi/ thành công
           tại file này
    -->
    <h3 style="color: red"><?php echo $this->error ?></h3>
    <?php echo $this->content;?>
</div>
<div class="footer">
    <h1>Đây là footer</h1>
</div>
</body>
</html>
