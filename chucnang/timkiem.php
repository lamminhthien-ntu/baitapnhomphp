<?php
include("../include/ketnoi.php");
if(isset($_GET['tukhoa']))
{   
    if(empty($_GET['tukhoa'])==false)
    {
    $tu_khoa = $_GET['tukhoa'];

    $tu_khoa = str_replace(" ","%",$tu_khoa);

    $sql = "SELECT * FROM nhac WHERE tieude like '%$tu_khoa%' or casi like '%$tu_khoa%'  ";
    $ketqua = mysqli_query($ketnoi,$sql);

    if(mysqli_num_rows($ketqua) > 0)
        {
            while ($row = mysqli_fetch_assoc($ketqua))
            {
                $tieude = $row['tieude'];
                $casi   = $row['casi'];
                $tenfile= $row['tenfile'];

            ?>
            
            <div class=" row no-gutters gian-cach radius-border flex-doc background-change like" style="width: 96%;height: 70px;">
                <div id='<?php echo $tenfile;?>' onclick="changeMusic(this.id)" class="col-md-12 flex-doc">
                    <div class="gian-cach" style="color: rgb(255,255,255,0.8);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                            class="bi bi-music-note-list" viewBox="0 0 16 16">
                            <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z" />
                            <path fill-rule="evenodd" d="M12 3v10h-1V3h1z" />
                            <path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1V2.82z" />
                            <path fill-rule="evenodd"
                                d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>
                    <div class='gian-cach'
                        style="background-color: rgb(65, 121, 225);width: 50px;height: 50px;border-radius: 10px;">
                    </div>
                    <div class="gian-cach">
                        <span><b><?php echo $tieude; ?></b></span><br>
                        <span><?php echo $casi; ?></span>
                    </div>
                </div>
            </div>
<?php
            }
        }
    }
}
else
    echo "không có từ khóa";
?>