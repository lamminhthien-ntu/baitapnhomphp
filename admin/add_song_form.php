<?php include("../include/ketnoi.php");  ?>
<!-- Gắn hàm kiểm tra level admin vào?-->
<?php include("../chucnang/kiemtra_level_admin.php");
//Từ level 2 trở lên được phép vào
kiemtra_level_admin(1);
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
                        <span class="h3 mb-4 text-gray-800">Thêm Nhạc Mới</span>
                        <div style='float:right'><span style='padding-right:20px;color:black'><b>Chào,<?php echo $_SESSION['username']; ?></b></span><a href="../chucnang/xuly_logout_admin.php"><button class='btn btn-warning'>Đăng Xuất</button></a></div>
                    </div>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <form action="../chucnang/add_song.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tiêu đề nhạc*</label>
                            <input type="text" name="title" class="form-control" placeholder="Tiêu đề" autofocus value="
<?php if (isset($_COOKIE['title_sticky'])) echo $_COOKIE['title_sticky'];?>
">
                            <?php if (isset($_COOKIE['title'])) echo $_COOKIE['title']; ?>
                        </div>
                        <div class="form-group">
                            <label>Lời bài hát</label>
                            <textarea name="loi" id="" rows="2" class="form-control"
                                placeholder="Lời bài hát"><?php if (isset($_COOKIE['loi_sticky'])) echo $_COOKIE['loi_sticky'];?></textarea>
                            <?php if (isset($_COOKIE['loi'])) echo $_COOKIE['loi']; ?>
                        </div>
                        <div class="form-group">
                            <label>Upload nhạc*</label>
                            <input type="file" name="upload_nhac" required accept="audio/mp3">
                        </div>
                        <div class="form-group">
                            <label>Upload ảnh đại diện nhạc</label>
                            <input type="file" name="upload_anh" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Ca sĩ*</label>
                            <textarea name="singer" id="" rows="2" class="form-control" placeholder="Ca sĩ">
                                <?php if (isset($_COOKIE['singer_sticky'])) echo $_COOKIE['singer_sticky'];?>
                            </textarea>
                            <?php if (isset($_COOKIE['singer'])) echo $_COOKIE['singer']; ?>
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