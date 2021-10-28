<?php
    include("../include/ketnoi.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Thêm nhạc</title>

   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_table_image.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Website nghe nhạc chachacha </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="table mẫu.php">
                 <i class="fas fa-music"></i>
                 <span>Table Nhạc</span></a>
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

             <!-- Nav Item - Dashboard -->
             <li class="nav-item">
                <a class="nav-link" href="dashboad_table_user.html">
                    <i class="fas fa-users"></i>
                    <span>Table User</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="add_song_form.php">
                       <i class="fas fa-play"></i>
                        <span>Add Nhạc</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="fas fa-user-plus"></i>
                            <span>Add User</span></a>
                        </li>

                    </ul>
                    <!-- End of Sidebar -->


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
                                <h1 class="h3 mb-4 text-gray-800">Bảng Song</h1>

                            </nav>
                            <!-- End of Topbar -->

                            <!-- Begin Page Content -->
                            <div class="container-fluid">


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
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $sql ="SELECT * FROM nhac ORDER BY id_nhac DESC";
                                        $ketqua = mysqli_query($ketnoi,$sql);
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
                                                    <td>$loi</td>
                                                    <td width='200px'>$casi</td>
                                                    <td>music/$tenfile</td>
                                                    <td>$ngayup</td>
                                                    <td>$luotnghe</td>
                                                </tr>
                                                "; 
                                            }
                                                
                                        }
                                    ?>
                                        
                                </tbody>
                            </table>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright © Your Website 2020</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>



        </body>

        </html>