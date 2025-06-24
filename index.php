<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>ZeowStyle | Shopping Website</title>
        
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
    <section class="banner" id="top" style="background-image: url(img/homepage-banner-image-1920x700.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>One Stop Shopping Store.</h2>
                        <div class="blue-button">
                            <a href="contact.php">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <h4>Tentang ZeowStyle</h4>
                            <p>ZeowStyle adalah toko fashion wanita terpercaya yang berkomitmen menghadirkan produk-produk original berkualitas tinggi. Kami menyediakan berbagai koleksi tas, dompet, dan aksesoris wanita dengan desain kekinian, harga bersaing, serta pelayanan ramah dan profesional. Sejak berdiri, ZeowStyle selalu mengutamakan kepuasan pelanggan melalui proses belanja yang mudah, aman, dan pengiriman cepat ke seluruh Indonesia.</p>
                            <div class="blue-button">
                                <a href="about-us.php">Selengkapnya</a>
                            </div>

                            <br>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="img/about-1-720x480.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>Featured Products</span>
                            <h2>Produk Terbaru</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                require_once __DIR__.'/admin/inc/db.php';
                $featured = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC LIMIT 6");
                ?>
                <?php if(mysqli_num_rows($featured) > 0): while($row = mysqli_fetch_assoc($featured)): ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <img src="img/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>" style="max-width:100%;height:250px;object-fit:cover;">
                            </div>
                            <div class="down-content">
                                <h4><?= htmlspecialchars($row['name']) ?></h4>
                                <span>
                                    <?php if($row['discount_price'] && $row['discount_price'] < $row['price']): ?>
                                        <del><sup>Rp</sup><?= number_format($row['price']) ?> </del> <strong><sup>Rp</sup><?= number_format($row['discount_price']) ?></strong>
                                    <?php else: ?>
                                        <strong><sup>Rp</sup><?= number_format($row['price']) ?></strong>
                                    <?php endif; ?>
                                </span>
                                <p><?= htmlspecialchars($row['description']) ?></p>
                                <div class="text-button">
                                    <a href="product-details.php?id=<?= $row['id'] ?>">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; else: ?>
                    <div class="col-12 text-center"><p>Belum ada produk.</p></div>
                <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>Latest blog posts</span>
                            <h2>Blog & Tips Fashion Terbaru</h2>
                        </div>
                    </div> 
                </div> 
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/blog-1-720x480.jpg" alt="">
                                </div>

                                <div class="overlay-content">
                                 <strong title="Author"><i class="fa fa-user"></i> John Doe</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Posted on"><i class="fa fa-calendar"></i> 12/06/2020 10:30</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Views"><i class="fa fa-map-marker"></i> 115</strong>
                                </div>
                            </div>

                            <div class="down-content">
                                <h4>Tips Memilih Tas Wanita yang Stylish dan Fungsional</h4>
                                <p>Memilih tas wanita tidak hanya soal model, tapi juga fungsi dan kenyamanan. Simak tips memilih tas yang tepat untuk aktivitas harian Anda.</p>
                                <div class="text-button">
                                    <a href="blog-details-1.php">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/blog-2-720x480.jpg" alt="">
                                </div>

                                <div class="overlay-content">
                                 <strong title="Author"><i class="fa fa-user"></i> John Doe</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Posted on"><i class="fa fa-calendar"></i> 12/06/2020 10:30</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Views"><i class="fa fa-map-marker"></i> 115</strong>
                                </div>
                            </div>

                            <div class="down-content">
                                <h4>Inspirasi Dompet Wanita Modern</h4>
                                <p>Dompet wanita kini hadir dengan desain modern dan banyak slot kartu. Temukan inspirasi dompet kekinian di blog kami.</p>
                                <div class="text-button">
                                    <a href="blog-details-2.php">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/blog-3-720x480.jpg" alt="">
                                </div>

                                <div class="overlay-content">
                                 <strong title="Author"><i class="fa fa-user"></i> John Doe</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Posted on"><i class="fa fa-calendar"></i> 12/06/2020 10:30</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                 <strong title="Views"><i class="fa fa-map-marker"></i> 115</strong>
                                </div>
                            </div>

                            <div class="down-content">
                                <h4>Cara Merawat Tas Kulit Agar Awet</h4>
                                <p>Tas kulit butuh perawatan khusus agar tetap awet dan tampil baru. Ikuti langkah-langkah perawatan tas kulit di sini.</p>
                                <div class="text-button">
                                    <a href="blog-details-3.php">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content">
                <div class="inner">
                      <div class="section-heading">
                          <span>Hubungi Kami</span>
                          <h2>Kami Siap Membantu Kebutuhan Fashion Anda</h2>
                      </div>
                      <!-- Modal button -->

                      <div class="blue-button">
                        <a href="contact.php">Hubungi Kami</a>
                      </div>
                </div>
            </div>
        </section>

        <section class="popular-places" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>Testimonials</span>
                            <h2>Lorem ipsum dolor sit amet</h2>
                        </div>
                    </div> 
                </div> 

                <div class="owl-carousel owl-theme">
                    <div class="item popular-item">
                        <div class="thumb">
                            <img src="img/popular_item_1.jpg" alt="">
                            <div class="text-content">
                                <h4>Rina Setiawan</h4>
                                <span><em>"Tas yang saya beli kualitasnya bagus, bahan tebal dan jahitannya rapi. Akan order lagi untuk koleksi berikutnya."</em></span>
                            </div>
                            <div class="plus-button">
                                <a href="testimonials.php"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item popular-item">
                        <div class="thumb">
                            <img src="img/popular_item_2.jpg" alt="">
                            <div class="text-content">
                                <h4>Ayu Pratiwi</h4>
                                <span><em>"Pelayanan sangat ramah dan produk yang saya terima sesuai dengan foto. Pengiriman juga cepat, sangat puas belanja di sini!"</em></span>
                            </div>
                            <div class="plus-button">
                                <a href="testimonials.php"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item popular-item">
                        <div class="thumb">
                            <img src="img/popular_item_3.jpg" alt="">
                            <div class="text-content">
                                <h4>Dewi Lestari</h4>
                                <span><em>"Suka banget sama dompet barunya, modelnya kekinian dan banyak slot kartu. Terima kasih sudah membantu pilih produk!"</em></span>
                            </div>
                            <div class="plus-button">
                                <a href="testimonials.php"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item popular-item">
                        <div class="thumb">
                            <img src="img/popular_item_4.jpg" alt="">
                            <div class="text-content">
                                <h4>Siti Rahma</h4>
                                <span><em>"Belanja di sini selalu menyenangkan, admin fast response dan barang selalu dikemas rapi. Rekomendasi banget!"</em></span>
                            </div>
                            <div class="plus-button">
                                <a href="testimonials.php"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item popular-item">
                        <div class="thumb">
                            <img src="img/popular_item_5.jpg" alt="">
                            <div class="text-content">
                                <h4>Putri Anindya</h4>
                                <span><em>"Produk original, harga bersaing, dan pengiriman super cepat. Sukses terus untuk ZeowStyle!"</em></span>
                            </div>
                            <div class="plus-button">
                                <a href="testimonials.php"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item popular-item">
                        <div class="thumb">
                            <img src="img/popular_item_6.jpg" alt="">
                            <div class="text-content">
                                <h4>Maya Sari</h4>
                                <span><em>"Sudah langganan di ZeowStyle, koleksi produknya selalu update dan kualitasnya tidak pernah mengecewakan."</em></span>
                            </div>
                            <div class="plus-button">
                                <a href="testimonials.php"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
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
                                    <li><a href="about-us.php"><i class="fa fa-stop"></i>Tentang Kami</a></li>
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

    <!-- Modal Keranjang -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cartModalLabel">Keranjang Belanja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php $cart = $_SESSION['cart'] ?? []; ?>
            <?php if($cart): ?>
            <table class="table table-bordered table-striped">
                <thead><tr><th>Gambar</th><th>Nama</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr></thead>
                <tbody>
                <?php $total = 0; foreach($cart as $item): $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; ?>
                    <tr>
                        <td><img src="img/<?= htmlspecialchars($item['image']) ?>" width="100" style="object-fit:cover;max-height:80px;"></td>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td>Rp<?= number_format($item['price']) ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>Rp<?= number_format($subtotal) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot><tr><th colspan="4" class="text-right">Total</th><th>Rp<?= number_format($total) ?></th></tr></tfoot>
            </table>
            <a href="cart.php" class="btn btn-primary">Lihat Keranjang</a>
            <a href="checkout.php" class="btn btn-success">Checkout</a>
            <?php else: ?>
            <div class="alert alert-info">Keranjang belanja kosong.</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal Keranjang -->
</body>
</html>