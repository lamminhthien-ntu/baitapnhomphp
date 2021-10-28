<!--Connect MySQL Database -->
<?php include('../include/ketnoi.php') ?>
<!--Headder HTML -->
<?php include('../include/head.php') ?>
<!-- Login Processing -->
<?php include('../chucnang/xuly_login_admin.php'); ?>
<head>
    <!-- Login CSS -->
    <link rel="stylesheet" href="css/login2.css">
</head>

<?php

if (isset($_SESSION['login_error']))
{
    echo $_SESSION['login_error'];


    //Xoá cookie login_error với value giả là "" và thời gian bị đẩy lùi về quá khứ
    //Time() là hàm lấy thời gian hiện tại
    setcookie('login_error',"",time()-6000);
}
?>
<body>

<div class="container">

    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Đăng nhập</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="../chucnang/xuly_login_admin.php">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="username" name="username">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" name="password">
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn" name="but_submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>