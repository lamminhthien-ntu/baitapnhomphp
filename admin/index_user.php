    <?php include("../include/ketnoi.php");  ?>
    <!-- Gắn hàm kiểm tra level admin vào?-->
    <?php include("../chucnang/kiemtra_level_admin.php");
    //Từ level 1 trở lên được phép vào
        kiemtra_level_admin(2);
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

    <body id="page-top" class="animate__animated animate__backInRight">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- include sidebar-->
            <?php include('sidebar.php'); ?>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand-md navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Page Heading -->
                        <div style='width:100%'>
                            <span class="h3 mb-4 text-gray-800">Danh sách admin</span>
                            <div style='float:right'><span
                                    style='padding-right:20px;color:black'><b>Chào,<?php echo $_SESSION['username']; ?></b></span><a
                                    href="../chucnang/xuly_logout_admin.php"><button class='btn btn-warning'>Đăng
                                        Xuất</button></a></div>

                        </div>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Sửa</th>
                                    <th>Xoá</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                        $sql ="SELECT * FROM user_admin ORDER BY id DESC";
                                        $ketqua = mysqli_query($ketnoi,$sql);
                                        if(mysqli_num_rows($ketqua) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($ketqua))
                                            {
                                                $id         = $row['id'];
                                                $username     = $row['username'];
                                                $password        = $row['password'];
                                                $level       = $row['level'];
                                                
                                                echo "
                                                <tr>
                                                    <td>$id</td>
                                                    <td>$username</td>
                                                    <td>$password</td>
                                                    <td>$level</td>
                                                   <td> ";
                                        ?>
                                <a onclick=" return confirm('bạn có chắc muốn sửa không')"
                                    href="edit_user_form.php?id=<?php echo $id ?>" title="sửa"><img src="icon/edit.png"
                                        width="25px">
                                </a>
                                </td>
                                <td>
                                    <?php if($username!=$_SESSION['username']){ ?>
                                    <a onclick=" return confirm('bạn có chắc muốn xóa không') "
                                        href="../chucnang/delete_user_admin.php?id=<?php echo $id; ?>"><img
                                            src='icon/delete.jpg' width='25px'>
                                    </a>
                                </td>
                                </tr>
                                <?php   }  }

                                        }
                                        ?>

                            </tbody>
                        </table>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
                <!--Footer -->
                <?php  include ('footer.php'); ?>
    </body>

    </html>