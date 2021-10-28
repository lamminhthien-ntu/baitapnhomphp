<?php
    session_start();
    include("../include/chucnang.php");


    if(isset($_POST['hoten'])&&isset($_POST['sdt'])&&isset($_POST['ngaysinh'])&&isset($_POST['gioitinh']))
    {
        if($_POST['hoten']==""||$_POST['sdt']==""||$_POST['ngaysinh']==""||$_POST['gioitinh']=="")
        {
            header("location:http://localhost/baitapnhomphp/page/trangcanhan.php");
        }
        else
        {
            $id_user    = $_SESSION['id_user'];
            $hoten      = $_POST['hoten'];
            $sdt        = $_POST['sdt'];
            $ngaysinh   = $_POST['ngaysinh'];
            $gioitinh   = $_POST['gioitinh'];
            $matkhau    = $_POST['matkhau'];

            update_table('user','hoten_user',$hoten,'id_user',$id_user);
            update_table('user','sdt_user',$sdt,'id_user',$id_user);
            update_table('user','ngaysinh_user',$ngaysinh,'id_user',$id_user);
            update_table('user','gioitinh_user',$gioitinh,'id_user',$id_user);
            update_table('user','pass_user',$matkhau,'id_user',$id_user);

            if($_FILES['upload_anh']['name']!="")
            {
                echo "lõi";
                $thumuc = "../anh_user/";
                $file_name = $_FILES["upload_anh"]["name"]; //Tên của file từ máy tính lên web
                $file_path = $thumuc.$file_name;
                $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
                $name_form = "upload_anh"; //name trong form
                $name_file_anh="$id_user.$file_type"; //tên sau khi đổi và up lên database
            
                $name_file1="$id_user"; //name file không đuôi để up lên server
                upload_image_file($thumuc,$name_form,$name_file1);
                update_table('user','anh_user',$name_file_anh,'id_user',$id_user);
            }

            header("location:http://localhost/baitapnhomphp/page/trangcanhan.php");
        }
    }
?>