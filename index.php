<?php
    session_start();
    include("include/head.php");
    include("include/ketnoi.php");
?>


<body>

    <!-- thông báo thêm vào playlist thành công -->
    <dialog id='thong_bao' class='dialog-table animate__animated animate__bounceInDown'>
        <div>
            <div>
                <span class='div-g' style='color:rgb(255, 255, 255,0.7);font-size:1.2em'><b>Thông báo</b></span>
                <span onclick='close_thongbao()' class="btn material-icons-outlined like float-right"
                    style='color:white'>close</span>
            </div>
        </div>
        <div style='margin-top:20px'>
            <span class='font-lato-heavy color-black'>Đã thêm vào playlist của bạn</span>
        </div>
    </dialog>
    <!-- thông báo end -->
    <!-- side bar -->
    <div onclick="side_bar_f()" class="btn btn-default like" style="position: fixed;left:15px;top:80px;z-index: 101;">
        <span style="font-size: 2em;" class="material-icons-outlined">menu</span>
    </div>

    <div id='side_bar' class='side-bar animate__animated'>
        <div style="height:70px"></div>
        <!-- <div id='btn_1' onclick="btn_change(this.id)" class="list-btn flex-doc like">
            <span class="material-icons-outlined gian-cach">format_list_numbered</span>
            <span>TOP bài hát nghe nhiều</span>
        </div> -->
        <div></div>
        <div onclick="trangchu()" class="list-btn flex-doc like clicked">
            <span class="material-icons-outlined gian-cach">home</span>
            <span>Trang chủ</span>
        </div>
        <?php
            if(isset($_SESSION['id_user']))
            {
        ?>
        <div onclick="trangcanhan()" class="list-btn flex-doc like">
            <span class="material-icons-outlined gian-cach">account_box</span>
            <span>Trang cá nhân</span>
        </div>
        <?php }?>
        <div onclick="thuvien()" class="list-btn flex-doc like">
            <span class="material-icons-outlined gian-cach">library_music</span>
            <span>Thư viên nhạc</span>
        </div>
        <footer class="w-100" style='position: absolute;bottom: 0;'>
        <hr width="90%" style="border:solid white 1px;opacity:30%" />
        <p align='center' class="font-lato-heavy">Design by Nhat Truong</p>
    </footer>
    <script>
            function trangcanhan() {
                window.location = "http://localhost/baitapnhomphp/page/trangcanhan.php";
            }

            function trangchu() {
                window.location = "http://localhost/baitapnhomphp/";
            }
            function thuvien(){
                window.location = "http://localhost/baitapnhomphp/page/thuviennhac.php";
            }
        </script>
    </div>
    <!-- sidebar end -->

    <!-- navbar -->
    <div class='nav-bar sticky-top row no-gutters'>
        <div class="col-md-3 col-6 flex-doc">
            <div style="float: left;padding-left: 20px;">
                <span class="font-lato-heavy" style='font-size:1.5em'>TT Music</span>
            </div>
        </div>
        <div class="col-md-6 d-none d-md-block">
            <form class="flex-ngang">
                <div>
                    <div class='form-outline'>
                        <div class="flex-doc" style="margin-left: 20px;">
                            <span class="material-icons-outlined">search</span>
                            <input id='timkiem_box' onkeyup="tim_kiem()" onfocus="hien_ketqua()" onblur="dong_ketqua()" class="form-in" type="text" name="timkiem" autocomplete="off" placeholder="Tìm kiếm bài hát của bạn...." required />
                        </div>
                    </div>
                    <div style="position: absolute">
                        <div id='ketqua_tk' class="ketqua-tk" style="overflow-y:scroll;max-height: 280px;">


                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-3 col-6 flex-doc">
            <div class="flex-doc" style="position: absolute;right:0">
                <?php
                    if(!isset($_SESSION['id_user']))
                    {
                ?>
                    <a href="login/"><button class="btn gian-cach">Đăng nhập</button></a>
                    <span class="material-icons" style="font-size: 2em;margin-right:10px">account_circle</span>
                <?php
                    }
                    else
                    {
                        $id_user = $_SESSION['id_user'];
                        $hoten = $_SESSION['hoten'];
                        $sql = "SELECT anh_user FROM user WHERE id_user = $id_user";
                        $row = mysqli_fetch_assoc(mysqli_query($ketnoi,$sql));
                        $anh = $row['anh_user'];
                ?>
                    <img src="anh_user/<?php echo $anh;?>" style="object-fit: cover;height:40px;width:40px;border-radius:50%" />
                    <span class='font-lato-heavy' style='margin-left:10px'><?php echo "Chào, $hoten"; ?></span>
                    <a href="login/dangxuat.php"><button class="btn gian-cach">Đăng xuất</button></a>
                  <?php
                    }
                  ?>
            </div>
        </div>
    </div>
    <!-- navbar end -->





    <!-- Slide anh -->
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style="border-radius: 0px 0px 20px 20px;">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/huong.jpg" style="object-fit: cover;" width="100%"
                        height="auto">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/forgetmenow.jpg" style="object-fit: cover;" width="100%"
                        height="auto">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/money.jpg" style="object-fit: cover;" width="100%"
                        height="auto">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- Slide anh end -->

    <!-- thể loại nhạc -->
    <div class='d-none d-md-block' style="margin-top:4vh">
        <div class="flex-ngang">
            <div class="gian-cach radius-border phongto" style="width: 200px;height: 250px;">
                <img class="radius-border" src="img/huong_poster.jpg" style="object-fit:cover" width="100%"
                    height="auto" />
            </div>
            <div class="gian-cach radius-border phongto" style="width: 200px;height: 250px;">
                <img class="radius-border" src="img/money_poster.jpg" style="object-fit:cover" width="100%"
                    height="auto" />
            </div>
            <div class="gian-cach radius-border phongto" style="width: 200px;height: 250px;">
                <img class="radius-border" src="img/noinaycoanh_poster.jpg" style="object-fit:cover" width="100%"
                    height="auto" />
            </div>
            <div class="gian-cach radius-border phongto" style="width: 200px;height: 250px;">
                <img class="radius-border" src="img/chayngaydi_poster.jpg" style="object-fit:cover" width="100%"
                    height="auto" />
            </div>
            <div class="gian-cach radius-border phongto" style="width: 200px;height: 250px;">
                <img class="radius-border" src="img/ccyld_poster.jpg" style="object-fit:cover" width="100%"
                    height="auto" />
            </div>
            <div class="gian-cach radius-border phongto" style="width: 200px;height: 250px;">
                <img class="radius-border" src="img/thucgiac_poster.jpg" style="object-fit:cover" width="100%"
                    height="auto" />
            </div>
        </div>
        <div class="row no-gutters flex-ngang" style="margin-top:2vh">
            <hr width="90%" color="white" style="opacity: 30%;" />
        </div>
    </div>

    <!-- thẻ loại nhạc end -->

    <!-- Nhạc hot -->
    <h2 class="font-lato-heavy animate__animated" style="color: rgb(255,255,255,0.8);padding:20px" id='de_muc'>Bài hát HOT ngày qua</h2>
    <div class="container" style="margin-top:4vh">
        <div class="row no-gutters">
            <div class="col-md-4 d-none d-md-block">
                <img class="gian-cach radius-border" src="img/money1.jpg" style="object-fit: cover;" width="300px"
                    height="390vh">
            </div>
            <div class="col-md-8 col-12">
                <div onclick="ds_nhac_sort()" class="list-btn flex-doc like" style="position: absolute;right:0;top:-30px;width:30%;z-index:100;border-radius:10px" >
                    <span class="material-icons-outlined gian-cach">format_list_numbered</span>
                    <span>TOP bài hát nghe nhiều</span>
                </div>

                <div class="flex-ngang row no-gutters">
                    <div class="col-md-6 col-12 flex-ngang"><span><b>Tên bài hát</b></span></div>
                    <div class="col-md-6 d-none d-md-block flex-ngang"><span><b>Thời gian</b></span></div>
                </div>
            
                <div class="row no-gutters flex-ngang" style="margin-top:2vh">
                    <hr width="90%" color="white" style="opacity: 30%;" />
                </div>
                <div id='list_song'
                    style="overflow-y: scroll;overflow-x: hidden;height: 50vh;width: 100%;background-color:#182c44;border-radius: 10px;">

                </div>
            </div>
        </div>
    </div>
    <!-- Nhạc hot end -->
    <div style="height: 20vh;">

    </div>
    <!-- Thanh bottom bar -->
    <audio id="music-run" src="music/Trí Dũng-Forget Me Now.mp3" style="width:100%"></audio>
    <div id='bottomfixed' class="bottom-fixed show">
        <div onclick="bottom_show()"
            style="position: fixed;top: -5vh;left:5%;background-color: rgb(28, 40, 65);height:40px" class="like btn">
            <span id='arrow' class="material-icons-outlined">expand_more</span></div>
        <div class="row">
            <div class="col-md-3 d-none d-md-block">
                <div id='phatnhac' class='flex-doc flex-ngang' style='margin-top:10%'>
                    <div style="background-color: rgb(65, 116, 225);height: 50px;width: 50px;border-radius: 50%;"></div>
                    <div class="gian-cach">
                        <span><b>Forget Me Now</b></span><br>
                        <span>Nhật Trường</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div style="margin-top:10px;" class="flex-doc flex-ngang">
                    <div class="gian-cach phongto like">
                        <span class="material-icons-outlined">playlist_add</span>
                    </div>
                    <div class="flex-ngang flex-doc vongtron gian-cach phongto">
                        <span id='icon_play' class="material-icons-outlined like" onclick="play()">play_arrow</span>
                    </div>
                    <div class="gian-cach phongto like">
                        <span id='loop_btn' onclick="loop()" class="material-icons-outlined">repeat</span>
                    </div>
                </div>
                <div>
                    <div class='can-giua flex-ngang flex-doc' style="width:100%;">
                        <span id='time_current'>00:00</span>
                        <input id='time_line' class="range-control" value="0" type="range" min="0" max='100' step="1">
                        <span id='time_duration'>00:00</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-none d-md-block">
                <div class='flex-doc flex-ngang' style='margin-top:10%'>
                    <div class="like gian-cach phongto" onclick="turnoff_music()">
                        <span id='volume_btn' class="material-icons-outlined">volume_up</span>
                    </div>
                    <div class="phongto">
                        <input id='volume' class="range-control" type="range" step="10" max="100" />
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- END Thanh bottom bar -->


    <script src="js/index.js"></script>
</body>

</html>