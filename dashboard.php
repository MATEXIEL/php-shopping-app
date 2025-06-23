<?php
require 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$items = $pdo->prepare("SELECT * FROM items WHERE user_id = ? ORDER BY created_at DESC");
$items->execute([$user_id]);
$items = $items->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kontrol Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body class="bg-custom">
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="heading">Hoş geldiniz, <?= htmlspecialchars($_SESSION['username']) ?></h2>
        <a href="logout.php" class="btn btn-danger">Çıkış Yap</a>
    </div>

    <h4 class="subheading mt-4">Alışveriş Listesi & Masraflar</h4>
    <a href="add_item.php" class="btn btn-success mb-3">Yeni Ürün Ekle</a>
    <table class="table table-bordered custom-table">
        <thead class="table-dark">
            <tr>
                <th>Ürün</th>
                <th>Fiyat</th>
                <th>Tarih</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['item']) ?></td>
                    <td>$<?= number_format($item['cost'], 2) ?></td>
                    <td><?= $item['created_at'] ?></td>
                    <td>
                        <a href="edit_item.php?id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Düzenle</a>
                        <a href="delete_item.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
