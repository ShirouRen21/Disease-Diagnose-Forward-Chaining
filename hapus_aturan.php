<?php
include 'config.php'; 

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil nilai dari URL
$id_aturan = $_GET['id'];

// Query untuk menghapus detail basis aturan
$sql = "DELETE FROM detail_basis_aturan WHERE id_aturan='$id_aturan'";
$conn->query($sql);

// Query untuk menghapus basis aturan
$sql = "DELETE FROM basis_aturan WHERE id_aturan='$id_aturan'";
$conn->query($sql);

$conn->close();

// Redirect ke halaman aturan
header("Location: ?page=aturan");
exit();
?>
