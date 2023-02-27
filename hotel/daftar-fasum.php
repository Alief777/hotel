<?php

$fasum = query("SELECT * FROM fasum");

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
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Fasum</th>
                        <th>Keterangan</th>
                        <th>Tgl dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($fasum as $key) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><img src="img/<?= $key["gambar"] ?>" alt="<?= $key["gambar"] ?>" width="150"></td>
                            <td><?= $key["nama_fasum"] ?></td>
                            <td><?= $key["keterangan"] ?></td>
                            <td><?= $key["tgl"] ?></td>
                            <td>
                                <a class="text-decoration-none" href="?page=edit-fasum&id=<?= $key["id_fasum"]; ?>">Edit</a> |
                                <a class="text-decoration-none" href="hapus-fasum.php?id=<?= $key["id_fasum"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
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
<a class="btn btn-primary" href="?page=tambah-fasum">Tambah Fasum</a>