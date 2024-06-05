<?php
// Pastikan koneksi ke database sudah dibuat sebelum
$include = 'config.php';

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil nilai 
$id_aturan = $_GET['id_aturan'];
$id_gejala = $_GET['id_gejala'];

// Query untuk menghapus data
$sql = "DELETE FROM detail_basis_aturan WHERE id_aturan='$id_aturan' AND id_gejala='$id_gejala'";
if ($conn->query($sql) === TRUE) {
    header("Location: ?page=aturan");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
