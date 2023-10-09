<?php
    include '../Main_NguoiDung/navbarweb.php'
?>
<?php
session_start();

if (!isset($_SESSION['order']) || empty($_SESSION['order'])) {
    header('Location: chitietsanphamg.php');
    exit();
}

?>
<?php
$total = 0;
foreach ($_SESSION['order'] as $product) {
echo '<div class="body-web">';
echo '<div class="container pt-5">';
echo '<table class="table table-hover">';
echo '<thead>';
echo '<tr style="font-size:20px;">';
echo '<th>Sản phẩm</th>';
echo '<th>Số lượng</th>';
echo '<th>Giá tiền</th>';
echo '<th><th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
echo '<tr>';
echo '<td>';
echo  '<div class="card" style="border: none;">';
echo  '<div class="row g-0">';
echo '<div class="col-md-3">';
echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '" width="115" height="110">';
echo '</div>';
echo '<div class="col-md-4" style="margin-top: 45px;font-size: 20px;">';
echo '<a>' . $product['name'] . '</a>';;
echo '</div>';
echo '</div>';
echo '</div>';
echo '</td>';
echo '<td>';
echo '<div style="margin-top: 40px;">';
echo '<button class="btnDecrease">-</button>';
echo '<input style="width: 20px; text-align: center;" type="text" min="0" value="' . $product['quantity'] . '" class="quantity">';
echo '<button class="btnIncrease">+</button>';
echo '</div>';
echo '</td>';
echo '<td>';
echo '<p style="margin-top: 45px;">' . $product['price'] .' VNĐ</p>';
echo '</td>';
echo '<td><a class="fa-solid fa-trash" style="color: black; margin-top: 40px; text-direction:none;" href="#"></a></td>';
echo '</tr>';
echo '</tbody>';
echo '</table>';
echo '<div style="margin-left: 800px;">';
echo '<div style="display: flex;justify-content: space-between;background-color:rgba(197, 198, 199, 0.741); width: 400px; height: 50px;padding:12px;">';
echo '<table id="myTable">';
echo '<tr>';
echo '<td>';
echo '<p style="font-size: 20px;margin-bottom: 1px;">TỔNG CỘNG:</p>';      
echo '</td>';
echo '<td>';
$subtotal = $product['price'] * $product['quantity'];
echo '<p style="color: #FFC000; font-weight: 500;margin-left: 120px;margin-bottom: 1px;">' . $subtotal . ' VNĐ</p>';      
echo '</td>';
echo '</tr>';
echo '</table>';
echo '</div>';
echo '<br>';
echo '<a href="thanhtoantronggiohang.php"><button class="btn btn-warning text-white" style="font-weight: 350; width: 400px;">XÁC NHẬN VÀ TIẾP TỤC</button></a>';
echo '</div>';
echo '<br>';
echo '</div>';
echo '</div>';
}
?>
  
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

