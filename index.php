<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'qlsv');
mysqli_set_charset($conn, "utf8");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Quản lý sinh viên UTT</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css?v=1.0" />
</head>

<body>
  <!-- 'start thực hiện kiểm tra dữ liệu người dùng nhập ở form đăng nhập' -->
  <?php
  if (isset($_POST["login"])) {
    $tk = $_POST["username"];
    $mk = $_POST["passlg"];
    $rows = mysqli_query($conn, "
select * from users where username = '$tk' and pass = '$mk'
");
    $count = mysqli_num_rows($rows);
    if ($count == 1) {
      $_SESSION["loged"] = true;
      header("location:index.php?page=admin");
      $_SESSION['user'] = $_POST["username"];
      setcookie("success", "!", time() + 1, "/", "", 0);
    } else {
      header("location:index.php?page=login");
      setcookie("error", "!", time() + 1, "/", "", 0);
    }
  }
  ?>
  <!-- 'end thực hiện kiểm tra dữ liệu người dùng nhập ở form đăng nhập' -->

  <?php
  if (isset($_COOKIE["error"])) {
    $message = "Sai tài khoản hoặc mật khẩu! Vui lòng đăng nhập lại.";
    echo "<script type='text/javascript'>
alert('$message');
</script>";
  ?>
  <?php } ?>

  <?php
  if (isset($_COOKIE["success"])) {
    $message = "Đăng nhập thành công!";
    echo "<script type='text/javascript'>
alert('$message');
</script>";
    echo "<script language='javascript'>
document.getElementById('panel').style.display = 'none';
</script>";
  ?>
  <?php } ?>

  <?php
  if ($_GET["page"] && $_GET["page"] == "admin")
    include "admin.php";
  if ($_GET["page"] && $_GET["page"] == "login")
    include "login.php";
  ?>
</body>

</html>
<?php
	$conn = mysqli_connect('localhost','root','','qlsv');
	mysqli_set_charset($conn,"utf8");
    //session_start();
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE username = '$user'";
    $query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="styleAdmin.css?v=1.0">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Quản lý sinh viên UTT</title>
</head>

<body>
    <header>
        <div class="title">
            <div class="Group1">
                <div class="logo">
                    <img src="./images/bf1e7892c5d69465c57d7d1397026e23.jpg"
                         alt="">
                </div>
                <div class="img-content">
                    <img src="./images/LOGOUTT.png"
                         alt="">
                </div>
            </div>
        </div>
        <div class="title2">
            <h2>Hệ thống quản lý sinh viên</h2>
        </div>
    </header>
    <nav>
        <div class="group-user">
            <p><?php echo $user ?></p>
            <ul class="group-user-child">
                <li><a class="logout"
                       href="./login.php">Đăng xuất</a></li>
            </ul>
        </div>
    </nav>
    <section>
        <div class="section-contain">
            <div id="menu">
                <ul>
                    <li>
                        <a href="./index.php?page=admin"><i class="fa-solid fa-house"></i>Trang chủ</a>
                    </li>
                    <li>
                        <a href="./quanlysinhvien/showsinhvien.php"><i class="fa-solid fa-graduation-cap"></i>Sinh
                            viên</a>
                    </li>
                    <li class="more-func">
                        <a href="./quanlylop/dslop.php">
                            <i class="fa-solid fa-building-columns"></i> Lớp
                        </a>
                        <ul class="more-func-child nn">
                            <a href=""></a>
                            <li><a href="./quanlylop/dslop.php">Danh sách lớp</a></li>
                            <li><a href="./quanlylop/xetlop.php">Nhập học</a></li>
                        </ul>
                    </li>

                    <li class="more-func">
                        <a href="./danhgiasv/dskhenthuong.php">
                            <i class="fa-solid fa-user-graduate"></i>
                            Đánh giá sinh viên
                            <div class="func-icon-right">
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                            <div class="func-icon-down">