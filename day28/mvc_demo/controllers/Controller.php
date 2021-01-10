<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/5/2021
 * Time: 12:39 PM
 */
class Controller{
    //thuộc tính chứa nội dung view
    public $content;
    //thuộc tính chứa lỗi
    public $error;
    //thuộc tính chứa tiêu đề trang(tiêu đề trang là nd động)
    public $page_title;
    //lấy nd view, theo cơ chế truyền biến vào view một cách tường minh
    //file_path là đường dẫn tới file view
    //mảng variables là mảng truyền ra file view
    public function render($file_path,$variables = []){
        //giải nén mảng các biến để dùng trong file view
        extract($variables);
        //dùng cơ chế bộ nhớ đệm để lưu file view
        // mở bộ nhớ đệm để đánh dấu lưu nd file
        ob_start();
        //Nhúng file cần lấy nd:
        require "$file_path";
        //kết thúc ghi nd file và trả về chuỗi chứa nd file
        $view = ob_get_clean();
        return $view;
    }
}
?>