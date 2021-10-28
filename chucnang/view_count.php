<?php
include("../include/chucnang.php");

$file_name = $_GET['file_name'];

$sql = "SELECT luotnghe FROM nhac WHERE tenfile = '$file_name'";
$ketqua = mysqli_query($ketnoi,$sql);
    if(mysqli_num_rows($ketqua))
    {
        while($row = mysqli_fetch_assoc($ketqua))
        {
            $luotnghe = $row['luotnghe'];
        }
    }
$table = 'nhac';
$tencot = 'luotnghe';
$luotnghe++;
$tencot1 = 'tenfile';
update_table($table,$tencot,$luotnghe,$tencot1,$file_name);
?>