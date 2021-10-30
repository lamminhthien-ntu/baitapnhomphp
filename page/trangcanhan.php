<?php
session_start();
include("../include/head.php");
include("../include/ketnoi.php");
if(!isset($_SESSION['id_user']))
    header("Location: http://localhost/baitapnhomphp");
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
    $pass       = $row['pass_user'];
if ($gioitinh == 0)
    $gioitinh = "Nam";
else if ($gioitinh == 1)
    $gioitinh = "Nữ";
else
    $gioitinh = "Khác";
?>

<body>
    <style>
        p {
            color: white;
            font-size: 1.5em;
            padding-left: 20px;
        }
    </style>
    <dialog id='chinhsua' class='dialog-table animate__animated animate__bounceInDown'>
        <div>
            <div>
                <span class='div-g' style='color:rgb(255, 255, 255,0.7);font-size:1.2em'><b></b></span>
                <span onclick='close_chinhsua()' class="btn material-icons-outlined like float-right"
                    style='color:white'>close</span>
            </div>
        </div>
        <div style='margin-top:20px'>
        <form action="../chucnang/update_thongtin.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <h2 class="font-lato-light">Cập nhật thông tin</h2>
                <p id='loi_hoten' style='color:tomato;font-size:0.8em'></p>
                <p id='loi_sdt' style='color:tomato;font-size:0.8em'></p>
                <p id='loi_matkhau' style='color:tomato;font-size:0.8em'></p>
                <div class='row flex-ngang'>
                    <div class='form-outline col-md-5'>
                        <div style="margin-left:20px;" class="flex-doc">
                            <span class="material-icons-outlined">badge</span>
                            <input class="form-in" style="color:white" onkeyup="check_loi()" minlength="2" maxlength="30" type="text" autocomplete="off" id='hoten' name="hoten" value="<?php echo $ten;?>" placeholder="Tên hiển thị" required/>
                        </div>
                    </div>
                    <div class='form-outline col-md-5'>
                        <div style="margin-left:20px;" class="flex-doc">
                            <span class="material-icons-outlined">call</span>
                            <input class="form-in" style="color:white" onkeyup="check_loi()" type="number" maxlength="10"  autocomplete="off" id='sdt' name="sdt" value="<?php echo $sdt;?>" placeholder="Số điện thoại" required/>
                        </div>
                    </div>
                </div>
                <div class='row flex-ngang'>
                    <div class='form-outline col-md-5'>
                        <div class="flex-doc">
                            <select style="color:white" class='select-in w-100' name='gioitinh' id='gioitinh' required>
                                <option value="" disabled selected>Chọn giới tính</option>
                                <option value="0" <?php if($gioitinh=="Nam")    echo "selected"; ?>>Nam</option>
                                <option value="1" <?php if($gioitinh=="Nữ")     echo "selected"; ?>>Nữ</option>
                                <option value="2" <?php if($gioitinh=="Khác")   echo "selected"; ?>>Khác</option>
                            </select>
                        </div>
                    </div>
                    <div class='form-outline col-md-5'>
                        <div style="margin-left:20px;" class="flex-doc">
                            <span class="material-icons-outlined">date_range</span>
                            <input value="<?php echo $ngaysinh;?>" class="form-in" style="color:white" type="text" id='ngaysinh' autocomplete="off" name="ngaysinh" placeholder="Ngày sinh" onfocus="(this.type='date')" required/>
                        </div>
                    </div>
                </div>
                <div class='row flex-ngang'>
                    <div class='form-outline col-md-5'>
                        <div style="margin-left:20px;" class="flex-doc">
                            <span class="material-icons-outlined">lock</span>
                            <input value="<?php echo $pass;?>" class="form-in" onkeyup="check_loi()" style="color:white" type="text" id='matkhau' autocomplete="off" name="matkhau" placeholder="Mật Khẩu" required/>
                        </div>
                    </div>
                </div>
                <div class='row flex-ngang'>
                    <div class='form-outline col-md-5'>
                        <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined color-black">photo_camera_front</span>
                    <div style='display:inline-block;width:100px'><span class='color-black' style='font-size:0.8em'>Ảnh
                            đại diện</span></div>
                    <input class='font-lato-heavy color-black' type="file" id='upload_anh' name='upload_anh'
                        placeholder="Ảnh đại diện của bạn..." accept="image/png, image/jpeg, image/jpg"/>
                        </div>
                    </div>
                </div>

                <div class="flex-ngang">
                    <button class="w-75 btn" type="submit" id='btn_submit'   style="background-color: #152D35;color:white">Cập Nhật</button>
                </div>
            </form>
            <script>
                var tenhienthi = document.getElementById('hoten');
                var sdt        = document.getElementById('sdt');
                var matkhau    = document.getElementById('matkhau');
                var loi_hoten  = document.getElementById('loi_hoten');
                var loi_sdt  = document.getElementById('loi_sdt');
                var loi_matkhau  = document.getElementById('loi_matkhau');
                var flag_ten = true;
                var flag_sdt = true;
                var flag_matkhau = true;
                function check_loi(){
                    var flag = 0;
                    if(tenhienthi.value.length > 25 || tenhienthi.value.length < 5)
                    {
                        loi_hoten.innerHTML = "*Tên hiển thị không hợp lệ. Vui lòng nhập từ 5-25 kí tự";
                        flag_ten = false;
                    }   
                    else
                    {
                        loi_hoten.innerHTML = "";
                        flag_ten = true;
                    }
                    if(sdt.value.length != 10)
                    {
                        loi_sdt.innerHTML = "*Định dạng số điện thoại không đúng";
                        flag_sdt = false;
                    }
                    else
                    {
                        loi_sdt.innerHTML = "";
                        flag_sdt = true;
                    }
                    if(matkhau.value.length <= 6)
                    {
                        loi_matkhau.innerHTML = "*Mật khẩu không hợp lệ vui lòng nhập mật khẩu trên 6 kí tụ";
                        flag_matkhau = false;
                    }   
                    else
                    {
                        loi_matkhau.innerHTML = "";
                        flag_matkhau = true;
                    }
                    if(flag_ten==true && flag_sdt==true && flag_matkhau==true)
                    {
                        document.getElementById('btn_submit').disabled = false;
                    }
                    else
                    {
                        document.getElementById('btn_submit').disabled = true;
                    }
                }
            </script>
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
        <div onclick="trangcanhan()" class="list-btn flex-doc like clicked">
            <span class="material-icons-outlined gian-cach">account_box</span>
            <span>Trang cá nhân</span>
        </div>
        <div onclick="thuvien()" class="list-btn flex-doc like">
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
            function thuvien(){
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
            <!-- <form class="flex-ngang">
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
            </form> -->
        </div>

        <div class="col-md-3 col-6 flex-doc">
            <div class="flex-doc" style="position: absolute;right:0">
                <?php
                if (!isset($_SESSION['id_user'])) {
                ?>
                    <a href="login/"><button class="btn gian-cach">Đăng nhập</button></a>
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
    <div style="margin-left:275px;padding:20px">
        <div>
            <span class="font-lato-thin" style='font-size:2em'>THÔNG TIN CỦA BẠN</span>
            <hr width="100%" style="border:solid white 1px;opacity:30%" />
        </div>
        <div class='row no-gutters'>
            <div class='col-md-3 flex-doc flex-ngang'>
                <img src="../anh_user/<?php echo $anh; ?>" width="250" height="250" style='border-radius:50%' />
            </div>
            <div class='col-md-3'>
                <div>
                    <p align='right'><b>ID:</b></p>
                    <p align='right'><b>Tên hiển thị:</b></p>
                    <p align='right'><b>Giới tính:</b></p>
                    <p align='right'><b>Ngày sinh:</b></p>
                    <p align='right'><b>Email:</b></p>
                    <p align='right'><b>Số điện thoại:</b></p>
                </div>
            </div>
            <div class='col-md-4'>
                <div style='margin-left:40px'>
                    <p align='left'><?php echo $id_user; ?></p>
                    <p align='left'><?php echo $ten; ?></p>
                    <p align='left'><?php echo $gioitinh; ?></p>
                    <p align='left'><?php echo $ngaysinh; ?></p>
                    <p align='left'><?php echo $email; ?></p>
                    <p align='left'><?php echo $sdt; ?></p>
                </div>
            </div>
        </div>
        <button style='margin-left:50px' onclick="open_chinhsua()" class='btn btn-success'>Chỉnh sửa thông tin</button>
        <div style="margin-top:50px">
            <span class="font-lato-thin" style='font-size:2em'>PLAYLIST CỦA BẠN</span>
            <hr width="100%" style="border:solid white 1px;opacity:30%" />
            <div class="container" style="margin-top:4vh">
                <div class="row no-gutters">
                    <div class="col-md-12 col-12">
                        <div class="flex-ngang row no-gutters">
                            <div class="col-md-6 col-12 flex-ngang"><span><b>Tên bài hát</b></span></div>
                            <div class="col-md-6 d-none d-md-block flex-ngang"><span><b>Thời gian</b></span></div>
                        </div>

                        <div class="row no-gutters flex-ngang" style="margin-top:2vh">
                            <hr width="90%" color="white" style="opacity: 30%;" />
                        </div>
                        <div id='list_song_playlist' style="overflow-y: scroll;overflow-x: hidden;height: 50vh;width: 100%;background-color:#182c44;border-radius: 10px;">
                                ádsad
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function remove_from_playlist(id){

            var id_nhac = id.substring(9);
            var xhttp = new XMLHttpRequest();
            xhttp.open('GET', 'http://localhost/baitapnhomphp/chucnang/delete_song_playlist.php?id_nhac=' + id_nhac , true);
            xhttp.send();
            window.location = "http://localhost/baitapnhomphp/page/trangcanhan.php";
            
        }
    </script>
    <audio id="music-run" src="../music/Trí Dũng-Forget Me Now.mp3" style="width:100%"></audio>
    <div id='bottomfixed' class="bottom-fixed show" style='z-index: 102;'>
        <div onclick="bottom_show()"
            style="position: fixed;top: -5vh;left:15.5%;background-color: rgb(28, 40, 65);height:40px" class="like btn">
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
    <!-- end content -->
    <div style='height:100px'>

    </div>
    <script src="js/index.js"></script>
</body>


</html>