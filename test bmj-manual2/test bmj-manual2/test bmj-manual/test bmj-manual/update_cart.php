<?php
session_start();

if (isset($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $index => $qty) {
        if ($qty > 0) {
            $_SESSION['cart'][$index]['quantity'] = $qty;
        } else {
            unset($_SESSION['cart'][$index]);
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

header('Location: cart.php');
exit();
?>
