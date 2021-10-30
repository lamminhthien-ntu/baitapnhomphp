<?php
    include("../include/ketnoi.php");
		$rowsPerPage = 4; //số mẩu tin trên mỗi trang, giả sử là 10
		if (!isset($_GET['page'])) {
			$_GET['page'] = 1;
		}
		$offset = ($_GET['page'] - 1) * $rowsPerPage;
		$page_hientai = $_GET['page'];
		$sql = "SELECT * FROM nhac ORDER BY id_nhac DESC LIMIT $offset,$rowsPerPage";
		$ketqua = mysqli_query($ketnoi, $sql);

		$sql_sodong = "SELECT * FROM nhac ORDER BY id_nhac DESC";
		$ketqua_sodong = mysqli_query($ketnoi, $sql_sodong);
		$sodong = mysqli_num_rows($ketqua_sodong);
		$page = ceil($sodong / $rowsPerPage);
?>

<?php include("../include/ketnoi.php");  ?>
<!-- Gắn hàm kiểm tra level admin vào?-->
<?php include("../chucnang/kiemtra_level_admin.php");
    //Từ level 1 trở lên được phép vào
        kiemtra_level_admin(1);
    ?>
<!--Hiện ra thông báo khi thêm, sửa,xoá -->
<?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            //Xoá thông báo sau khi in ra để tránh lặp đi lặp lại vô lí
        }
    ?>
<!-- Head Tag -->
<?php include('head.php'); ?>

<body id="page-top" class="">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- include sidebar-->
        <?php include('sidebar.php'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" class="">
                <!-- Topbar -->
                <nav class="navbar navbar-expand-md navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Page Heading -->
                    <div style='width:100%'>
                        <span class="h3 mb-4 text-gray-800">Danh sách nhạc</span>
                        <div style='float:right'><span
                                style='padding-right:20px;color:black'><b>Chào,<?php echo $_SESSION['username']; ?></b></span><a
                                href="../chucnang/xuly_logout_admin.php"><button class='btn btn-warning'>Đăng
                                    Xuất</button></a></div>

                    </div>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class='flex-ngang'>
                        <?php if ($page_hientai != 1) { ?>
                        <!-- Trang đầu -->
                        <a style='padding:10px;<?php echo "color:black"; ?>'
                            href="http://localhost/baitapnhomphp/admin/index.php?page=1"><span
                                class="material-icons">arrow_back_ios</span></a>
                        <!-- Trang trước -->

                        <a style='padding:10px;<?php echo "color:black"; ?>'
                            href="http://localhost/baitapnhomphp/admin/index.php?page=<?php echo $page_hientai - 1; ?>"><span
                                class="material-icons">chevron_left</span></a>
                        <?php }else{ ?>
                        <a style='padding:10px;<?php echo "color:black"; ?>'><span
                                class="material-icons">arrow_back_ios</span></a>
                        <!-- Trang trước -->

                        <a style='padding:10px;<?php echo "color:black"; ?>'><span
                                class="material-icons">chevron_left</span></a>
                        <?php } ?>

                        <!-- Các trang thành phần -->
                        <?php
                for ($i = 1; $i <= $page; $i++) {
                ?>
                        <a style='padding:10px;<?php if ($i == $_GET['page']) {
                                                echo "color:red";
                                            } else echo "color:gray"; ?>'
                            href="http://localhost/baitapnhomphp/admin/index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php
                }
                ?>

                        <!-- Trang sau -->
                        <?php if ($page_hientai != $page) { ?>
                        <a style='padding:10px;<?php echo "color:black"; ?>'
                            href="http://localhost/baitapnhomphp/admin/index.php?page=<?php echo $page_hientai + 1; ?>"><span
                                class="material-icons">navigate_next</span></a>


                        <!-- Trang cuối    -->
                        <a style='padding:10px;<?php echo "color:black"; ?>'
                            href="http://localhost/baitapnhomphp/admin/index.php?page=<?php echo $page; ?>"><span
                                class="material-icons">arrow_forward_ios</span></a>
                        <?php }else{ ?>
                        <a style='padding:10px;<?php echo "color:black"; ?>'><span
                                class="material-icons">navigate_next</span></a>


                        <!-- Trang cuối    -->
                        <a style='padding:10px;<?php echo "color:black"; ?>'><span
                                class="material-icons">arrow_forward_ios</span></a>
                        <?php } ?>
                    </div>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Lời bài hát</th>
                            <th>Ca Sĩ</th>
                            <th>Đường dẫn</th>
                            <th>Ngày upload</th>
                            <th>Lượt nghe</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                if(mysqli_num_rows($ketqua) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($ketqua))
                                    {
                                        $id         = $row['id_nhac'];
                                        $tieude     = $row['tieude'];
                                        $loi        = $row['loi'];
                                        $casi       = $row['casi'];
                                        $tenfile    = $row['tenfile'];
                                        $ngayup     = $row['ngay_upload'];
                                        $luotnghe   = $row['luotnghe'];
                                        echo "
                                        <tr>
                                            <td>$id</td>
                                            <td width='250px'>$tieude</td>
                                            <td name='loi_baihat'>$loi</td>
                                            <td width='200px'>$casi</td>
                                            <td>music/$tenfile</td>
                                            <td>$ngayup</td>
                                            <td>$luotnghe</td>
                                            <td>
                                                ";
                            ?>
                        <a onclick=" return confirm('bạn có chắc muốn sửa không')"
                            href="edit_song_form.php?id=<?php echo $id ?>" title="sửa"><img src="icon/edit.png"
                                width="25px">
                        </a>
                        </td>
                        <td>
                            <a onclick=" return confirm('bạn có chắc muốn xóa không') "
                                href="../chucnang/delete_song.php?id=<?php echo $id; ?>"><img src='icon/delete.jpg'
                                    width='25px'>
                            </a>
                        </td>
                        </tr>
                        <?php
                                                }
                                            }
                                        ?>
                    </tbody>
                </table>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!--Footer -->
            <?php  include ('footer.php'); ?>
</body>
<script>
var content_goc = [];
for (var i = 0; i < document.getElementsByName('loi_baihat').length; i++) {
    content_goc.push(document.getElementsByName('loi_baihat')[i].textContent);
}

function xemthem(i) {
    document.getElementsByName('loi_baihat')[i].textContent = content_goc[i];
}
for (var i = 0; i < document.getElementsByName('loi_baihat').length; i++) {
    if (document.getElementsByName('loi_baihat')[i].textContent.length > 100) {
        document.getElementsByName('loi_baihat')[i].textContent = document.getElementsByName('loi_baihat')[i]
            .textContent.substring(0, 50) + "...";
        var div = document.createElement('div');
        div.innerHTML = "<a style='color:black' onclick='xemthem(" + i + ")'>Xem Thêm</a>";
        document.getElementsByName('loi_baihat')[i].appendChild(div);
    }
}
</script>


</html>