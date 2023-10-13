<head>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
    <title>BELLA VITA INTERIOR</title>
    <style>

    body {
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }


    .list-group {
        width: 200px;
        margin-right: 20px;
    }

    .list-group-item.active {
        background-color: #E8B85B;
        color: #FFF;
    }


    form {
        max-width: 800px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }


    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="tel"],
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #CCC;
        border-radius: 5px;
        font-size: 16px;
    }


    button[type="submit"] {
        grid-column: span 2;
        width: 100%;
        background-color: #E8B85B;
        color: #FFF;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #FFA500;
    }
    </style>
</head>

<body>
<div style="position: absolute;width: 1000px;height: 400px;background-color: #FFF; margin-left: 650px;margin-top: 150px;">
        <div class="subcontainer ">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <h2 style="font-weight: 400;">Thông tin tài khoản</h2>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label for="fullname">Họ và tên</label>
                            <input type="text" id="fullname" value="Ngô Văn Bá">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" value="tmc10182k3@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="dob">Ngày sinh</label>
                            <input type="date" id="dob">
                        </div>
                        <div class="form-group">
                            <label for="gender">Giới tính</label>
                            <select id="gender">
                                <option value="male">Nam</option>
                                <option value="female">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" id="address">
                        </div>
                        <div class="form-group" style="padding-bottom: 20px;">
                            <button type="submit">Cập nhật</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
</div>
        <?php 
        include 'formthongtin.php';
    ?>
</body>