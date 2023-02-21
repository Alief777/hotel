<?php

$kamar = query("SELECT * FROM kamar");

?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nomor Kamar</th>
                        <th>Gambar</th>
                        <th>Tipe Kamar</th>
                        <th>Fasilitas</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($admins as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><img src="img/<?= $row["gambar"]; ?>" alt="<?= $row["gambar"]; ?>" width="150"></td>
                            <td><?= $row["tipe_kamar"]; ?></td>
                            <td><?= $row["fasilitas_kamar"]; ?></td>
                            <td><?= $row["harga_kamar"]; ?></td>
                            <td><?= $row["status_kamar"]; ?></td>

                            <td>
                                <a class="text-decoration-none" href="?page=edit-kamar&id=<?= $row["id_kamar"]; ?>">Edit</a> |
                                <a class="text-decoration-none" href="hapus.php?id=<?= $row["id_kamar"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<a class="btn btn-primary" href="?page=tambah-kamar">Tambah Kamar</a>