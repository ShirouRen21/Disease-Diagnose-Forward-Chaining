<!-- menampilkan data penyakit based basis aturan yg dipilih -->
<?php
$id_aturan = $_GET['id'];

$sql = "SELECT basis_aturan.id_aturan, basis_aturan.id_penyakit,penyakit.nama_penyakit FROM basis_aturan INNER JOIN penyakit ON basis_aturan.id_penyakit=penyakit.id_penyakit WHERE id_aturan='$id_aturan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark mb-3"><strong>Update Data basis aturan</strong></div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="">Nama penyakit</label>
                            <input type="text" class="form-control" value="<?php echo $row['nama_penyakit'] ?>" name="nama_penyakit" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Pilih gejala-gejala yang terkait</label>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="30px"></th>
                                        <th width="30px">No</th>
                                        <th width="700px">Nama gejala</th>
                                        <th width="50px">Nama gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = "SELECT*FROM gejala ORDER BY nama_gejala ASC";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {

                                        $id_gejala = $row['id_gejala'];

                                        /* cek tabel detail basis aturan */
                                        $sql = "SELECT * FROM detail_basis_aturan WHERE id_aturan='$id_aturan' AND id_gejala='$id_gejala'";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    
                                    ?>
                                        <tr>
                                            <td><input type="checkbox" class="check-item" name="<?php echo 'id_gejala[]' ?>" value="<?php echo $row['id_gejala']; ?>"></td>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nama_gejala']; ?></td>
                                        </tr>
                                    <?php
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
            </div>
        </form>
    </div>
</div>