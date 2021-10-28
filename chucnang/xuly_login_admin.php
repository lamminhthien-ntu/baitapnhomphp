<?php
include("../include/ketnoi.php");
//include("../include/chucnang.php");
session_start();
if (isset($_POST['but_submit'])) {

    //Để tránh sql injecttion, ta loại bỏ các kí tự thoát ( dấu , hoặc dấu ") thông qua mysqli_real_escape_string
    $username = mysqli_real_escape_string($ketnoi, $_POST['username']);
    $password = mysqli_real_escape_string($ketnoi, $_POST['password']);
    //SQL tạo table user_admin
//CREATE TABLE `mp3`.`user_admin` ( `id` INT NOT NULL AUTO_INCREMENT , `username` TEXT NOT NULL , `password` TEXT NOT NULL , `level` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
    if ($username != "" && $password != "") {

        $sql_query = "select *  from user_admin where username='" . $username . "' and password='" . $password . "'";
        $result = mysqli_query($ketnoi, $sql_query);
        $row = mysqli_fetch_array($result);

        //Đếm số dòng kết quả của sqlquerry
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            //Lấy ra cấp độ tài khoản, phục vụ mục đích phân quyền

// level 1, chỉ xem index table song, table singer
//level 3, full chức năng + xem và thêm user
//level 2, chỉ cho phép xem và thêm song, thêm singer, ko đụng đến table user

            $_SESSION['username']=$row['username'];
            $_SESSION['level']=$row['level'];
            $_SESSION['id'] = $row['id'];

//            echo "<br>Test Có $count kết quả<br>";
//            echo "<br> Test hiển thị level admin".$row['level']."<br>";
//            $_SESSION['username'] = $username;
//            echo "<br> Test hiển thị username ".$_SESSION['username']."<br>";
            header('Location: ../admin/index.php');
//            $_SESSION['last_login_timestamp'] = time();

//            //Nếu đăng nhập thành công thì flag_table_song = 1;
//            echo $username;
        } else {
            $alert =  '<div class="alert alert-danger" role="alert">
  Mật khẩu và tài khoản không hợp lệ
</div>';
            setcookie('login_error',$alert);
            echo "<a href='../admin/login_form.php'>Đăng nhập lại </a>";
        }
    }
}
?>