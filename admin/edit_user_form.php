<?php include("../include/ketnoi.php");  ?>
<!-- Gắn hàm kiểm tra level admin vào?-->
<?php include("../chucnang/kiemtra_level_admin.php");
//Từ level 2 trở lên được phép vào
kiemtra_level_admin(2);
?>
<?php

$id = $_GET['id'];
//$row_sql = "SELECT * FROM `nhanvien` WHERE `nhanvien`.`MANV` = $id";
$sql = "SELECT * FROM `user_admin` WHERE id = $id;";
$row_thucthi = mysqli_query($ketnoi, $sql);
$row_dulieu = mysqli_fetch_array($row_thucthi);

?>
<!DOCTYPE html>
<html lang="en">
<!-- Head Tag -->
<?php include('head.php'); ?>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- include sidebar-->
        <?php include('sidebar.php'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column w-100">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Page Heading -->
                    <div style='width:100%'>
                        <span class="h3 mb-4 text-gray-800">Sửa thông tin admin</span>
                        <div style='float:right'><span style='padding-right:20px;color:black'><b>Chào,<?php echo $_SESSION['username']; ?></b></span><a href="../chucnang/xuly_logout_admin.php"><button class='btn btn-warning'>Đăng Xuất</button></a></div>
                    </div>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <form action="../chucnang/edit_user_admin.php" method="get" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID</label>
                            <!-- Lấy id nhưng giấu thẻ input -->
                            <input type="text" name="id"  hidden class="form-control" placeholder="ID"  value="<?php echo $id;?>">
                            <!-- Phải lấy thẻ p để hiện id cho mình biết -->
                            <span name="id"><?php echo $id;?></span>
                        </div>
                        <div>
                            <label>Username *</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" autofocus  value="<?php echo $row_dulieu['username'];?>

">
                        </div>
                        <div>
                            <div style='margin:20px'>
                            <select name="level">
                                <option value="1" <?php if($row_dulieu['level']==1) echo "selected"; ?>>Level 1</option>
                                <option value="2" <?php if($row_dulieu['level']==2) echo "selected"; ?>>Level 2</option>
                            </select>
                            </div>
                        
                        <input type="submit" class="btn btn-success btn-block" value="Save">
                    </form>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!--Footer -->
        <?php  include ('footer.php'); ?>

</body>

</html>