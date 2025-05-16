<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Keranjang Belanja</title>
</head>
<body>

<h1>Keranjang Anda</h1>

<?php if (!empty($_SESSION['cart'])): ?>
  <form action="update_cart.php" method="post">
    <table border="1">
      <tr>
        <th>Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Aksi</th>
      </tr>
      <?php
      $grand_total = 0;
      foreach ($_SESSION['cart'] as $index => $item):
          $total = $item['price'] * $item['quantity'];
          $grand_total += $total;
      ?>
      <tr>
        <td><?= htmlspecialchars($item['product_name']) ?></td>
        <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
        <td>
          <input type="number" name="quantity[<?= $index ?>]" value="<?= $item['quantity'] ?>" min="1">
        </td>
        <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
        <td>
          <a href="remove_from_cart.php?index=<?= $index ?>">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
    <p>Total Belanja: Rp <?= number_format($grand_total, 0, ',', '.') ?></p>
    <button type="submit">Update Keranjang</button>
  </form>
<?php else: ?>
  <p>Keranjang kosong.</p>
<?php endif; ?>

<br>
<a href="index.php">Kembali ke Produk</a>

</body>
</html>
