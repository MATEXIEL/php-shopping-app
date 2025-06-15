<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hoş Geldiniz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body class="bg-custom">
<div class="container mt-5 text-center">
    <h1 class="heading">Ortak Alışveriş ve Fatura Takip Sistemi</h1>
    <p class="subheading">Ürünlerinizi görün, masraflarınızı bölüşün.</p>
    <a href="login.php" class="btn btn-primary me-2">Giriş Yap</a>
    <a href="register.php" class="btn btn-success">Kayıt Ol</a>
</div>
</body>
</html>
