<?php
session_start();

$product_name = $_POST['product_name'];
$price = $_POST['price'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$found = false;

// Cek kalau produk sudah ada di keranjang, tambahkan quantity
foreach ($_SESSION['cart'] as &$item) {
    if ($item['product_name'] === $product_name) {
        $item['quantity']++;
        $found = true;
        break;
    }
}

if (!$found) {
    $_SESSION['cart'][] = [
        'product_name' => $product_name,
        'price' => $price,
        'quantity' => 1
    ];
}

header('Location: cart.php');
exit();
?>
