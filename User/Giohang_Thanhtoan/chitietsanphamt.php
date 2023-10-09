<?php
session_start();

// Một mảng chứa thông tin sản phẩm (ví dụ)
$product = array(
    'id' => 1,
    'name' => 'Sản phẩm mẫu',
    'price' => 949000000,
    'image' => '1.jpg' // Tên tệp hình ảnh sản phẩm
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['buy_now'])) {
        // Lấy số lượng từ trường nhập và thêm sản phẩm vào đơn hàng
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

        if ($quantity > 0) {
            $product['quantity'] = $quantity;

            // Thêm sản phẩm vào đơn hàng và chuyển đến trang thanh toán trực tiếp
            $_SESSION['order'] = array($product);
            header('Location: thanhtoan.php');
            exit();
        }
    } elseif (isset($_POST['add_to_cart'])) {
        // Lấy số lượng từ trường nhập và thêm sản phẩm vào giỏ hàng
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

        if ($quantity > 0) {
            $product['quantity'] = $quantity;

            // Thêm sản phẩm vào giỏ hàng
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            // Chuyển đến trang giỏ hàng
            header('Location: giohang.php');
            exit();
            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            $product_exists = false;
            foreach ($_SESSION['cart'] as $key => $cart_product) {
                if ($cart_product['id'] == $product['id']) {
                    // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng lên
                    $_SESSION['cart'][$key]['quantity'] += $quantity;
                    $product_exists = true;
                    break;
                }
            }

            //Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
            if (!$product_exists) {
                $_SESSION['cart'][] = $product;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
</head>
<body>
    <h1><?php echo $product['name']; ?></h1>
    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="200">
    <p>Giá: <?php echo $product['price']; ?> VNĐ</p>
    
    <form method="post">
        <label for="quantity">Số lượng:</label>
        <input type="number" name="quantity" value="1" min="1" required>
        <br>
        <input type="submit" name="buy_now" value="Mua ngay">
        <input type="submit" name="add_to_cart" value="Thêm vào giỏ hàng">
    </form>
</body>
</html>
