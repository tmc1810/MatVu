<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="./bootstrap5/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png" />
    <!-- <link rel="stylesheet" href="styleweb.css"> -->
    <title>TMC INTERIOR</title>
    <style>
    
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    
    #header {
        background: #333;
        color: #FFF;
        padding: 10px 0;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
    }

    .navbar-brand img {
        max-width: 100%;
        height: auto;
    }

    .navbar ul.nav {
        display: flex;
        justify-content: center;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .navbar ul.nav li {
        margin-right: 20px;
    }

    .navbar ul.nav a {
        color: #FFF;
        text-decoration: none;
        font-size: 18px;
    }

    .navbar ul.nav a:hover {
        color: #E8B85B;
    }

    .navbar ul.nav:last-child {
        margin-right: 0;
    }

    .container {
        margin-top: 100px;
        padding: 20px;
        background-color: #FFF;
        border-radius: 5px;
        display: flex;
    }


    .list-group {
        width: 200px;
        margin-right: 20px;
    }

    .list-group-item.active {
        background-color: #E8B85B;
        color: #FFF;
    }


    .container1 {
        max-width: 800px;

    }


    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #E8B85B;
        color: #FFF;
    }


    footer {
        background: #333;
        color: #FFF;
        padding: 20px 0;
        text-align: center;
    }

    .footer .list {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .footer ul {
        list-style: none;
        padding: 0;
        margin: 0 20px;
    }

    .footer ul h5 {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .footer ul a {
        color: #9A9A9A;
        text-decoration: none;
    }

    .footer ul a:hover {
        color: #E8B85B;
    }


    footer h6 {
        margin-top: 20px;
        color: #FFF;
    }
    </style>
</head>

<body>
    <?php include './mainweb.php'; ?>

    <header class="navbar navbar-expand-lg bg-body-tertiary" id="header">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./img/logo.png" alt="Logo" width="120" height="80" class="d-inline-block align-text-top">
            </a>

            <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link" href="trangchu.php">TRANG CHỦ</a></li>
                <li class="nav-item"><a class="nav-link" href="sanpham.php">SẢN PHẨM</a></li>
                <li class="nav-item"><a class="nav-link" href="gioithieu.php">GIỚI THIỆU</a></li>
                <li class="nav-item"><a class="nav-link" href="lienhe.php">LIÊN HỆ</a></li>
            </ul>

            <ul class="nav justify-content-end">
                <li><a class="fa-solid fa-magnifying-glass" href="#"></a></li>
                <li><a class="fa-solid fa-cart-shopping" href="giohang.php"></a></li>
                <li><a class="fa-regular fa-user" href="thongtintaikhoan.php"></a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">Ngô Văn Bá</a>
            <a href="#" class="list-group-item list-group-item-action">Thông tin tài khoản</a>
            <a href="#" class="list-group-item list-group-item-action">Thay đổi mật khẩu</a>
            <a href="#" class="list-group-item list-group-item-action">Đơn hàng</a>
            <a href="#" class="list-group-item list-group-item-action">Thoát</a>
        </div>
        <div class="container1 ">
            <h2>Đơn hàng</h2>
            <table>
                <table class="tbale table-bordered">
                    <thead>
                        <tr>
                            <th>Thời gian tạo</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Không có dữ liệu</td>
                            <td>Không có dữ liệu</td>
                            <td>Không có dữ liệu</td>
                            <td>Không có dữ liệu</td>
                        </tr>
                    </tbody>
                </table>
            </table>
        </div>
    </div>
    <?php include './mainweb.php'; ?>
    <footer>
        <div class="container-fluid">
            <div class="list">
                <ul class="nav justify-content-lg-center">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h5>SẢN PHẨM</h5>
                        </li>
                        <li class="nav-item"><a href="#">Khóa thông minh</a></li>
                        <li class="nav-item"><a href="#">Bàn làm việc</a></li>
                        <li class="nav-item"><a href="#">Giường ngủ</a></li>
                        <li class="nav-item"><a href="#">Tủ quần áo</a></li>
                        <li class="nav-item"><a href="#">Sofa</a></li>
                    </ul>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h5>TRỢ GIÚP</h5>
                        </li>
                        <li class="nav-item"><a href="#">Hướng dẫn mua hàng</a></li>
                        <li class="nav-item"><a href="#">Hướng dẫn thanh toán</a></li>
                        <li class="nav-item"><a href="#">Hướng dẫn đổi trả</a></li>
                        <li class="nav-item"><a href="#">Chính sách giao hàng</a></li>
                    </ul>

                    <ul class="nav flex-column">
                        <li>
                            <h5>VỀ CHÚNG TÔI</h5>
                        </li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Tin tức</a></li>
                    </ul>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h5>FANPAGE</h5>
                        </li>
                        <li class="nav-item"><img src="./img/fanpage.png" width="100%"></li>
                    </ul>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h5>THEO DÕI CHÚNG TÔI</h5>
                        </li>
                        <li class="nav-item"><img src="./img/follow.png" width="100%"></li>
                    </ul>
                </ul>
            </div><br>
            <hr>
            <center>
                <h6 style="color: #FFF;">@Copy right 2023, Designed by Lanweb</h6>
            </center>
        </div>
        </div>
    </footer>
</body>

</html>