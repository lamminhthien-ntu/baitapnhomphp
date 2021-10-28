<?php
session_start();
include("../include/ketnoi.php");
include("../include/chucnang.php");
$id_user = $_SESSION['id_user'];

    $sql    = "SELECT * FROM nhac a,thuviennhac b WHERE a.id_nhac = b.id_nhac and b.id_user=$id_user";


    $ketqua = mysqli_query($ketnoi,$sql);

    if(mysqli_num_rows($ketqua) > 0)
	{
		while ($row = mysqli_fetch_assoc($ketqua))
		{
            $id_nhac    = $row['id_nhac'];
            $tieude     = $row['tieude'];
            $casi       = $row['casi'];
            $file_name  = $row['tenfile'];
            $luotnghe   = $row['luotnghe'];
            $anh_nhac   = $row['anh_nhac'];

                
?>
            <div id='<?php echo $file_name."div" ?>' class=" row no-gutters gian-cach radius-border flex-doc background-change like" style="width: 98%;height: 70px;">
                <div id='<?php echo $file_name ?>' onclick="changeMusic(this.id)" class="col-md-6 col-8 flex-doc">
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
                    <div class='gian-cach'>
                        <img src="../music/anh/<?php echo $anh_nhac; ?>" style="object-fit: cover;border-radius:50%" width="50px" height="50px" />
                    </div>
                    <div class="gian-cach">
                        <span><b><?php echo $tieude; ?></b></span><br>
                        <span><?php echo $casi; ?></span>
                    </div>
                </div>
                <div class="col-md-2 d-none d-md-block">
                    <div>
                        <span class='gian-cach'><?php music_duration($file_name);?></span>
                    </div>
                </div>
                <div class="col-md-2 col-2 flex-doc">
                    <span class="material-icons-outlined">visibility</span>
                    <span class='gian-cach'><?php echo $luotnghe; ?></span>
                </div>
                <div class="col-md-2 col-2">
                    <span id="playlist_<?php echo $id_nhac?>" onclick="remove_from_playlist(this.id)" class="material-icons-outlined">delete</span>
                </div>
            </div>
<?php
        }
    }

?>