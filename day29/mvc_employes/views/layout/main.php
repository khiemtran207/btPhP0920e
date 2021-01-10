<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/9/2021
 * Time: 2:18 PM
 */
?>
<html>
<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css-fontawesome/all.min.css">
    <title><?php echo $this->page_title?></title>
</head>
<body>
<div class="header">
    <h1>Đây là nd thể header</h1>
</div>
<div class="main">
    <?php echo $this->content;?>
    <p style="color: red;text-align: center"><?php echo $this->error ?></p>
</div>
<div class="footer">
    <h1>Đây là nội dung thẻ footer</h1>
</div>

</body>
</html>
