<!-- letakkan proses tambah data disini -->

<?php

if (isset($_POST['simpan'])) {
    $nama_gejala = $_POST['nama_gejala'];


    //proses simpan
    $sql = "INSERT INTO gejala VALUES (Null,'$nama_gejala')";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=gejala");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark mb-3"><strong>Tambah Data Gejala</strong></div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="">Nama Gejala</label>
                            <input type="text" class="form-control" name="nama_gejala" maxlength="200" required>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                            <a class="btn btn-danger" href="?gejala=NAMA_PAGE">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>