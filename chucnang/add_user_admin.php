<?php
// Biến kết nối toàn cục
global $conn;
// Hàm kết nối database
function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn){
        $conn = mysqli_connect('localhost','root', '','mp3') or die('Không thể kết nối đến database');

        // Thiết lập font chữ kết nối
        mysqli_set_charset($conn, 'utf8');
    }
}
// Hàm ngắt kết nối
function disconnect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn){
        mysqli_close($conn);
    }
}
function add_user($username, $password, $level)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Chống SQL Injection
    $username = addslashes($username);
    $password = addslashes($password);
    $level = addslashes($level);

    // Câu truy vấn thêm
    $sql = "INSERT INTO user_admin(username, password, level) VALUES
        ('$username','$password','$level')";

    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);

    return $query;
}

// Nếu người dùng submit form
if (!empty($_POST['add_user']))
{

    // Lay data
    $data['username']        = isset($_POST['username']) ? $_POST['username'] : '';
    $data['password']         = isset($_POST['password']) ? $_POST['password'] : '';
    $data['level']    = isset($_POST['level']) ? $_POST['level'] : '';

    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    $sql1 = "SELECT * from user_admin";
    $run_sql1 = mysqli_query($conn,$sql1);
    while ($row = mysqli_fetch_assoc($run_sql1))
    {
        var_dump($row);

        if ($row['username']==$data['username'])
        {
            echo "<script>alert('Username này đã tồn tại');window.location = 'http://localhost/baitapnhomphp/admin/index_user.php'</script>";
            die();
        }
    }

   //Username  bao gồm các ký tự chữ cái, chữ số
    //Độ dài 6-32 ký tự
    $pattern_username="/^[A-Za-z0-9]{6,32}$/";

//    Mật khẩu bao gồm các ký chữ cái, chữ số, ký tự đặc biệt, dấu chấm
//Bắt đầu bằng ký tự in hoa
//Độ dài 6-32 ký tự
    $pattern_password="/^([A-Z]){1}([\w_\]!@#$%^&*()]+){5,31}$/";

    // Validate thong tin và gắn cookie
    $errors = array();
    //Kiểm tra lỗi cho trường username

    //Nếu bỏ trống

    if (empty($data['username'])){
        $errors['username'] = 'Chưa nhập username';
        setcookie('username','Chưa nhập username',time()+1,"/");
        setcookie('username_sticky',$data['username'],time()+1,"/");
    }
    //Ngược lại kiểm tra độ dài username
    else if (!preg_match($pattern_username,$data['username']))
    {
        $errors['username'] = 'Username phải bao gồm các ký tự chữ cái, chữ số độ dài từ 6 đến 32 ký tự';
        setcookie('username','Username phải bao gồm các ký tự chữ cái, chữ số, độ dài từ 6 đến 32 ký tự',time()+1,"/");
        setcookie('username_sticky',$data['username'],time()+1,"/");
    }
    else
    //Nếu đúng trường này thì vẫn giữ lại username, vì các trường khác chưa chắc đã đúng
    {
        setcookie('username_sticky',$data['username'],time()+1,"/");
    }



    if (empty($data['password'])){
        $errors['password'] = 'Chưa nhập password';
        setcookie('password','Chưa nhập password',time()+1,"/");
    }
    //Ngược lại kiểm tra độ dài mật khẩu
    else if (!preg_match($pattern_password,$data['password']))
    {
        $errors['password'] = 'Mật khẩu phải từ 4 đến 9 kí tự';
        setcookie('password',"Mật khẩu phải bao gồm các ký chữ cái, chữ số, ký tự đặc biệt, dấu chấm \n Bắt đầu bằng ký tự in hoa\n Độ dài 6-32 ký tự",time()+1,"/");
    }

    if (empty($data['level'])){
        $errors['level'] = 'Chưa nhập level';
    }
    // Neu ko co loi thi insert
    if (!$errors){
        add_user(
            $data['username'], $data['password'], $data['level']

        );
        // Trở về trang danh sách
        header("location: ../admin/index_user.php");
    }
    else //Khi có errror
    header("location:../admin/add_user_admin_form.php");
}

disconnect_db();

?>