<?php
include("../include/chucnang.php");
include("../chucnang/kiemtra_level_admin.php");
//Từ level 2 trở lên được phép vào
kiemtra_level_admin(2);
date_default_timezone_set("Asia/Ho_Chi_Minh");
$thoigian = date("d/m/Y");


if (isset($_GET['id']) && !empty($_GET['username'])) {

    $id = $_GET['id'];
    $username = $_GET['username'];
    $sql = "SELECT * FROM user_admin";
    $ketqua = mysqli_query($ketnoi, $sql);
    if (mysqli_num_rows($ketqua) > 0) {
        while ($row = mysqli_fetch_assoc($ketqua)) {
            if ($row['username'] == $username && $row['id'] != $id) {
                echo "<script>alert('Username này đã tồn tại');window.location = 'http://localhost/baitapnhomphp/admin/index_user.php'</script>";
                die();
            }
        }
    }
    $level = $_GET['level'];

    if (isset($_GET['level'])) {
        $sql = "UPDATE `user_admin` SET `username` = '$username', `level` = '$level' WHERE `user_admin`.`id` = $id";
//        var_dump($sql);
        mysqli_query($ketnoi, $sql);
//        echo  var_dump($sql);
        if ($id == $_SESSION['id'])
            $_SESSION['username'] = $username;
        header('Location: ../admin/index_user.php');
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">
           Bạn đã sửa user thành công
</div>';
    } else {
//        $sql = "UPDATE `nhanvien` SET `HOTEN` = '$HOTEN', `NGAYSINH` ='$NGAYSINH', `GIOITINH` = '$GIOITINH', `DIACHI` = '$DIACHI', `ANH` = '$ANH', `MALOAINV` = '$MALOAINV', `MAPHONG` = '$MAPHONG' WHERE `nhanvien`.`MANV` = '$id';";
        $sql = "UPDATE `user_admin` SET `username` = '$username', `level` = '$level' WHERE `user_admin`.`id` = $id";
//        var_dump($sql);
        mysqli_query($ketnoi, $sql);
//        echo  var_dump($sql);
        header('Location: ../admin/index_user.php');
        $_SESSION['message'] = '
            <div class="alert alert-success" role="alert">
              Bạn đã sửa user thành công
            </div>';
    }
} else {
    if (empty($username))
    $_SESSION['message'] = '
            <div class="alert alert-danger" role="alert">
              Username không được trống
            </div>';
    else
        $_SESSION['message'] = '
            <div class="alert alert-danger" role="alert">
              Update username thất bại
            </div>';
    header('Location: ../admin/index_user.php');
}

?>