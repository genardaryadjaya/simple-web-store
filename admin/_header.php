<?php
if (session_status() === PHP_SESSION_NONE) session_start();
// Redirect ke halaman login jika belum login
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontAwesome.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body { background-color: #f8f9fa; }
        .card-title { font-weight: 600; }
        .btn-sm i { margin-right: 5px; }
        .navbar-dark .navbar-brand span { color: #ffc107; font-weight: normal; }
        .table-responsive .img-thumbnail { width: 80px; height: 80px; object-fit: cover; }
        
        /* Perbaikan Navbar */
        .navbar-brand { font-size: 3rem; font-weight: 500; }
        .navbar .nav-item { margin: 0 0.4rem; }
        .navbar .nav-link { font-size: 1.8rem; padding-top: 0.9rem; padding-bottom: 0.9rem; }
        .navbar .nav-link i { margin-right: 7px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php"><b>ZeowStyle</b> Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="adminNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="products.php"><i class="fa fa-shopping-bag"></i> Produk</a></li>
        <li class="nav-item"><a class="nav-link text-warning" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html> 