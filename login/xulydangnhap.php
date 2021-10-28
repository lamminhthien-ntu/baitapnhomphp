<?php
include("ketnoi.php");
session_start();

$tenmien ='http://localhost/baitapnhomphp';
if(isset($_POST['taikhoan']) && isset($_POST['matkhau']))
{
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    $dk = true;
    $sql = "SELECT * FROM user";
    $ketqua = mysqli_query($ketnoi, $sql);

    if(mysqli_num_rows($ketqua) > 0)
	{
		while ($row = mysqli_fetch_assoc($ketqua))
		{
            if($row['name_user'] == $taikhoan && $row['pass_user'] == $matkhau)
            {
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['hoten']  = $row['hoten_user'];
                $_SESSION['anh_user'] = $row['anh_user'];
                echo "<script>
                                    window.location = '$tenmien';
                                </script>";
                $dk = true;
            }
            else
                $dk = false;
        }
        if ($dk == false)
        {
            echo "<script> alert('Sai mật khẩu hoặc tài khoản');
                                window.location = '$tenmien/login';
                            </script>";
        }
    }
}
else
    {
        header("Location: $tenmien");
    }




?>