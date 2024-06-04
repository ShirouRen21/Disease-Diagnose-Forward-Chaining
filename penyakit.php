<div class="card">
    <div class="card-header bg-primary bg-gradient text-white border-dark"><strong>Data penyakit</strong></div>
    <div class="card-body">
        <a class="btn btn btn-primary mb-2" href="?page=penyakit&action=tambah">Tambah</a>
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th width="200px">Nama penyakit</th>
                    <th width="400px">keterangan</th>
                    <th width="200px">Solusi</th>
                    <th width="100px"></th>
                </tr>
            </thead>
            <tbody>
                <!-- letakkan proses menampilkan disini -->
                <?php
                $no = 1;
                $sql = "SELECT*FROM penyakit ORDER BY nama_penyakit ASC";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>

                        <td><?php echo $row['nama_penyakit']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo $row['solusi']; ?></td>

                        <td align="center">
                            <a class="btn btn-warning" href="?page=penyakit&action=update&id=<?php echo $row['id_penyakit']; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=penyakit&action=hapus&id=<?php echo $row['id_penyakit']; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>