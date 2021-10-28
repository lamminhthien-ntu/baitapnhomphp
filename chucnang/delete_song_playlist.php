<?php
session_start();
    include("../include/chucnang.php");
    if(isset($_GET['id_nhac']))
    {
        $id_nhac = $_GET['id_nhac'];
        $id_user = $_SESSION['id_user'];
        $sql = "DELETE FROM thuviennhac WHERE id_nhac = $id_nhac and id_user = $id_user";
        mysqli_query($ketnoi,$sql);
    }
?>