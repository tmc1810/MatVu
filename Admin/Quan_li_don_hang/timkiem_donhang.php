<head>
    <title>Quản lý đơn hàng</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
    <div class="container">
        <!-- <h1>Kết quả tìm kiếm tài khoản</h1> -->
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
        
        $searchId = $_GET["ma_don_hang"];
        $searchName = $_GET["ho_ten"];
        
        $sql = "SELECT chi_tiet_don_hang.*, don_hang.ho_ten FROM chi_tiet_don_hang
        LEFT JOIN don_hang ON chi_tiet_don_hang.id = don_hang.id";
        
        if (!empty($searchId)) {
            $sql .= " AND ma_don_hang = '$searchId'";
        }
        
        if (!empty($searchName)) {
            $sql .= " AND ho_ten LIKE '%$searchName%'";
        }
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td width="5"><input type="checkbox"></td>';
                echo '<td>' . $row['ma_don_hang'] . '</td>';
                echo '<td>' . $row['ho_ten'] . '</td>';
                echo '<td>' . $row['thoi_gian_dathang'] . '</td>';
                echo '<td>' . $row['trangthai_donhang'] . '</td>';
                echo '<td>' . $row['trangthai_vanchuyen'] . '</td>';
                echo '<td>' . number_format($row['gia']). ' đ'; '</td>';
                echo '</tr>';
            }
        } else {
            echo "<tr>";
            echo "Không tìm thấy kết quả phù hợp.";
            echo "</tr>";
            
        }
        
        $conn->close();
        
        ?>
    </div>
</body>

</html>