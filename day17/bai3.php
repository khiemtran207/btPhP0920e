<html>
    <head>
        <title></title>
    </head>
    <body>
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th>Tên Khóa học</th>
            </tr>
            <?php $arrs = ['PHP', 'HTML', 'CSS', 'JS'];
?>
           <?php foreach ($arrs as $value):?>
           <tr>
               <td><?php echo $value?></td>
           </tr>
            <?php endforeach;?>
        </table>
    </body>
</html>