<?php include 'config.php'; ?>
<h1>Cửa hàng Demo</h1>
<p>Thử nhập ID sản phẩm vào URL: <code>?id=1</code></p>

<?php
$id = $_GET['id']; 
$query = "SELECT name, price, description FROM products WHERE id = $id";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<h3>Sản phẩm: " . $row['name'] . "</h3>";
        echo "Giá: " . $row['price'] . " VNĐ<br>";
        echo "Mô tả: " . $row['description'] . "<hr>";
    }
} else {
    echo "Không tìm thấy sản phẩm hoặc lỗi SQL: " . mysqli_error($conn);
}
?>