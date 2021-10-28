<?php
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:../admin/login_form.php"); //to redirect back to "login_form.php" after logging out
exit();
?>