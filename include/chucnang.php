<?php


include("getID3-master/getid3/getid3.php");
$ketnoi = mysqli_connect('localhost','root','','mp3');
        if(!$ketnoi)
            die("Kết nối thất bại!!!".mysqli_connect_error());

function insert_table($table,$array_col,$array_value){
    global $ketnoi;
    $array_col_a = [];
    $array_value_a= [];
    $mang = "";
    $mang_value = "";

    $i = 0;
    $array_col_a = $array_col;
    $array_value_a = $array_value;
    $soluong_pt = count($array_col_a);
    foreach ($array_col_a as $value){
        $i++;
        if($i==$soluong_pt)
            $mang .= "`".$value."`";
        else 
            $mang .= "`".$value."`,"; 
    }
    $i=0;
    foreach ($array_value_a as $value){
        $i++;
        if($i==$soluong_pt)
            $mang_value .= "'".$value."'";
        else 
            $mang_value .= "'".$value."',"; 
    }
    $sql = "INSERT INTO `$table`($mang) VALUES ($mang_value)";
    mysqli_query($ketnoi,$sql);
}
function delete_table($table,$tencot,$id){
    global $ketnoi;
    $sql = "DELETE FROM `$table` WHERE `$tencot` = $id";
    mysqli_query($ketnoi,$sql);
}
function update_table($table,$tencot,$value,$tencot1,$id){
    global $ketnoi;
    $sql = "UPDATE `$table` SET `$tencot` = '$value' WHERE $tencot1='$id'";
    mysqli_query($ketnoi,$sql);
}

function music_duration($music_file){
       $filename = '../music/'.$music_file;
       $getID3 = new getID3;
       $file = $getID3->analyze($filename);
       $playtime_seconds = $file['playtime_seconds'];
       echo gmdate("i:s", $playtime_seconds);
}
function upload_music_file($thumuc,$name,$ten_file){

    $upload_name    = $_FILES["$name"]["name"];
    $upload_size    = $_FILES["$name"]["size"];
    $upload_tmpname = $_FILES["$name"]['tmp_name'];


    $file_path = $thumuc.$upload_name;
    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    $tenfile = $ten_file.".".$file_type;
    $file_path = $thumuc.$tenfile;
    $type = array('mp3','wav');
    
    if(in_array($file_type,$type))
    {
        $dk = true;
        if(isset($_POST["submit"])) 
        {
            if($upload_size>2097152)
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
    }
    if($dk == true)
    {
        move_uploaded_file($upload_tmpname,$file_path);
    }
}
function upload_image_file($thumuc,$name,$ten_file){

    $upload_name    = $_FILES["$name"]["name"];
    $upload_size    = $_FILES["$name"]["size"];
    $upload_tmpname = $_FILES["$name"]['tmp_name'];


    $file_path = $thumuc.$upload_name;
    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    $tenfile = $ten_file.".".$file_type;
    $file_path = $thumuc.$tenfile;
    $type = array('jpg','jpeg','png','gif');
    
    if(in_array($file_type,$type))
    {
        $dk = true;
        if(isset($_POST["submit"])) 
        {
            $check = getimagesize($upload_tmpname);
            if($check !== false) 
            {
              echo "Đây là hình- " . $check["mime"] . ".";
              $dk = true;
              if($upload_size>2097152)
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
        move_uploaded_file($upload_tmpname,$file_path);
    }
}
?>