<?php
//Level truyền vào của mỗi trang là level tối thiểu để trang web đó có thể vào được
function kiemtra_level_admin($level)
{
    //Đã mở tính năng session
    session_start();
//SQL tạo table user_admin
//CREATE TABLE `mp3`.`user_admin` ( `id` INT NOT NULL AUTO_INCREMENT , `username` TEXT NOT NULL , `password` TEXT NOT NULL , `level` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
//Kiểm tra tính hợp lệ khi đăng nhập và tính hợp lệ của level tài khoản
    if (isset($_SESSION['level'])){
        if ($_SESSION['level']>=$level)
        {
            $username = $_SESSION['username'];
            $level = $_SESSION['level'];
        }
        else {
            //Khi level quá thấp thì về trang login
            header('Location: login_form.php');
        }
    }
    else {
        //Khi sai tài khoản thì hiển nhiên về trang login
        header('Location: login_form.php');
    }
}
?>