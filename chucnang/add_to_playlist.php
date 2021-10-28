<?php
session_start();
    include("../include/ketnoi.php");
    include("../include/chucnang.php");
    
    if(isset($_GET['id_nhac'])&&isset($_SESSION['id_user']))
    {
        $id_user    = $_SESSION['id_user'];
        $id_nhac    = $_GET['id_nhac'];
        $col        = ['id_user','id_nhac'];
        $value      = [$id_user,$id_nhac];
        insert_table('thuviennhac',$col,$value);
    }
    else
    {
        header("location: http://localhost/baitapnhomphp");
    }

?>