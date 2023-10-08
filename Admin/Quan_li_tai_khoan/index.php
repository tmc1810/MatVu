<head>
    <title>Quản lý tài khoản</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
<?php   
    include '../Main_QuanTri/nav.php'
?>
    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2"><h5>Quản lý tài khoản<h5></div>
                        <div class="p-2 ms-auto"><a href="them_taikhoan.php" class="btn btn-primary">Thêm</a></div> 
                    </div>
                </div>
                <div class="accordion-body">
                    <form class="form-inline" id="yw0" action="/quantri/useradmin/useradmin/index" method="get">
                        <input class="" placeholder="id" style="height:35px;" name="UsersAdmin[user_id]" id="UsersAdmin_user_id" type="text" />    
                        <input class="" placeholder="Tên truy cập" style="height:35px;" name="UsersAdmin[user_name]" id="UsersAdmin_user_name" type="text" maxlength="100" />    
                        <input class="" placeholder="email" style="height:35px;" name="UsersAdmin[email]" id="UsersAdmin_email" type="text" maxlength="100" />    
                        <select class="" name="UsersAdmin[sex]" id="UsersAdmin_sex" style="height:35px;">
                            <option value="" selected="selected">Giới tính</option>
                            <option value="0">Chưa xác định</option>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>    
                        <button class="btn bg-warning" type="submit" >Tìm kiếm</button> 
                    </form>
                    <br>
                    <table class="table table-bordered table-hover vertical-center">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên truy cập</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>
                            <th>Giới tính</th>
                            <th>Cấp bậc</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Kết nối đến cơ sở dữ liệu
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "noi_that";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                            }

                            $sql = "SELECT id, ho_ten, mat_khau, email, gioi_tinh, cap_bac FROM user";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["ho_ten"] . "</td>";
                                    echo "<td>" . $row["mat_khau"] . "</td>"; // Thay thế mật khẩu nguyên văn bằng dấu sao hoặc dòng văn bản khác để che giấu nó
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["gioi_tinh"] . "</td>";
                                    echo "<td>" . $row["cap_bac"] . "</td>";
                                    echo "<td style='width: 100px;' align='center'><a class='fa-solid fa-pen-to-square' href='sua_taikhoan.php?id=" . $row["id"] . "'></a>&emsp;<a class='fa-solid fa-trash' href='xoa_taikhoan.php?id=" . $row["id"] . "'></a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Không tìm thấy dữ liệu.";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
