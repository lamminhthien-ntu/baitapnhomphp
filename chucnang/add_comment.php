<?php
session_start();
include("../include/chucnang.php");
    date_default_timezone_set("Asia/Ho_Chi_Minh");    
    $thoigian   = date("d-m, Y  h:i A");  
    $id_user    = $_SESSION['id_user'];
    $noidung_bl = $_POST['noidung_bl'];
    $file_name  = $_POST['name_nhac'];

    $sql        = "SELECT id_nhac FROM nhac WHERE tenfile like '%$file_name%'";
    $ketqua     = mysqli_query($ketnoi,$sql);
    $row        = mysqli_fetch_assoc($ketqua);
    $id_nhac    = $row['id_nhac'];


    $col    = ['noidung_bl','id_user','id_nhac','thoigian'];
    $value  = [$noidung_bl,$id_user,$id_nhac,$thoigian];
    insert_table('binhluan',$col,$value);
?>  