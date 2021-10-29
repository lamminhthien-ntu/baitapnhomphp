<?php include("../include/ketnoi.php");  ?>
<!-- Gắn hàm kiểm tra level admin vào?-->
<?php include("../chucnang/kiemtra_level_admin.php");
//Từ level 2 trở lên được phép vào
kiemtra_level_admin(1);
?>
<?php

if (!empty($_GET['id'])) $id = $_GET['id']; else $id = $_SESSION['id'];
$sql = "SELECT * FROM `nhac` WHERE id_nhac = $id;";
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
                        <span class="h3 mb-4 text-gray-800">Sửa thông tin bài hát</span>
                        <div style='float:right'><span style='padding-right:20px;color:black'><b>Chào,<?php echo $_SESSION['username']; ?></b></span><a href="../chucnang/xuly_logout_admin.php"><button class='btn btn-warning'>Đăng Xuất</button></a></div>
                        
                    </div>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <form action="../chucnang/edit_song.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID</label>
                            <!-- Lấy id nhưng giấu thẻ input -->
                            <input type="text" name="id"  hidden class="form-control" placeholder="ID"  value="<?php echo $id;?>">
                            <!-- Phải lấy thẻ p để hiện id cho mình biết -->
                            <span name="id"><?php echo $id;?></span>
                        </div>
                        <div>
                            <label>Tiêu đề nhạc*</label>
                            <input type="text" name="title" class="form-control" placeholder="Tiêu đề" autofocus  value="<?php echo $row_dulieu['tieude'];?>">
                            <p style="color:red;"><?php if (isset($_COOKIE['title'])) echo $_COOKIE['title']; ?></p>
                        </div>
                        <div class="form-group">
                            <label>Lời bài hát</label>
                            <textarea name="loi" id="" rows="2" class="form-control"
                                placeholder="Lời bài hát" value=">
"><?php echo $row_dulieu['loi'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload nhạc*</label>
                            <input type="file" name="upload_nhac" required value="<?php echo $row_dulieu['ngay_upload'];?>">
                        </div>
                        <div class="form-group">
                            <label>Upload ảnh đại diện nhạc</label>
                            <img src="<?php echo '../music/anh/'.$row_dulieu['anh_nhac']?>" alt="Avatar" class="avatar">
                            <input type="file" name="upload_anh" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Ca sĩ*</label>
                            <input name="singer" id="" rows="2" class="form-control" placeholder="Ca sĩ" value="<?php echo $row_dulieu['casi'];?>">
                            <p style="color:red;"><?php if (isset($_COOKIE['singer'])) echo $_COOKIE['singer']; ?></p>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" value="Save Nhạc">
                    </form>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.container-fluid -->
            <?php  include ('footer.php'); ?>
        </div>
        <!-- End of Main Content -->
        <!--Footer -->
</div>

</body>

</html>