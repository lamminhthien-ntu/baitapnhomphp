<?php
include("../include/ketnoi.php");
include("../include/chucnang.php");
$id_m = $_GET['id_music'];


    $sql    = "SELECT * FROM nhac";
    $ketqua = mysqli_query($ketnoi,$sql);

    if(mysqli_num_rows($ketqua) > 0)
	{
		while ($row = mysqli_fetch_assoc($ketqua))
		{
            $tieude     = $row['tieude'];
            $casi       = $row['casi'];
            $file_name  = $row['tenfile'];
            $anh_nhac   = $row['anh_nhac'];

            if($file_name == $id_m)
            {?>
                <div class='animate__animated animate__rotateIn w-100 flex-ngang flex-doc'>
                    <div style="background-color: rgb(65, 116, 225);height: 50px;width: 50px;border-radius: 50%;">
                        <img class='song-rotate' src="http://localhost/baitapnhomphp/music/anh/<?php echo $anh_nhac; ?>" style="object-fit: cover;border-radius:50%" width="50px" height="50px" />
                    </div>
                    <div class="gian-cach">
                        <span><b><?php echo $tieude;?></b></span><br>
                        <span><?php echo $casi;?></span>
                    </div>
                </div>
            <?php
            }
        }
    }
?>