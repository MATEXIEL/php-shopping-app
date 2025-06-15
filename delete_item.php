<?php
require 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM items WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $_SESSION['user_id']]);
header("Location: dashboard.php");
exit();
