<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký</title>
</head>
<body>
    <h1>Đăng ký</h1>

    <?php
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "noi_that";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Xử lý đăng ký khi nút "Đăng ký" được nhấn
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hoten = $_POST["hoten"];
        $capbac = "khách"; // Mặc định cấp bậc là khách

        // Kiểm tra xem tên đăng nhập đã tồn tại chưa
        $check_sql = "SELECT id FROM user WHERE username = '$username'";
        $check_result = $conn->query($check_sql);
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
    ?>

    <form method="post" action="">
        <label for="hoten">Họ và tên:</label>
        <input type="text" id="hoten" name="hoten" required><br><br>

        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Đăng ký">
    </form>

    <p>Đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a>.</p>
</body>
</html>
