<?php
$id = $_GET['id'];

if (isset($_POST['update'])) {
    $nama_penyakit = $_POST['nama_penyakit'];
    $keterangan = $_POST['keterangan'];
    $solusi = $_POST['solusi'];

    // proses update
    $sql = "UPDATE penyakit SET nama_penyakit='$nama_penyakit', keterangan='$keterangan',solusi='$solusi' WHERE id_penyakit='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
}



$sql = "SELECT * FROM penyakit WHERE id_penyakit='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark mb-3"><strong>Update Data penyakit</strong></div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="">Nama penyakit</label>
                            <input type="text" class="form-control" name="nama_penyakit" value="<?php echo $row['nama_penyakit'] ?>" maxlength="200" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">keterangan</label>
                            <input type="text" class="form-control" name="keterangan" value="<?php echo $row['keterangan'] ?>" maxlength="200" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">solusi</label>
                            <input type="text" class="form-control" name="solusi" value="<?php echo $row['solusi'] ?>" maxlength="200" required>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update" value="Update">
                            <a class="btn btn-danger" href="?page=penyakit">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>