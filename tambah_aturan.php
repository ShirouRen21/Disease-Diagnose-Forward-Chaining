<!-- letakkan proses tambah data disini -->

<?php

if (isset($_POST['simpan'])) {
    $nama_penyakit = $_POST['nama_penyakit'];

    // validasi
    $sql = "SELECT basis_aturan.id_aturan, basis_aturan.id_penyakit, penyakit.nama_penyakit FROM  basis_aturan INNER JOIN penyakit ON basis_aturan.id_penyakit=penyakit.id_penyakit
        WHERE nama_penyakit='$nama_penyakit'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
?>
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Data sudah ada</strong>
        </div>
<?php
    } else {
        $sql = "SELECT * FROM penyakit WHERE nama_penyakit='$nama_penyakit'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id_penyakit = $row['id_penyakit'];

        //proses simpan
        $sql = "INSERT INTO basis_aturan VALUES (Null,'$id_penyakit')";

        mysqli_query($conn, $sql);
        //mengambil id_gejala
        $id_gejala = $_POST['id_gejala'];

        //proses ambil data aturan
        $sql = "SELECT * FROM basis_aturan ORDER BY id_aturan DESC";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id_aturan = $row['id_aturan'];

        //simpan detail basis aturan
        $jumlah = count($id_gejala);
        $i = 0;
        while ($i < $jumlah) {
            $id_gejala_temp = $id_gejala[$i];
            $sql = "INSERT INTO detail_basis_aturan VALUES ('$id_aturan','$id_gejala_temp')";
            mysqli_query($conn, $sql);
            $i++;
        }

        header("Location:?page=aturan");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
            <div class="card border-dark mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark mb-3"><strong>Tambah Data basis aturan</strong></div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="">Nama penyakit</label>
                            <select class="form-control chosen" data-placeholder="pilih nama penyakit" name="nama_penyakit">
                                <option value=""></option>
                                <?php
                                $sql = "SELECT * FROM penyakit ORDER BY nama_penyakit ASC";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row['nama_penyakit']; ?>"><?php echo $row['nama_penyakit']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Pilih gejala-gejala yang terkait</label>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="30px"></th>
                                        <th width="30px">No</th>
                                        <th width="500px">Nama gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = "SELECT*FROM gejala ORDER BY nama_gejala ASC";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
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

                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                        <a class="btn btn-danger" href="?page=aturan">Batal</a>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- mencegah kosong isi gejala/ penyakit -->
<script type="text/javascript">
    function validasiForm() {
        var nama_penyakit = document.forms["Form"]["nama_penyakit"].value;

        if (nama_penyakit == "") {
            alert("pilih nama penyakit");
            return false;
        }

        var checkbox = document.getElementsByName('<?php echo 'id_gejala[]'; ?>');

        var isChecked = false;
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                isChecked = true;
                break;
            }
        }
        //jika belum ada yg di check
        if (!isChecked) {
            alert('pilih setidaknya 1 gejala');
            return false;
        }
        return true;
    }
</script>