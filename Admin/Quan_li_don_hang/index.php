<head>
    <title>Quản lý đơn hàng</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
    <?php   
        include '../Main_QuanTri/nav.php';
        include '../Main_QuanTri/connect.php';
    ?>
    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2"><h5>Quản lý đơn hàng<h5></div>
                        <div class="p-2 ms-auto"><button class="btn btn-danger">Xóa</button></div>
                    </div>
                </div>
                <div class="accordion-body">
                    <div class="search-active-form" style="position: relative; margin-top: 10px;">
                        <div class="form-search">
                            <form action="timkiem_donhang.php" method="post">  
                                <input placeholder="Mã đơn hàng"  style="height:35px;" type="text" value="" />  
                                <input placeholder="Khách hàng" style="height:35px;" type="text" maxlength="100" /> 
                                <button class="btn bg-warning" type="submit" >Tìm kiếm</button> 
                                </form>
                            <br>
                            <table class="table table-bordered table-hover vertical-center">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>#</th>
                                        <th>Khách hàng</th>
                                        <th>Thời gian tạo</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Trạng thái vận chuyển</th>
                                        <th>Tổng cộng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT chi_tiet_don_hang.*, don_hang.ho_ten FROM chi_tiet_don_hang
                                        LEFT JOIN don_hang ON chi_tiet_don_hang.id = don_hang.id";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // Lặp qua mỗi hàng dữ liệu
                                            while ($row = $result->fetch_assoc()) {
                                                if ($row["trangthai_donhang"] !== "Hoàn thành" || $row["trangthai_vanchuyen"] !== "Đã giao hàng" || $row["trangthai_thanhtoan"] !== "Đã thanh toán" ) {
                                                    echo '<tr>';
                                                        echo '<td width="5"><input type="checkbox"></td>';
                                                        echo '<td name="ma_don_hang";>' . $row['ma_don_hang'] . '</td>';
                                                        echo '<td>' . $row['ho_ten'] . '</td>';
                                                        echo '<td>' . $row['thoi_gian_dathang'] . '</td>';
                                                        echo '<td>' . $row['trangthai_donhang'] . '</td>';
                                                        echo '<td>' . $row['trangthai_vanchuyen'] . '</td>';
                                                        echo '<td>' . number_format($row['gia']). ' đ'; '</td>';
                                                    echo '</tr>';
                                                }
                                            }
                                        } else {
                                            echo "Không có dữ liệu.";
                                        }
                                    ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./FrontEnd/style.js"></script>
</body>