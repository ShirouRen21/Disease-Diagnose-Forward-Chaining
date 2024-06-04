<!-- letakkan proses tambah data disini -->

<?php

if (isset($_POST['simpan'])) {
    $nama_penyakit = $_POST['nama_penyakit'];
    $keterangan = $_POST['keterangan'];
    $solusi = $_POST['solusi'];


    //proses simpan
    $sql = "INSERT INTO penyakit VALUES (Null,'$nama_penyakit','$keterangan','$solusi')";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark mb-3"><strong>Tambah Data penyakit</strong></div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="">Nama Penyakit</label>
                            <input type="text" class="form-control" name="nama_penyakit" maxlength="200" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" maxlength="200" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">solusi</label>
                            <input type="text" class="form-control" name="solusi" maxlength="200" required>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                            <a class="btn btn-danger" href="?penyakit=NAMA_PAGE">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>