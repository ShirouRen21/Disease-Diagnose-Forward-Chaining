<!-- proses menampilkan data penyakit berdasarkan aturan yang dipilih -->
<?php 
$include = 'config.php';
$id_aturan = $_GET['id'];

$sql = "SELECT basis_aturan.id_aturan, basis_aturan.id_penyakit, penyakit.nama_penyakit 
        FROM basis_aturan 
        INNER JOIN penyakit 
        ON basis_aturan.id_penyakit = penyakit.id_penyakit 
        WHERE id_aturan = '$id_aturan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// proses update
if (isset($_POST['update'])) {
    $id_gejala = $_POST['id_gejala'];

    // Simpan detail basis aturan baru
    $jumlah = count($id_gejala);
    for ($i = 0; $i < $jumlah; $i++) {
        $id_gejalanya = $id_gejala[$i];
        $sql = "INSERT INTO detail_basis_aturan (id_aturan, id_gejala) VALUES ('$id_aturan', '$id_gejalanya')";
        $conn->query($sql);
    }

    header("Location:?page=aturan");
}

?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark mb-3">
                <div class="card-header bg-primary text-white border-dark mb-3"><strong>Update Data Basis Aturan</strong></div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="">Nama Penyakit</label>
                        <input type="text" value="<?php echo $row['nama_penyakit']; ?>" class="form-control" name="nama_penyakit" readonly>
                    </div>

                    <!-- Tabel data gejala-gejala -->
                    <div class="form-group">
                        <label for="">Pilih Gejala-Gejala yang Terkait</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="30px"></th>
                                    <th width="30px">No</th>
                                    <th width="500px">Nama Gejala</th>
                                    <th width="50px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = "SELECT * FROM gejala ORDER BY nama_gejala ASC";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {

                                    $id_gejala = $row['id_gejala'];

                                    // Cek tabel data basis aturan
                                    $sql2 = "SELECT * FROM detail_basis_aturan WHERE id_aturan = '$id_aturan' AND id_gejala = '$id_gejala'";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        // Jika ditemukan maka ditampilkan data nya dimana ceklistnya mati dan button hapus aktif
                                        ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" class="check-item" disabled="disabled" checked></td>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nama_gejala']; ?></td>
                                            <td align="center">
                                                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=aturan&action=hapus_gejala&id_aturan=<?php echo $id_aturan ?>&id_gejala=<?php echo $id_gejala ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    } else {
                                        // Jika tidak ditemukan ceklist aktif button hapus mati
                                        ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" class="check-item" name="id_gejala[]" value="<?php echo $row['id_gejala']; ?>"></td>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nama_gejala']; ?></td>
                                            <td align="center">
                                                <i class="fas fa-trash-alt"></i>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <input class="btn btn-primary" type="submit" name="update" value="Update">
                    <a class="btn btn-danger" href="?page=aturan">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>
