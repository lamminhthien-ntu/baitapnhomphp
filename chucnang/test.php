<?php
       // include("getID3-master/getid3/getid3.php");
       // $filename = '../music/money.mp3';
       // $getID3 = new getID3;
       // $file = $getID3->analyze($filename);
       // $playtime_seconds = $file['playtime_seconds'];
       // echo gmdate("i:s", $playtime_seconds);
?>
<?php
       include("../include/chucnang.php");

       // $table = "nhac";
       // $col_name = ['tieude', 'casi', 'loi', 'ngay_upload'];
       // $col_value = ['Hãy trao cho anh','Sơn Tùng M-TP','ccccccc','04/10/2021'];
       // insert_table($table,$col_name,$col_value);
       $filename = "money.mp3";
       music_duration($filename);

?>
<?php
session_start();
ob_start();
include('_ketnoi.php');
if(isset($_POST['tenks']))
{
    $tenks = $_POST['tenks'];
    $tinh = $_POST['tinhks'];
    $sql = "SELECT * FROM province Where id = $tinh";
    $ketqua = mysqli_query($ketnoi,$sql);
    $row = mysqli_fetch_assoc($ketqua);
    $tinh = $row['_name'];

    $huyen = $_POST['huyenks'];
    $sql = "SELECT * FROM district Where id = $huyen";
    $ketqua = mysqli_query($ketnoi,$sql);
    $row = mysqli_fetch_assoc($ketqua);
    $huyen = $row['_name'];

    $xa = $_POST['xaks'];
    $sql = "SELECT * FROM ward Where id = $xa";
    $ketqua = mysqli_query($ketnoi,$sql);
    $row = mysqli_fetch_assoc($ketqua);
    $xa = $row['_name'];


    $duong = $_POST['duongks'];
    $mota = $_POST['motaks'];

    $sql = "SELECT * FROM khachsan";
    $ketqua = mysqli_query($ketnoi,$sql);
    $soluong = mysqli_num_rows($ketqua);
    $soluong = $soluong + 3;
    $id_user = $_SESSION['id_user'];
    $thumuc = 'anhdaidien/';
    $file_path = $thumuc.$_FILES["upload"]["name"];
    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    $tenfile = $soluong."-".$id_user.".".$file_type;
    $file_path = $thumuc.$tenfile;
    
    
    $dk = true;
    $type = array('jpg','jpeg','png','gif');
    
    if(in_array($file_type,$type))
    {
        $dk = true;
        if(isset($_POST["submit"])) 
        {
            $check = getimagesize($_FILES["upload"]["tmp_name"]);
            if($check !== false) 
            {
              echo "Đây là hình- " . $check["mime"] . ".";
              $dk = true;
              if($_FILES['upload']['size']>2097152)
                {
                    echo "File dung lượng lớn";
                    $dk = false;
                }
                if(file_exists($file_path))
                {
                    echo "File Trùng";
                    $dk = false;
                }
            } 
            else
            {
              echo "File is not an image.";
              $dk = false;
            }
        }
    }
    if($dk == true)
    {
        move_uploaded_file($_FILES['upload']['tmp_name'],$file_path);
        $sql = "INSERT INTO `khachsan`(`ten_ks`, `tenduong`, `xa`, `huyen`, `tinh`, `urlanh_ks`, `mota_ks`, `id_user`) VALUES ('$tenks','$duong','$xa','$huyen','$tinh','$tenfile','$mota','$id_user')";
        mysqli_query($ketnoi,$sql);
        header("Location: http://quanlyduan901.000webhostapp.com/taikhoan/profile.php?id_user=".$id_user);
    }
} 
?>