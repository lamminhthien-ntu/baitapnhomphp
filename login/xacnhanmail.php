<?php 
session_start();
ob_start();
    include("ketnoi.php");
    $tenmien = "http://localhost/baitapnhomphp";
    $sql = "SELECT * FROM user";

    $reload = true;

    $ketqua = mysqli_query($ketnoi,$sql);
    if(!isset($_COOKIE['no_reload']))
    {
        if(isset($_POST['hoten'])||isset($_POST['sdt'])||isset($_POST['nlmatkhau'])||isset($_POST['matkhau'])||isset($_POST['taikhoan'])||isset($_POST['email'])||isset($_POST['gioitinh'])||isset($_POST['ngaysinh']))
        {
            if($_POST['hoten']==""||
            $_POST['ngaysinh']==""||
            $_POST['gioitinh']==""||
            $_POST['email']==""||
            $_POST['taikhoan']==""||
            $_POST['matkhau']==""||
            $_POST['nlmatkhau']==""||
            $_POST['sdt']=="")
            {
                echo "<script>alert('Hãy nhập thông tin đầy đủ');window.location='$tenmien'</script>";
            }
            else 
            {
                    $hoten = $_POST['hoten'];
                    $ngaysinh = $_POST['ngaysinh'];
                    $email = $_POST['email'];
                    $tendn = $_POST['taikhoan'];
                    $mk = $_POST['matkhau'];
                    $nmk = $_POST['nlmatkhau'];
                    $sdt = $_POST['sdt'];
                    $gioitinh = $_POST['gioitinh'];
                    $random = mt_rand(100000, 999999);
                    //Check dữ liệu có thỏa điều kiện
                    if(strlen($sdt)!=10)
                    {
                        $reload=false;
                    }
                        
                    if(strlen($hoten)<2 && strlen($hoten)>30)
                    {
                        $reload=false;
                    }
                    if(strlen($tendn)<6 && strlen($tendn)>25)
                    {
                        $reload=false;
                    }
                    if($mk!=$nmk)
                    {
                        $reload=false;
                    }
                    if(strlen($mk)<=6)
                    {
                        $reload=false;
                    }
                    // Check đã có người sử dụng tên chưa
                    if(mysqli_num_rows($ketqua) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($ketqua))
                        {
                            $emailsql = $row['email_user'];
                            $tendnsql = $row['name_user'];
                            $sdtsql = $row['sdt_user'];

                            if($emailsql==$email)
                            {
                                $reload=false;
                            }
                            if($tendnsql==$tendn)
                            {
                                $reload=false;
                            }
                            if($sdtsql==$sdt)
                            {
                                $reload=false;
                            }  
                        }
                    }
                    //Không reload trang khi trang thỏa dữ liệu
                    if($reload==true)
                    {
                        setcookie('no_reload', true, time() + 120, "/");
                        $_SESSION['random'] = $random;
                        setcookie('hoten', $hoten, time() + 130, "/");
                        setcookie('gioitinh', $gioitinh, time() + 130, "/");
                        setcookie('ngaysinh', $ngaysinh, time() + 130, "/");
                        setcookie('email', $email, time() + 130, "/");
                        setcookie('tendn', $tendn, time() + 130, "/");
                        setcookie('mk', $mk, time() + 130, "/");
                        setcookie('sdt', $sdt, time() + 130, "/"); 
                        guimail($hoten,$email,$random);
                        header("Location: $tenmien/login/xacnhanmail.php");
                    }
                    else
                    {
                        header("Location: $tenmien");
                    }
                        
            }
        }
        else
            header("Location: $tenmien");
    }
function guimail($tennguoinhan,$emailnguoinhan,$maso){
        include('PHPMailer-5.2.26/class.smtp.php');
        include "PHPMailer-5.2.26/class.phpmailer.php"; 
        $nFrom = "TT MP3 mã Xác Nhận tài khoản";    //mail duoc gui tu dau, thuong de ten cong ty ban
        $mFrom = 'guimailxacnhan@gmail.com';  //dia chi email cua ban 
        $mPass = 'nhattruong123';       //mat khau email cua ban
        $nTo = $tennguoinhan; //Ten nguoi nhan
        $mTo = $emailnguoinhan;   //dia chi nhan mail
        $mail             = new PHPMailer();
        $body             = "    <div>
        <div style='font-family: Nunito, sans-serif;'>
        <div style='background-color: #696a91;width:100%;height:300px;border-radius:10px;'>
            <div style='display: flex !important;align-items: center !important;'>
            <div style='margin-left:auto;margin-right: auto;'>
                <h2 align='center' style='color:white'>MÃ XÁC NHẬN MAIL TỪ TT Music</h2>
                <p align='center' style='font-size:25px;padding: 20px;background-color:white'><b>$maso</b></p>
                <img src='https://i.imgur.com/gvsxwOj.png' height='100' width='100%' style='object-fit: cover;' />
            </div>
            </div>
        </div>
        </div>
    </div>";   // Noi dung email
        $title = 'Mã code xác nhận';   //Tieu de gui mail
        $mail->IsSMTP();             
        $mail->CharSet  = "utf-8";
        $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;    // enable SMTP authentication
        $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";    // sever gui mail.
        $mail->Port       = 465;         // cong gui mail de nguyen
        // xong phan cau hinh bat dau phan gui mail
        $mail->Username   = $mFrom;  // khai bao dia chi email
        $mail->Password   = $mPass;              // khai bao mat khau
        $mail->SetFrom($mFrom, $nFrom);
        $mail->AddReplyTo('guimailxacnhan@gmail.com', 'quanlyduan901.000webhostapp.com'); //khi nguoi dung phan hoi se duoc gui den email nay
        $mail->Subject    = $title;// tieu de email 
        $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
        $mail->AddAddress($mTo, $nTo);
        // thuc thi lenh gui mail 
        if(!$mail->Send()) {
            echo 'Co loi!';
            
        } else {
            
            // echo "<p style='color:white'>mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả.</p> ";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/font.css">
    <title>TT SOCIAL</title>
    <style>
    .flex-doc {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        align-items: center;
    }

    .flex-ngang {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        justify-content: center
    }
    </style>
</head>

<body>
    <div class='flex-ngang animate__animated animate__zoomInUp'>

        <form style='margin-top:30vh;width:500px' action='xulydangki.php' method='POST'>
            <p style='color:red'><?php if(isset($_COOKIE['tbsai']))
                echo $_COOKIE['tbsai']; ?></p>
            <p align='center'><i style='color:rgb(255,255,255,0.6);font-size:14px'>*Vào email
                    <?php echo '<b>'.$_COOKIE['email']."</b>" ?> đã đăng ký để lấy mã xác minh quá 120s thì phải tạo
                    mới</i></p>
            <div class='flex-ngang'>
                <input type='text' style='background-color:rgb(255,255,255,0.5);border:none' maxlength="6"
                    class='form-control xacnhanmail' id='nhapma' name="nhapma" placeholder="Nhập mã" required />
            </div>

            <div class='flex-ngang'>
                <button class='btn w-75' style='margin-top:30px;background-color:rgb(159, 157, 226);color:white'>Xác
                    nhận</button>

            </div>
        </form>
    </div>
</body>

</html>