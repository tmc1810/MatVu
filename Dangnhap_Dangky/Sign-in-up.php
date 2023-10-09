<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../User/img/logo.png" />
    <title>BELLA VITA INTERIOR</title>
    <link rel="stylesheet" type="text/css" href="stylesign.css">
</head>
<body>  
    <?php    
    include './connect.php';
    // Xử lý đăng nhập khi nút "Đăng nhập" được nhấn
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $username = $_POST["email"];
        $matkhau = $_POST["matkhau"];
        
        // Truy vấn cơ sở dữ liệu để kiểm tra đăng nhập
        $sql = "SELECT id, cap_bac FROM user WHERE email = '$username' AND mat_khau = '$matkhau'";
        $result = $conn->query($sql);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $cap_bac = $row["cap_bac"];
            
            // Chuyển hướng người dùng dựa trên cấp bậc
            if ($cap_bac == "Quản trị") {
                header("Location: ../Admin/Bang_dieu_khien/index.php");
            } elseif ($cap_bac == "Khách") {
                header("Location: ../User/TuyetLan/index.php");
            } else {
                echo "Cấp bậc không hợp lệ";
            }
        } else {
            echo "Đăng nhập thất bại. Vui lòng kiểm tra tên đăng nhập và mật khẩu.";
        }
    }

    ?>
    <div class="container">
        <div class="content">
            <div class="logo"><img src="../User/img/logo.png" weight="80px" width="80px"/>
                <h1>BELLA VITA INTERIOR</h1>
                <div class="text-sci">
                    <h2>Welcome!<br><span> To their home.</span></h2>
                    <p>MAKE EVERYONE HAPPY WITH THE FINEST FURNITURE</p>
                </div>
            </div>
        </div>

        <div class="logreg-box">
            <div class="form-box login">
                <form method="post" action="#">
                    <h2>Đăng Nhập</h2>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPpJREFUSEvtleERgjAMhV+zQGAD3AQ3kUmQScRJYBPZoLBA8erRXgERKPCHk5+0yZf3EoLAwY84OD9OBJBSxkT0ABBttK1SSiVhGJY6j7WorutCCBFvTG7CK2a+9ABN07TdaQYg9QTlAG46lpk/xVsFBqAPPOyytrh5JgH6QEoZEZGuZk5NzsyJE/P6qQBABeDJzPcuaKr5vWZ2qgtj7aRFjveZAxmqGVY9UroEoFkjNfqlGcFh1e5gLAWYGKtmaX/WAqwapVRJRNbrqXH2Aaz6NP6AWbtGFu257Nq2LYMguPZWhZ5pIUS6w0b9vq5nNXteONEv09OB2bA3OsGVGU6yEvgAAAAASUVORK5CYII="/>
                            </span>
                            <input type="text" id="email" name="email" required>
                            <label for="username">Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQFJREFUSEvtldERgjAMhtMsELoBbIKTqJMok8gmuolsUMIAjRcPPc5CC5x6Ptin3jX9v79p0hr48DAf1odZAOdciYhbACjVkIg0IlJZay8pg0lA13U7ETlNCFVEdIxBooDe+bkXqLz3tc4RcQcAeqLce19Ya5spSBTQtu3ZGKNpCZwyszo/AEBNRPtVAGYW3UhEgRHnXI6IVwBoiKh4O0AFYwYewGiKUgKpdYV8H6CVY4w59JebKvPnuohcxnojOAEz68Xls5UHgQrJsmwz3DsGuFfO2vFacX9AkMl/ipLF9RMpWt1oYy/r2DOs36P+YIu6efZTkUzywoDkn7xQLwi/AYcUkRl3IN9GAAAAAElFTkSuQmCC"/>
                            </span>
                            <input type="password" id="matkhau" name="matkhau" required>
                            <label for="password">Password</label>
                        </div>

                        <button type="submit" class="btn"><input type="submit" style="color: #FFF; font-size: 25px;border: none;background-color: #be0000;" value="Đăng nhập"></button>

                        <div class="login-register">
                            <p>Bạn chưa có tài khoản? <a href="#" class="register-link">Đăng Ký</a></p>
                        </div>
                </form>
            </div>

            <div class="form-box register">
                <form  action="#" name="myForm">
                    <h1>Đăng Ký</h1>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAP9JREFUSEvFlOsNwjAMhO82gUmgm8AkwCSwCd2EMonRSU3VpmkcGir8q1Kj++zzg9g4uLE+igBmtgNwAXAC0AFoAdxI6jsbLsDMjgCeCRWJn0kKthglgBcAVZCKjuR+NcDMZMndcaHJVZGtwMyuvfc5hnqhd8nwAEv+j8XUh8dagLxXg7fpgbLKTJF+Z/3XA3eKekjYA1mmCCNavwfeInn/iyrwRGr2QON3ABCsGWuFk/H+ekz7xmrBlqYnTnrxbMwscqbGc2s2VSlA7vZ4gNltmgAKT4MHmZyOGCDfdeBqoiXZBIEYUGNP0JzYFAOsJvUha3LQ/e+i/aSaX4jkND45MFsZqs//kwAAAABJRU5ErkJggg=="/>
                            </span>
                            <input type="text" name="ho_ten" required>
                            <label>Name</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPpJREFUSEvtleERgjAMhV+zQGAD3AQ3kUmQScRJYBPZoLBA8erRXgERKPCHk5+0yZf3EoLAwY84OD9OBJBSxkT0ABBttK1SSiVhGJY6j7WorutCCBFvTG7CK2a+9ABN07TdaQYg9QTlAG46lpk/xVsFBqAPPOyytrh5JgH6QEoZEZGuZk5NzsyJE/P6qQBABeDJzPcuaKr5vWZ2qgtj7aRFjveZAxmqGVY9UroEoFkjNfqlGcFh1e5gLAWYGKtmaX/WAqwapVRJRNbrqXH2Aaz6NP6AWbtGFu257Nq2LYMguPZWhZ5pIUS6w0b9vq5nNXteONEv09OB2bA3OsGVGU6yEvgAAAAASUVORK5CYII="/>
                            </span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQFJREFUSEvtldERgjAMhtMsELoBbIKTqJMok8gmuolsUMIAjRcPPc5CC5x6Ptin3jX9v79p0hr48DAf1odZAOdciYhbACjVkIg0IlJZay8pg0lA13U7ETlNCFVEdIxBooDe+bkXqLz3tc4RcQcAeqLce19Ya5spSBTQtu3ZGKNpCZwyszo/AEBNRPtVAGYW3UhEgRHnXI6IVwBoiKh4O0AFYwYewGiKUgKpdYV8H6CVY4w59JebKvPnuohcxnojOAEz68Xls5UHgQrJsmwz3DsGuFfO2vFacX9AkMl/ipLF9RMpWt1oYy/r2DOs36P+YIu6efZTkUzywoDkn7xQLwi/AYcUkRl3IN9GAAAAAElFTkSuQmCC"/>
                            </span>
                            <input type="password" name="mat_khau"required>
                            <label>Password</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQFJREFUSEvtldERgjAMhtMsELoBbIKTqJMok8gmuolsUMIAjRcPPc5CC5x6Ptin3jX9v79p0hr48DAf1odZAOdciYhbACjVkIg0IlJZay8pg0lA13U7ETlNCFVEdIxBooDe+bkXqLz3tc4RcQcAeqLce19Ya5spSBTQtu3ZGKNpCZwyszo/AEBNRPtVAGYW3UhEgRHnXI6IVwBoiKh4O0AFYwYewGiKUgKpdYV8H6CVY4w59JebKvPnuohcxnojOAEz68Xls5UHgQrJsmwz3DsGuFfO2vFacX9AkMl/ipLF9RMpWt1oYy/r2DOs36P+YIu6efZTkUzywoDkn7xQLwi/AYcUkRl3IN9GAAAAAElFTkSuQmCC"/>
                            </span>
                            <input type="password" name="mat_khau "required>
                            <label>Nhập lại Password</label>
                        </div>

                        <input type="submit" value="Đăng Ký" onclick="validateForm()" class="btn">

                        <div class="login-register">
                            <p>Bạn đã có tài khoản? <a href="#" class="login-link">Đăng Nhập</a></p>
                        </div>
                </form>
            </div>
        </div>
    </div>

<script src="scriptsign.js"></script>
</body>
</html>