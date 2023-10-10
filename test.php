<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "noi_that";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Khai báo biến để lưu thông báo
$registrationMessage = "";

// Xử lý đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $registrationMessage = "Email đã tồn tại. Vui lòng chọn email khác.";
    } else {
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Thêm thông tin người dùng vào cơ sở dữ liệu
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            // Đăng ký thành công, cập nhật thông báo
            $registrationMessage = "Đăng ký thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Đăng Ký</title>
</head>
<body>
    <h2>Đăng Ký</h2>
    <!-- Hiển thị thông báo đăng ký -->
    <script>
        <?php if (!empty($registrationMessage)): ?>
            alert("<?php echo $registrationMessage; ?>");
        <?php endif; ?>
    </script>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="register" value="Đăng Ký">
    </form>
</body>
</html>
