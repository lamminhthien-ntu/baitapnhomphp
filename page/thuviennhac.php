<?php
session_start();
include("../include/head.php");
include("../include/ketnoi.php");
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $sql = "SELECT * FROM user WHERE id_user = $id_user";
    $ketqua = mysqli_query($ketnoi, $sql);
    $row = mysqli_fetch_assoc($ketqua);

    $ten        = $row['hoten_user'];
    $ngaysinh   = $row['ngaysinh_user'];
    $gioitinh   = $row['gioitinh_user'];
    $email      = $row['email_user'];
    $sdt        = $row['sdt_user'];
    $anh        = $row['anh_user'];

    if ($gioitinh == 0)
        $gioitinh = "Nam";
    else if ($gioitinh == 1)
        $gioitinh = "Nữ";
    else
        $gioitinh = "Khác";
}

?>

<body>
    <dialog id='thong_bao' class='dialog-table animate__animated animate__bounceInDown'>
        <div>
            <div>
                <span class='div-g' style='color:rgb(255, 255, 255,0.7);font-size:1.2em'><b>Thông báo</b></span>
                <span onclick='close_thongbao()' class="btn material-icons-outlined like float-right" style='color:white'>close</span>
            </div>
        </div>
        <div style='margin-top:20px'>
            <span class='font-lato-heavy color-black'>Đã thêm vào playlist của bạn</span>
        </div>
    </dialog>
    <!-- side bar -->
    <!-- button -->
    <div class="btn btn-default like" style="position: fixed;left:15px;top:80px;z-index: 101;">
        <span style="font-size: 2em;" class="material-icons-outlined">menu</span>
    </div>
    <!-- body -->
    <div id='side_bar' class='side-bar animate__animated'>
        <div style="height:70px"></div>
        <!-- <div id='btn_1' onclick="btn_change(this.id)" class="list-btn flex-doc like">
            <span class="material-icons-outlined gian-cach">format_list_numbered</span>
            <span>TOP bài hát nghe nhiều</span>
        </div> -->
        <div></div>
        <div onclick="trangchu()" class="list-btn flex-doc like">
            <span class="material-icons-outlined gian-cach">home</span>
            <span>Trang chủ</span>
        </div>
        <?php
        if (isset($_SESSION['id_user'])) {
        ?>
            <div onclick="trangcanhan()" class="list-btn flex-doc like">
                <span class="material-icons-outlined gian-cach">account_box</span>
                <span>Trang cá nhân</span>
            </div>
        <?php } ?>
        <div onclick="thuvien()" class="list-btn flex-doc like clicked">
            <span class="material-icons-outlined gian-cach">library_music</span>
            <span>Thư viên nhạc</span>
        </div>

        <footer class="w-100" style='position: absolute;bottom: 0;'>
            <hr width="90%" style="border:solid white 1px;opacity:30%" />
            <p align='center' class="font-lato-heavy" style="font-size: 1em;margin-right:20px">Design by Nhat Truong</p>
        </footer>
        <script>
            function trangcanhan() {
                window.location = "http://localhost/baitapnhomphp/page/trangcanhan.php";
            }

            function trangchu() {
                window.location = "http://localhost/baitapnhomphp/";
            }

            function thuvien() {
                window.location = "http://localhost/baitapnhomphp/page/thuviennhac.php";
            }
        </script>
    </div>
    <!-- sidebar end -->

    <!-- nav bar -->
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
                if (!isset($_SESSION['id_user'])) {
                ?>
                    <a href="../login/"><button class="btn gian-cach">Đăng nhập</button></a>
                    <span class="material-icons" style="font-size: 2em;margin-right:10px">account_circle</span>
                <?php
                } else {
                ?>
                    <img src="../anh_user/<?php echo $anh; ?>" style="object-fit: cover;height:40px;width:40px;border-radius:50%" />
                    <span class='font-lato-heavy' style='margin-left:10px'><?php echo "Chào, $ten"; ?></span>
                    <a href="../login/dangxuat.php"><button class="btn gian-cach">Đăng xuất</button></a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- nav bar end -->

    <!-- content -->
    <div style='margin-left:275px'>
        <div class="container" style="margin-top:4vh">
            <div class="row no-gutters">
                <div class="col-md-12 col-12">
                    <div onclick="ds_nhac_sort()" class="list-btn flex-doc like" style="position: absolute;right:0;top:-30px;width:30%;z-index:100;border-radius:10px">
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
                    <div id='list_song' style="overflow-y: scroll;overflow-x: hidden;height: 50vh;width: 100%;background-color:#182c44;border-radius: 10px;">

                    </div>
                </div>
            </div>
        </div>
        <div style='padding:40px'>
            <button class='btn btn-success w-100' onclick="mo_bl()" id='bl-btn'>Xem bình luận</button>
            <div id='area_bl' style='margin-top:10px;border-radius:10px' class='btn-default noidung-bl-close d-md-none'>
                <div style='padding:20px' id='noidung_bl'>



                </div>


            </div>
        </div>


    </div>
    <script>
        function submit_them_comment() {
            var data = new FormData();
            data.append("noidung_bl", document.getElementById("text_bl").value);
            data.append("name_nhac", document.getElementById("cmt_" + name_file_cmt).value);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../chucnang/add_comment.php");
            xhr.onload = function() {
                console.log(this.response);
            };
            var noidungbl = document.getElementById("text_bl").value;
            document.getElementById("text_bl").value = "";
            xhr.send(data);

            var div = document.createElement('div');
            var ds_cmt = document.getElementById("ds_cmt");
            div.innerHTML = "<div class='flex-ngang animate__animated animate__bounceInRight' style='margin-top:2vh'><div><img src='../anh_user/<?php echo $anh; ?>' style='border-radius:50%;width: 35px;margin-top:4vh;margin-right: 10px;' /></div><div class='w-100'><div class='float-left' style='color:rgba(255, 255, 255, 0.6);font-size:0.7em'><?php echo $ten ?></div><br><div class='float-left' style='background-color:rgb(255, 255, 255,0.15);border-radius:20px;padding:10px;color:white'>"+noidungbl+"</div><br><br><div class='float-left' style='color:rgba(255, 255, 255, 0.6);font-size:0.7em;margin-left: 10px;'>Bây giờ</div></div></div>";
            ds_cmt.appendChild(div);
            var chatHistory = document.getElementById("ds_cmt");
                    chatHistory.scrollTop = chatHistory.scrollHeight;
            return false;
        }
        var flag_bl = true;
        var nd_bl = document.getElementById('area_bl');
        var nd_btn = document.getElementById('bl-btn');

        async function mo_bl() {
            if (flag_bl == true) {
                nd_btn.innerHTML = "Đóng bình luận";
                nd_bl.classList.remove('noidung-bl-close');
                nd_bl.classList.remove('d-md-none');
                nd_bl.classList.add('noidung-bl-open');
                flag_bl = false;
            } else {
                nd_btn.innerHTML = "Mở bình luận";
                
                nd_bl.classList.remove('noidung-bl-open');
                nd_bl.classList.add('noidung-bl-close');
                await sleep(900);
                nd_bl.classList.add('d-md-none');
                
                flag_bl = true;
            }


        }
        function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
    </script>
    <!-- <div style='height:500px'>

        </div> -->

    </div>

    <audio id="music-run" src="../music/Trí Dũng-Forget Me Now.mp3" style="width:100%"></audio>
    <div id='bottomfixed' class="bottom-fixed show" style='z-index: 102;'>
        <div onclick="bottom_show()" style="position: fixed;top: -5vh;left:15.5%;background-color: rgb(28, 40, 65);height:40px" class="like btn">
            <span id='arrow' class="material-icons-outlined">expand_more</span>
        </div>
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
    <!-- end content -->
    <div style='height:100px'>

    </div>
    <script src="js/index.js"></script>

</body>


</html>