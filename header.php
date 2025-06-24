<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button id="primary-nav-button" type="button">Menu</button>
                <a href="index.php"><div class="logo">
                    <img src="img/logo.png" alt="Venue Logo">
                </div></a>
                <nav id="primary-nav" class="dropdown cf">
                    <ul class="dropdown menu">
                        <li class='active'><a href="index.php">Beranda</a></li>
                        <li><a href="products.php">Produk</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li>
                            <a href="#">Lainnya</a>
                            <ul class="sub-menu">
                                <li><a href="about-us.php">Tentang Kami</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="testimonials.php">Testimoni</a></li>
                                <li><a href="terms.php">Terms</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php">Hubungi Kami</a></li>
                        <li style="float:right;">
                            <a href="#" data-toggle="modal" data-target="#cartModal">
                                <i class="fa fa-shopping-cart fa-2x"></i>
                                <span class="badge badge-pill badge-danger" style="background:red; color:white;">
                                    <?= isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
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
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Keranjang -->
<script>
function bindCartRemoveBtn(){
  $(document).off('click', '.btn-remove-cart').on('click', '.btn-remove-cart', function(e){
    e.preventDefault();
    var btn = $(this);
    var id = btn.data('id');
    $.get('remove_cart.php', {id: id}, function(res){
      if(res==='OK'){
        btn.closest('tr').remove();
        var total = 0;
        $('#cartModal tbody tr').each(function(){
          var subtotal = $(this).find('td').eq(4).text().replace(/[^\d]/g,'');
          total += parseInt(subtotal||0);
        });
        $('#cartModal tfoot th:last').text('Rp'+total.toLocaleString('id-ID'));
        var badge = $('.fa-shopping-cart').next('.badge');
        var qty = 0;
        $('#cartModal tbody tr').each(function(){
          qty += parseInt($(this).find('td').eq(3).text()||0);
        });
        badge.text(qty);
        if($('#cartModal tbody tr').length==0){
          $('#cartModal table').remove();
          $('#cartModal .btn-success').remove();
          $('#cartModal .modal-body').append('<div class="alert alert-info">Keranjang belanja kosong.</div>');
        }
      }
    });
  });
}
$(document).ready(function(){
  bindCartRemoveBtn();
});
</script> 