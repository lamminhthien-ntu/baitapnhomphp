<?php
session_start();
include("../include/ketnoi.php");
$id_user = $_SESSION['id_user'];
$sql = "SELECT anh_user FROM user WHERE id_user = $id_user";
$row = mysqli_fetch_assoc(mysqli_query($ketnoi,$sql));
$anh_user = $row['anh_user'];
    if(isset($_GET['file_name']))
    {
        $file_name = $_GET['file_name'];
        $sql = "SELECT c.hoten_user, thoigian, anh_user, noidung_bl FROM binhluan a,nhac b,user c WHERE a.id_user = c.id_user and a.id_nhac = b.id_nhac and b.tenfile like '%$file_name%'";
        $ketqua = mysqli_query($ketnoi,$sql);

        if(mysqli_num_rows($ketqua) > 0)
        {?>
        <div id='ds_cmt' style='overflow-y:scroll;overflow-x:hidden;height:270px;'>
        <?php
            while ($row = mysqli_fetch_assoc($ketqua))
            {
                $ten        = $row['hoten_user'];
                $thoigian   = $row['thoigian'];
                $anh        = $row['anh_user'];
                $noidung    = $row['noidung_bl']; ?>

                <div class='flex-ngang animate__animated animate__bounceInRight' style='margin-top:2vh'>
                    <div><img src='../anh_user/<?php echo $anh; ?>' style='border-radius:50%;width: 35px;margin-top:4vh;margin-right: 10px;' /></div>
                    <div class='w-100'>
                        <div class='float-left' style='color:rgba(255, 255, 255, 0.6);font-size:0.7em'><?php echo $ten?></div><br>
                        <div class='float-left' style='background-color:rgb(255, 255, 255,0.15);border-radius:20px;padding:10px;color:white'><?php echo $noidung;?></div><br><br>
                        <div class='float-left' style='color:rgba(255, 255, 255, 0.6);font-size:0.7em;margin-left: 10px;'><?php echo $thoigian;?></div>
                    </div>
                </div>

<?php
            }
            
        }
        ?>
        </div>
        <?php
    }

?>
                <div style="position: absolute;bottom:0;width:100%">
                    <div>
                        <hr width="95%" style="border: solid rgb(255,255,255,0.3) 1px;" />
                    </div>
                    <form onsubmit="return submit_them_comment()">
                        <div class='flex-ngang flex-doc' style="width:100%">
                            <?php if(isset($_SESSION['id_user'])){ ?>
                            <div style='width:10%' class='flex-ngang'><img src="../anh_user/<?php echo $anh_user;?>" style="border-radius:50%" width="50" height="50"/></div>
                            <?php }?>
                            <input id='cmt_<?php echo $file_name;?>' value="<?php echo $file_name;?>" class='d-none d-md-none'/>
                            <div style='width:80%'><textarea id='text_bl' class='text-area' style='width: 100%;' placeholder="Nhập vào bình luận của bạn....."></textarea></div>
                            <div style='width:10%' class='flex-ngang'><button class="btn btn-success material-icons-outlined">send</button></div>
                        </div>
                    </form>
                </div>
