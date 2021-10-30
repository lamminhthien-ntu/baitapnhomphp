<!-- Gắn level tài khoản vào biến -->
<?php
//    session_start();
    $level=$_SESSION['level'];
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion animate__animated animate__backInLeft" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Website nghe nhạc TT Music </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php
    if ($level>=1)
        echo "
                                    <!-- Nav Item - Dashboard -->
                                     <li class='nav-item'>
                                              <a class='nav-link' href='index.php'>
                                                    <i class='fas fa-music'></i>
                                                    <span>Table Nhạc</span>
                                                </a>
                                     </li>
                            "
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!--Kiểm tra xem thử level có phù hợp ko, thì mới hiện thông tin ra sau-->
    <?php
    if ($level>=2)
        echo "
                                    <!-- Nav Item - Dashboard -->
                                     <li class='nav-item'>
                                              <a class='nav-link' href='index_user.php'>
                                                    <i class='fas fa-users'></i>
                                                    <span>Table User</span>
                                                </a>
                                     </li>
                            "
    ?>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!--Kiểm tra xem thử level có phù hợp ko, thì mới hiện thông tin ra sau-->
    <?php
    if ($level>=1)
        echo "
                                    <!-- Nav Item - Dashboard -->
                                     <li class='nav-item'>
                                              <a class='nav-link' href='add_song_form.php'>
                                                    <i class='fas fa-plus'></i>
                                                    <span>Add Nhạc</span>
                                                </a>
                                     </li>
                            "
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php
    if ($level>=2)
        echo "
                                    <!-- Nav Item - Dashboard -->
                                     <li class='nav-item'>
                                              <a class='nav-link' href='add_user_admin_form.php'>
                                                    <i class='fas fa-user-plus'></i>
                                                    <span>Add User</span>
                                                </a>
                                     </li>
                            "
    ?>

</ul>
<!-- End of Sidebar -->