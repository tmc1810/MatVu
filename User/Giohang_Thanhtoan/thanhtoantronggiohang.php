<?php
    include './navbarweb.php';
?>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['place_order'])) {
    // Xử lý quá trình thanh toán và lưu thông tin đơn hàng
    // (Thêm mã xử lý thanh toán thực tế tại đây, chẳng hạn như sử dụng cổng thanh toán như PayPal hoặc Stripe)

    // Sau khi thanh toán thành công, bạn có thể xóa thông tin đơn hàng và chuyển hướng đến trang hoàn tất thanh toán
    unset($_SESSION['order']);
    header('Location: thank_you.php');
    exit();
}
?>
<div class="body-web"  style="position:relative;">
    <div class="container-sm pt-5">
        <div style="width: 700px; padding: 30px; margin-top:-30px;">
            <h4>THÔNG TIN KHÁCH HÀNG</h4>
            <hr style="margin-top:-5px;opacity: 5;">
            <form method="post">
              <input style="border: none; outline: none; border-bottom: 1px solid #adadad; width: 100%;padding: 10px;" type="text" placeholder="Vui lòng nhập họ tên"><br>
              <input style="border: none; outline: none; border-bottom: 1px solid #adadad; width: 100%;padding: 10px;" type="email " placeholder="Vui lòng nhập email"><br>
              <input style="border: none; outline: none; border-bottom: 1px solid #adadad; width: 100%;padding: 10px;" type="text" placeholder="Vui lòng nhập số điện thoại"><br>
              <select style="border: none; outline: none; border-bottom: 1px solid #adadad; width: 100%;padding: 10px;" id="city">
              <option value="" selected>Chọn tỉnh thành</option>           
              </select>
                      
              <select style="border: none; outline: none; border-bottom: 1px solid #adadad; width: 100%;padding: 10px;" id="district">
              <option value="" selected>Chọn quận huyện</option>
              </select>

              <select style="border: none; outline: none; border-bottom: 1px solid #adadad; width: 100%;padding: 10px;" id="ward">
              <option value="" selected>Chọn phường xã</option>
              </select>
              <input style="border: none; outline: none; border-bottom: 1px solid #adadad; width: 100%;padding: 10px;" type="text" placeholder="Vui lòng nhập địa chỉ"><br>
              <textarea rows="6" style="border: none; outline: none; border-bottom: 1px solid #adadad; width: 100%;padding: 10px;" type="address" placeholder="Ghi chú" ></textarea><br>
              <input type="checkbox">&ensp;Giao hàng cùng địa chỉ<br>
              <button class="btn btn-warning text-white" type="submit" name="place_order" style="font-weight: 700; width: 200px; margin-top:30px;">ĐẶT MUA</button></a>
            </form>
        </div>

        <div style="margin-left:700px;width: 400px;margin-top: -655px;">
          <h4 style="font-size: 20px;">ĐƠN HÀNG CỦA BẠN&ensp;<span style="color:#9A9A9A;">(</span><span style="color:#9A9A9A;" id="count"></span><span style="color:#9A9A9A;"> SẢN PHẨM)</p></span></h4>
          <hr style="margin-top:-5px;opacity: 5;">
          
          <?php
              $total = 0;
              foreach ($_SESSION['order'] as $product) {
                echo '<table class="table" id="myTable">';
                  echo '<tr style="font-size: 16px;">';
                    echo '<td>';
                      echo '<div class="card" style="border: none;">';
                        echo'<div class="row g-0">';

                          echo '<div class="col-md-2">';
                            echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '" width="54" height="57">';
                          echo '</div>';
                          
                          echo '<div class="col-md-7" style="margin-left:40px;">';
                            echo '<a>' . $product['name'] . '</a>';;
                            echo '<p>Số lượng: ' . $product['quantity'] . '</p>';
                          echo '</div>';
                    echo '<td>';
                      echo '<div>';
                        echo '<p>' . $product['price'] . ' VNĐ</p>';
                      echo '</div>';
                    echo '</td>';

                        echo '</div>';
                      echo '</div>';
                      echo '</td>';
                    echo '</td>';
                  echo '</tr>';
                echo '</table>';
                
                echo '<table class="table" id="myTable">';
                  echo '<tr>';
                  echo '<td>';
                    echo '<p style="font-size: 20px;margin-bottom: 1px;">TỔNG CỘNG:</p>';      
                  echo '</td>';
                  echo '<td>';
                    $subtotal = $product['price'] * $product['quantity'];
                    echo '<p style="color: #FFC000; font-weight: 500;margin-left: 80px;margin-bottom: 1px;">' . $subtotal . ' VNĐ</p>';      
                  echo '</td>';
                echo '</tr>';
              echo '</table>';
              }
              
          ?>

          <div>
            <h3>Phương thức vận chuyển</h3>
            <div style="font-size: 18px;">
                <input type="checkbox">
                <label> Giao hàng toàn quốc</label>
                <br>
                <input type="checkbox">
                <label> Giao hàng nội địa</label>
            </div>
          </div>
          <div style="height: 350px;">
      </div>
    </div>
    </div>
<div>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
var Parameter = {
  url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
  method: "GET", 
  responseType: "application/json", 
};
var promise = axios(Parameter);
promise.then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
  }
  citis.onchange = function () {
    district.length = 1;
    ward.length = 1;
    if(this.value != ""){
      const result = data.filter(n => n.Id === this.value);

      for (const k of result[0].Districts) {
        district.options[district.options.length] = new Option(k.Name, k.Id);
      }
    }
  };
  district.onchange = function () {
    ward.length = 1;
    const dataCity = data.filter((n) => n.Id === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
  };
}
</script>
<script>
        // Lấy thẻ bảng bằng ID
        var table = document.getElementById("myTable");

        // Lấy tất cả các thẻ <td> trong bảng
        var tdElements = table.getElementsByTagName("td");

        // Đếm số lượng thẻ <td>
        var tdCount = tdElements.length;

        tdCount--;

        // Hiển thị số lượng trong phần tử có ID "count"
        document.getElementById("count").textContent += tdCount;
    </script>
<?php
    include './footerweb.php'
?>




    
