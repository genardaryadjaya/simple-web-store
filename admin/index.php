<?php
// Halaman login admin sederhana
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header('Location: dashboard.php');
    exit();
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    // Username dan password default (bisa diganti dengan database nanti)
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>body{background:#f5f5f5;} .login-box{max-width:420px;margin:80px auto;padding:36px 32px 32px 32px;background:#fff;border-radius:12px;box-shadow:0 0 16px #b3c6e0;}</style>
</head>
<body>
<div class="login-box text-center">
  <img src="https://ui-avatars.com/api/?name=Admin&background=2453a7&color=fff&size=80" class="mb-3 rounded-circle shadow" alt="Admin">
  <h2 class="mb-3" style="font-size:2rem;font-weight:600;">Login Admin</h2>
  <?php if($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
  <form method="post">
    <div class="form-group mb-3">
      <label style="font-size:1.1rem;font-weight:500;">Username</label>
      <input type="text" name="username" class="form-control form-control-lg" required autofocus>
    </div>
    <div class="form-group mb-4">
      <label style="font-size:1.1rem;font-weight:500;">Password</label>
      <input type="password" name="password" class="form-control form-control-lg" required>
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block px-5" style="font-size:1.15rem;">Login</button>
  </form>
</div>
</body>
</html> 