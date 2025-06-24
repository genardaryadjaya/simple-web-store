<?php
session_start();
require_once __DIR__.'/admin/inc/db.php';
header('Content-Type: application/json');
if(isset($_POST['product_id'])){
    $product_id = intval($_POST['product_id']);
    $quantity = max(1, intval($_POST['quantity'] ?? 1));
    $res = mysqli_query($conn, "SELECT * FROM products WHERE id=$product_id");
    if ($row = mysqli_fetch_assoc($res)) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['discount_price'] && $row['discount_price'] < $row['price'] ? $row['discount_price'] : $row['price'],
                'image' => $row['image'],
                'quantity' => $quantity
            ];
        }
        // Generate HTML isi modal keranjang
        ob_start();
        $cart = $_SESSION['cart'] ?? [];
        if($cart): ?>
        <table class="table table-bordered table-striped">
            <thead><tr><th>Gambar</th><th>Nama</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th>Aksi</th></tr></thead>
            <tbody>
            <?php $total = 0; foreach($cart as $item): $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; ?>
                <tr>
                    <td><img src="img/<?= htmlspecialchars($item['image']) ?>" width="100" style="object-fit:cover;max-height:80px;"></td>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td>Rp<?= number_format($item['price']) ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>Rp<?= number_format($subtotal) ?></td>
                    <td><button class="btn btn-danger btn-sm btn-remove-cart" data-id="<?= $item['id'] ?>">Hapus</button></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot><tr><th colspan="4" class="text-right">Total</th><th>Rp<?= number_format($total) ?></th></tr></tfoot>
        </table>
        <a href="checkout.php" class="btn btn-success">Checkout</a>
        <?php else: ?>
        <div class="alert alert-info">Keranjang belanja kosong.</div>
        <?php endif;
        $html = ob_get_clean();
        $qty = array_sum(array_column($cart, 'quantity'));
        echo json_encode(['status'=>'OK','html'=>$html,'qty'=>$qty]);
        exit();
    }
}
echo json_encode(['status'=>'ERROR']); 