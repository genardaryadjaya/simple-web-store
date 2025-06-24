<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
$success = false;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $payment = trim($_POST['payment'] ?? '');
    if (!$name || !$email || !$phone || !$address || !$payment) {
        $errors[] = 'Semua field wajib diisi!';
    } elseif (!$cart) {
        $errors[] = 'Keranjang belanja kosong!';
    } else {
        // Simulasi proses order (bisa dikembangkan simpan ke database)
        $success = true;
        // Siapkan pesan WhatsApp
        $wa_number = '62895413451507';
        $wa_message = "Halo Admin ZeowStyle, saya ingin order:%0A";
        $wa_message .= "Nama: $name%0A";
        $wa_message .= "Email: $email%0A";
        $wa_message .= "No. HP: $phone%0A";
        $wa_message .= "Alamat: $address%0A";
        $wa_message .= "Metode Pembayaran: $payment%0A";
        $wa_message .= "Pesanan:%0A";
        foreach($cart as $item) {
            $wa_message .= "- ".$item['name']." x".$item['quantity']." (Rp".number_format($item['price']).")%0A";
        }
        $wa_message .= "Total: Rp".number_format(array_sum(array_map(function($i){return $i['price']*$i['quantity'];}, $cart)))."%0A";
        $_SESSION['cart'] = [];
        echo "<script>window.location.href='https://wa.me/$wa_number?text=$wa_message';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>PHPJabbers.com | Free Shopping Website Template</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/style.css">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
<?php include 'header.php'; ?>
    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-1-1920x300.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <h4>Ringkasan Belanja</h4>
                        <?php if($cart): ?>
                        <table class="table table-bordered table-striped">
                            <thead><tr><th>Nama</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr></thead>
                            <tbody>
                            <?php $total = 0; foreach($cart as $item): $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; ?>
                                <tr>
                                    <td><?= htmlspecialchars($item['name']) ?></td>
                                    <td>Rp<?= number_format($item['price']) ?></td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td>Rp<?= number_format($subtotal) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot><tr><th colspan="3" class="text-right">Total</th><th>Rp<?= number_format($total) ?></th></tr></tfoot>
                        </table>
                        <?php else: ?>
                        <div class="alert alert-info">Keranjang belanja kosong.</div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <h4>Data Pemesan</h4>
                        <?php if($success): ?>
                            <div class="alert alert-success">Checkout berhasil! Terima kasih sudah berbelanja di ZeowStyle.<br>Order Anda sedang diproses.</div>
                            <a href="products.php" class="btn btn-primary">Kembali Belanja</a>
                        <?php else: ?>
                            <?php if($errors): ?><div class="alert alert-danger"><?= implode('<br>', $errors) ?></div><?php endif; ?>
                            <form method="post">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="text" name="phone" class="form-control" required value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="address" class="form-control" required><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Metode Pembayaran</label>
                                    <select name="payment" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="bank" <?= (($_POST['payment'] ?? '')=='bank')?'selected':''; ?>>Transfer Bank</option>
                                        <option value="cod" <?= (($_POST['payment'] ?? '')=='cod')?'selected':''; ?>>COD</option>
                                        <option value="qris" <?= (($_POST['payment'] ?? '')=='qris')?'selected':''; ?>>QRIS</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Proses Checkout</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-veno">
                        <div class="logo">
                            <img src="img/footer_logo.png" alt="Venue Logo">
                        </div>
                        <p>Toko fashion wanita terpercaya, menyediakan produk original dengan kualitas terbaik. Pelayanan ramah, harga bersaing, dan pengiriman cepat ke seluruh Indonesia. Kepuasan pelanggan adalah prioritas utama kami.</p>
                        <ul class="social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="useful-links">
                        <div class="footer-heading">
                            <h4>Tautan Penting</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="index.php"><i class="fa fa-stop"></i>Beranda</a></li>
                                    <li><a href="about.php"><i class="fa fa-stop"></i>Tentang Kami</a></li>
                                    <li><a href="contact.php"><i class="fa fa-stop"></i>Kontak</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="products.php"><i class="fa fa-stop"></i>Produk</a></li>
                                    <li><a href="testimonials.php"><i class="fa fa-stop"></i>Testimoni</a></li>
                                    <li><a href="blog.php"><i class="fa fa-stop"></i>Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-info">
                        <div class="footer-heading">
                            <h4>Informasi Kontak</h4>
                        </div>
                        <p><i class="fa fa-map-marker"></i> Kauman, Jepara, Jawa Tengah.</p>
                        <ul>
                            <li><span>Phone:</span><a href="#">+62 895-4134-51507</a></li>
                            <li><span>Email:</span><a href="#">zeow_style@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <p>Copyright © 2025 ZeowStyle</p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>