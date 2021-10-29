<?php
include("../include/chucnang.php");
include ("../chucnang/kiemtra_level_admin.php");
kiemtra_level_admin(2);
date_default_timezone_set("Asia/Ho_Chi_Minh");
$thoigian = date("d/m/Y");


//Ở đây không khắt khe như add user admin, mình làm đơn giản là check không được bỏ trống.
if ($_POST['title']=="") setcookie("title","Tên bài hát không được để trống",time()+1,"/");
if ($_POST['singer']=="") setcookie("singer","Tên ca sĩ không được để trống",time()+1,"/");

if(!empty($_POST['title'])&&!empty($_POST['loi'])&&!empty($_POST['singer'])&&isset($_POST['btn-submit']))
{
    $tieude = $_POST['title'];
    $loi    = $_POST['loi'];
    $singer = $_POST['singer'];
    if($loi =="")
        $loi = "Chưa có lời bài hát";
    $thumuc     = "../music/";
    $file_name  = $_FILES["upload_nhac"]["name"]; //Tên của file từ máy tính lên web
    $file_path  = $thumuc.$file_name;
    $file_type  = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    $name_form  = "upload_nhac"; //name trong form
    $name_file_music="$singer-$tieude.$file_type"; //tên sau khi đổi và up lên database
    $name_file1="$singer-$tieude"; //name file không đuôi để up lên server
    upload_music_file($thumuc,$name_form,$name_file1);

    if($_FILES['upload_anh']['name']!="")
    {
        $thumuc = "../music/anh/";
        $file_name = $_FILES["upload_anh"]["name"]; //Tên của file từ máy tính lên web
        $file_path = $thumuc.$file_name;
        $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        $name_form = "upload_anh"; //name trong form
        $name_file_anh="$singer-$tieude.$file_type"; //tên sau khi đổi và up lên database
        $name_file1="$singer-$tieude"; //name file không đuôi để up lên server
        upload_image_file($thumuc,$name_form,$name_file1);
        $table      = "nhac";
        $col_name   = ['tieude','casi','loi','tenfile','ngay_upload','anh_nhac'];
        $col_value  = ["$tieude","$singer","$loi","$name_file_music","$thoigian","$name_file_anh"];
        insert_table($table,$col_name,$col_value);
        header('Location: ../admin/index.php');
        $_SESSION['message']='<div class="alert alert-success" role="alert">
  Bạn đã thêm bài hát thành công
</div>';
    }
    else
    {
        $table      = "nhac";
        $col_name   = ['tieude','casi','loi','tenfile','ngay_upload'];
        $col_value  = ["$tieude","$singer","$loi","$name_file_music","$thoigian"];
        //insert_table($table,$col_name,$col_value);
//        echo "Test dòng if lúc ko up ảnh nhưng có up nhạc";
        header('Location: ../admin/index.php');
        $_SESSION['message']='
            <div class="alert alert-success" role="alert">
              Bạn đã thêm bài hát thành công
            </div>';
    }
}
else
{
    $_SESSION['message']='
            <div class="alert alert-danger" role="alert">
              Thêm bài hát thất bại
            </div>';
//    var_dump($_COOKIE);
    header('Location: ../admin/add_song_form.php');
}

?>