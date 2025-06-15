<?php
require 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = $_POST['item'];
    $cost = floatval($_POST['cost']);
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO items (user_id, item, cost) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $item, $cost]);
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ürün Ekleme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body class="bg-custom">
<div class="container mt-4">
    <h2 class="heading">Yeni Ürün Ekle</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Ürün</label>
            <input type="text" name="item" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fiyat</label>
            <input type="number" name="cost" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Ekle</button>
        <a href="dashboard.php" class="btn btn-secondary">Geri</a>
    </form>
</div>
</body>
</html>
