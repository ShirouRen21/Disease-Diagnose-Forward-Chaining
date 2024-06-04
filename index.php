<!-- koneksi database -->
<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/datatables.min.css">
  <link rel="stylesheet" href="assets/css/all.css">
  <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
</head>

<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-sm bg-primary bg-gradient navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?page=gejala">Gejala</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?page=penyakit">Penyakit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?page=aturan">basis aturan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">konsultasi</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5 mb-2">
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : "";
    $action = isset($_GET['action']) ? $_GET['action'] : "";

    if ($page == "") {
      include "welcome.php";
    } elseif ($page == "gejala") {
      if ($action == "") {
        include "gejala.php";
      } elseif ($action == "tambah") {
        include "tambah_gejala.php";
      } elseif ($action == "update") {
        include "update_gejala.php";
      } else {
        include "hapus_gejala.php";
      }
    } elseif ($page == "penyakit") {
      if ($action == "") {
        include "penyakit.php";
      } elseif ($action == "tambah") {
        include "tambah_penyakit.php";
      } elseif ($action == "update") {
        include "update_penyakit.php";
      } else {
        include "hapus_penyakit.php";
      }
    } elseif ($page == "aturan") {
      if ($action == "") {
        include "aturan.php";
      } elseif ($action == "tambah") {
        include "tambah_aturan.php";
      } elseif ($action == "detail") {
        include "detail_aturan.php";
      } elseif ($action == "update") {
        include "update_aturan.php";
      } else {
        include "hapus_aturan.php";
      }
    } else {
      include "NAMA_HALAMAN";
    }
    ?>
  </div>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery-3.7.0.min.js"></script>
  <script src="assets/js/datatables.min.js"></script>
  <script src="assets/js/all.js"></script>
  <script src="assets/js/chosen.jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>

  <script>
    $(function() {
      $('.chosen').chosen();
    });
  </script>

</body>

</html>