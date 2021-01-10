<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/9/2021
 * Time: 2:18 PM
 */?>
    <div class="container_create">
        <form action="" method="post">
            <h3 class="form-group">Create Record</h3>
            <label for="">Name<span>*</span></label>
            <input type="text" name="name" value="<?php echo (isset($_POST['name']))?$_POST['name']:'';?>" class="form-group form-control">
            <label for="">Description<span>*</span></label>
            <textarea name="description" id="" cols="30" rows="4" class="form-control form-group"><?php echo (isset($_POST['description']))?$_POST['description']:'';?></textarea>
            <label for="">Salary<span>*</span></label>
            <input type="number" name="salary" value="<?php echo (isset($_POST['salary']))?$_POST['salary'] :'';?>" class="form-control form-group">
            <label for="">Gender<span>*</span></label><br>
            <?php
                $checked_female = "";
                $checked_male = "";
                if(isset($_POST['gender'])){
                    if($_POST['gender'] == 0){
                        $checked_male = "checked";
                    }else{
                        $checked_female = "checked";
                    }
                }
            ?>
            <input type="radio" name="gender" value="0" <?php echo $checked_male?>> Male
            <input type="radio" name="gender" value="1" <?php echo $checked_female?> class="form-group"> Female<br>
            <label for="">Birthday<span>*</span></label>
            <input type="date" name="birthday" value="<?php echo (isset($_POST['birthday']))?$_POST['birthday'] :'';?>" class="form-control form-group">
            <input type="submit" name="submit" value="Save" class="btn btn-success">
            <button class="btn btn-secondary"><a href="index.php?controller=employess&action=index">Cancel</a></button>
        </form>
    </div>
