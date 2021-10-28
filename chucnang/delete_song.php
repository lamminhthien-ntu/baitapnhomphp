<?php
include("../include/ketnoi.php");
include("../chucnang/kiemtra_level_admin.php");

//Từ level 2 trở lên được phép vào
kiemtra_level_admin(1);
$id=$_GET['id'];
//$sql="DELETE FROM nhanvien WHERE id='$id' ";
$sql="DELETE FROM `thuviennhac` WHERE `thuviennhac`.`id_nhac` = $id";
  mysqli_query($ketnoi,$sql);
$sql="DELETE FROM `nhac` WHERE `nhac`.`id_nhac` = $id";
  mysqli_query($ketnoi,$sql);
//var_dump(mysqli_query($conn,$sql));
header("location: ../admin/index.php");
//session_start()  đã có sẵn session_start từ  file kiemtra_level_admin.php, nên tui ko thêm nữa
$_SESSION['message']='<div class="alert alert-danger" role="alert">
  Bạn đã xoá bài hát thành công
</div>';
?>