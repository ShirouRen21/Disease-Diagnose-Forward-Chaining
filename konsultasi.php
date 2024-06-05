<?php
date_default_timezone_set("Asia/Jakarta");
if (isset($_POST['proses'])) {
    $nama_pasien = $_POST['nama_pasien'];
    $tgl = date("Y/m/d");

    // simpan konsultasi
    $sql = "INSERT INTO konsultasi VALUES (Null,'$tgl','$nama_pasien')";
    mysqli_query($conn, $sql);

    $id_gejala = $_POST['id_gejala'];

    // proses ambil data konsultasi
    $sql = "SELECT * FROM konsultasi ORDER BY id_konsultasi DESC";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id_konsultasi = $row['id_konsultasi'];

    // simpan detail konsultasi
    $jumlah = count($id_gejala);
    for ($i = 0; $i < $jumlah; $i++) {
        $id_gejala_temp = $id_gejala[$i];
        $sql = "INSERT INTO detail_konsultasi VALUES ('$id_konsultasi','$id_gejala_temp')";
        mysqli_query($conn, $sql);
    }

    // mengambil data dari tabel penyakit untuk cek di basis aturan
    $sql = "SELECT * FROM penyakit";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $id_penyakit = $row['id_penyakit'];
        $nama_penyakit = $row['nama_penyakit'];
        $jumlah_yes = 0;

        // proses mencari jumlah gejala di basis aturan berdasarkan penyakitnya
        $sql2 = "SELECT COUNT(id_penyakit) AS jumlah_gejala FROM basis_aturan INNER JOIN detail_basis_aturan ON basis_aturan.id_aturan=detail_basis_aturan.id_aturan  WHERE id_penyakit='$id_penyakit'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $jumlah_gejala = $row2['jumlah_gejala'];

        // mencari gejala pada basis aturan
        $sql3 = "SELECT id_penyakit,id_gejala FROM basis_aturan INNER JOIN detail_basis_aturan ON basis_aturan.id_aturan=detail_basis_aturan.id_aturan WHERE id_penyakit='$id_penyakit'";
        $result3 = $conn->query($sql3);
        while ($row3 = $result3->fetch_assoc()) {
            $id_gejala2 = $row3['id_gejala'];

            // membandingkan gejala dipilih dengan gejala di basis aturan
            $sql4 = "SELECT id_gejala FROM detail_konsultasi WHERE id_konsultasi='$id_konsultasi' AND id_gejala='$id_gejala2'";
            $result4 = $conn->query($sql4);

            if ($result4->num_rows > 0) {
                $jumlah_yes += 1;
            }
        }

        // mencari persentase
        if ($jumlah_gejala > 0) {
            $peluang = round(($jumlah_yes / $jumlah_gejala) * 100, 2);
        } else {
            $peluang = 0;
        }

        // simpan detail penyakit 
        if ($peluang > 0) {
            // simpan data detail penyakit
            $sql = "INSERT INTO detail_penyakit VALUES ($id_konsultasi,'$id_penyakit','$peluang')";
            mysqli_query($conn, $sql);
        }
        header("Location:?page=konsultasi&action=hasil&id_konsultasi=$id_konsultasi");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
            <div class="card border-dark mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark mb-3"><strong>Konsultasi Penyakit</strong></div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="">Nama pasien</label>
                            <input type="text" class="form-control" name="nama_pasien" maxlength="200" required>
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
                                    $sql = "SELECT * FROM gejala ORDER BY nama_gejala ASC";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><input type="checkbox" class="check-item" name="id_gejala[]" value="<?php echo $row['id_gejala']; ?>"></td>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nama_gejala']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <input class="btn btn-primary" type="submit" name="proses" value="Proses">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- mencegah kosong isi gejala/ penyakit -->
<script type="text/javascript">
    function validasiForm() {
        var checkbox = document.getElementsByName('id_gejala[]');
        var isChecked = false;
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                isChecked = true;
                break;
            }
        }
        // jika belum ada yang di check
        if (!isChecked) {
            alert('Pilih setidaknya 1 gejala');
            return false;
        }
        return true;
    }
</script>