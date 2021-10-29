<?php include("../include/ketnoi.php");  ?>
<!-- Gắn hàm kiểm tra level admin vào?-->
<?php include("../chucnang/kiemtra_level_admin.php");
//Từ level 2 trở lên được phép vào
kiemtra_level_admin(2);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head Tag -->
<?php include('head.php'); ?>
<script>
    var createAllErrors = function() {
        var form = $( this ),
            errorList = $( "ul.errorMessages", form );

        var showAllErrorMessages = function() {
            errorList.empty();

            // Find all invalid fields within the form.
            var invalidFields = form.find( ":invalid" ).each( function( index, node ) {

                // Find the field's corresponding label
                var label = $( "label[for=" + node.id + "] "),
                    // Opera incorrectly does not fill the validationMessage property.
                    message = node.validationMessage || 'Invalid value.';

                errorList
                    .show()
                    .append( "<li><span>" + label.html() + "</span> " + message + "</li>" );
            });
        };

        // Support Safari
        form.on( "submit", function( event ) {
            if ( this.checkValidity && !this.checkValidity() ) {
                $( this ).find( ":invalid" ).first().focus();
                event.preventDefault();
            }
        });

        $( "input[type=submit], button:not([type=button])", form )
            .on( "click", showAllErrorMessages);

        $( "input", form ).on( "keypress", function( event ) {
            var type = $( this ).attr( "type" );
            if ( /date|email|month|number|search|tel|text|time|url|week/.test ( type )
                && event.keyCode == 13 ) {
                showAllErrorMessages();
            }
        });
    };

    $( "form" ).each( createAllErrors );
</script>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- include sidebar-->
        <?php include('sidebar.php'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column w-100">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Page Heading -->
                    <div style='width:100%'>
                        <span class="h3 mb-4 text-gray-800">Thêm admin mới</span>
                        <div style='float:right'><span
                                style='padding-right:20px;color:black'><b>Chào,<?php echo $_SESSION['username']; ?></b></span><a
                                href="../chucnang/xuly_logout_admin.php"><button class='btn btn-warning'>Đăng
                                    Xuất</button></a></div>
                    </div>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content-->
                <div class="container-fluid">
                    <form action="../chucnang/add_user_admin.php" method="post">
                        <div class="form-group">
                            <label>Username *</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" autofocus
                                required
                                   oninvalid="this.setCustomValidity('Username không được để trống')" oninput="setCustomValidity('')"
                            />
                            <?php if (!empty($errors['username'])) echo $errors['username']; ?>

                        </div>
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" autofocus
                                   required
                                   oninvalid="this.setCustomValidity('Password không được để trống')" oninput="setCustomValidity('')" />
                            <?php if (!empty($errors['password'])) echo $errors['password']; ?>
                        </div>

                        <div class="form-group">
                            <select name="level">
                                <option value="1">Level 1</option>
                                <option value="2">Level 2</option>
                            </select>
                        </div>
                        <input type="submit" name="add_user" class="btn btn-success btn-block" value="Save Nhạc">
                    </form>
                </div>
            </div>
            <?php  include ('footer.php'); ?>
            <!-- /.container-fluid -->
        </div>
    </div>
    <!-- End of Main Content -->
    <!--Footer -->

</body>

</html>