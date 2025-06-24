<?php
require_once __DIR__.'/admin/inc/db.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = null;
if ($id) {
    $res = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
    if ($row = mysqli_fetch_assoc($res)) {
        $product = $row;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?= $product ? htmlspecialchars($product['name']) : 'Produk Tidak Ditemukan' ?></title>
        
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
                        <h2><?= $product ? htmlspecialchars($product['name']) : 'Produk Tidak Ditemukan' ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="featured-places">
            <div class="container">
               <div class="row">
               <?php if($product): ?>
                  <div class="col-md-6 col-xs-12">
                    <div>
                      <img src="img/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="img-responsive wc-image" style="max-width:100%;height:350px;object-fit:contain;">
                    </div>
                    <br>
                    <?php
                    // Ambil gambar preview dari tabel product_images
                    $images = [];
                    $resImg = mysqli_query($conn, "SELECT image_name FROM product_images WHERE product_id=".$product['id']);
                    while($imgRow = mysqli_fetch_assoc($resImg)) {
                        $images[] = $imgRow['image_name'];
                    }
                    if ($images): ?>
                    <div class="row">
                      <?php foreach($images as $img): ?>
                        <div class="col-sm-4 col-xs-6">
                          <img src="img/<?= htmlspecialchars($img) ?>" alt="Preview" class="img-responsive" style="max-width:100%;height:100px;object-fit:cover;">
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                  </div>

                  <div class="col-md-6 col-xs-12">
                    <form id="addToCartForm" action="#" method="post" class="form">
                      <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                      <h2>
                        <?php if($product['discount_price'] && $product['discount_price'] < $product['price']): ?>
                            <small><del> Rp<?= number_format($product['price']) ?></del></small>
                            <strong class="text-primary">Rp<?= number_format($product['discount_price']) ?></strong>
                        <?php else: ?>
                            <strong class="text-primary">Rp<?= number_format($product['price']) ?></strong>
                        <?php endif; ?>
                      </h2>

                      <br>

                      <p class="lead">
                        <?= nl2br(htmlspecialchars($product['description'])) ?>
                      </p>

                      <br> 

                      <div class="row">
                        <div class="col-sm-4">
                            <label class="control-label">Quantity</label>

                            <div class="form-group">
                                <input type="number" name="quantity" class="form-control" placeholder="1" min="1" value="1">
                            </div>
                        </div>
                      </div>

                        <div class="blue-button">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </div>
                    </form>
                  </div>
                <?php else: ?>
                  <div class="col-12 text-center"><p>Produk tidak ditemukan.</p></div>
                <?php endif; ?>
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
    <script>
    $(document).ready(function(){
      $('#addToCartForm').on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        $.post('add_cart.php', form.serialize(), function(res){
          if(res.status==='OK'){
            // Update isi modal keranjang
            $('#cartModal .modal-body').html(res.html);
            // Update badge cart di header
            $('.fa-shopping-cart').next('.badge').text(res.qty);
            // Tampilkan modal keranjang
            $('#cartModal').modal('show');
            // Bind ulang tombol hapus
            if(typeof bindCartRemoveBtn === 'function') bindCartRemoveBtn();
          } else {
            alert('Gagal menambah ke keranjang!');
          }
        },'json');
      });
    });
    </script>
</body>
</html>