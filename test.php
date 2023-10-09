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

// Xử lý đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Truy vấn thông tin người dùng từ cơ sở dữ liệu
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["mat_khau"])) {
            if ($row["cap_bac"] == "Quản Trị") {
                // Đăng nhập thành công, chuyển hướng tới trang quản trị
                header("Location: admin.php");
                exit();
            } else {
                // Đăng nhập thành công, chuyển hướng tới trang khách
                header("Location: customer.php");
                exit();
            }
        } else {
            echo "Sai mật khẩu.";
        }
    } else {
        echo "Người dùng không tồn tại.";
    }
}

// Xử lý đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $role = $_POST["role"]; // Cấp bậc của người dùng

    // Kiểm tra xem hai trường mật khẩu có khớp nhau không
    if ($password !== $confirmPassword) {
        echo "Mật khẩu và mật khẩu xác nhận không khớp.";
    } else {
        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Email đã tồn tại. Vui lòng chọn email khác.";
        } else {
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Thêm thông tin người dùng vào cơ sở dữ liệu
            $sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$hashed_password', '$role')";
            if ($conn->query($sql) === TRUE) {
                echo "Đăng ký thành công!";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Đăng Nhập và Đăng Ký</title>
</head>
<body>
    <h2>Đăng Nhập</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="login" value="Đăng Nhập">
    </form>

    <h2>Đăng Ký</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="hoten">Họ tên:</label>
        <input type="text" name="hoten" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required><br><br>

        <label for="confirm_password">Xác nhận mật khẩu:</label>
        <input type="password" name="confirm_password" required><br><br>

        <input type="submit" name="register" value="Đăng Ký">
    </form>
</body>
</html>
