<?php
session_start();

if (isset($_GET['index'])) {
    $index = (int)$_GET['index'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

header('Location: cart.php');
exit();
?>
