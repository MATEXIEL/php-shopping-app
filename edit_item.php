<?php
require 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = $_POST['item'];
    $cost = floatval($_POST['cost']);

    $stmt = $pdo->prepare("UPDATE items SET item = ?, cost = ? WHERE id = ? AND user_id = ?");
    $stmt->execute([$item, $cost, $id, $_SESSION['user_id']]);
    header("Location: dashboard.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM items WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $_SESSION['user_id']]);
$item = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ürün Düzenleme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body class="bg-custom">
<div class="container mt-4">
    <h2 class="heading">Ürünü Düzenle</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Ürün</label>
            <input type="text" name="item" class="form-control" value="<?= htmlspecialchars($item['item']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fiyat</label>
            <input type="number" name="cost" class="form-control" step="0.01" value="<?= $item['cost'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
        <a href="dashboard.php" class="btn btn-secondary">İptal</a>
    </form>
</div>
</body>
</html>
