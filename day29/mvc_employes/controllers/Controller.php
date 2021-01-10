<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/9/2021
 * Time: 2:16 PM
 */
class Controller{
    // dữ liệu động
    public $content;
    // lỗi:
    public $error;
    // tiêu đề trang
    public $page_title;
    // hàm xử lý
    // file_path: đường dẫn tới file view
    // variables: dữ liệu lấy ra từ Model
    public function render($file_path, $variables = []){
        // giải nén mảng variables
        extract($variables);
        //mở bộ nhớ đệm để đánh dấu file
        ob_start();
        require_once "$file_path";
        $views = ob_get_clean();
        return $views;
    }
}
?>