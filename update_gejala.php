<?php
$id = $_GET['id'];

if (isset($_POST['update'])) {
    $nama_gejala = $_POST['nama_gejala'];

    // proses update
    $sql = "UPDATE gejala SET nama_gejala='$nama_gejala' WHERE id_gejala='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=gejala");
    }
}



$sql = "SELECT * FROM gejala WHERE id_gejala='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark mb-3"><strong>Update Data Gejala</strong></div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="">Nama Gejala</label>
                            <input type="text" class="form-control" name="nama_gejala" value="<?php echo $row['nama_gejala'] ?>" maxlength="200" required>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update" value="Update">
                            <a class="btn btn-danger" href="?page=gejala">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>