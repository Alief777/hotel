<?php

$karyawan = query("SELECT * FROM user WHERE id_user_group = 1 OR id_user_group = 2");

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
                        <th>Username</th>
                        <th>Nama Karyawan</th>
                        <th>email</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($karyawan as $key) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $key["username"]?></td>
                            <td><?= $key["nama_lengkap"] ?></td>
                            <td><?= $key["email"] ?></td>
                            <td><?= $key["no_telepon"] ?></td>
                            <td>
                                <a class="text-decoration-none" href="?page=edit-karyawan&id=<?= $key["id_user"]; ?>">Edit</a> |
                                <a class="text-decoration-none" href="hapus-karyawan.php?id=<?= $key["id_user"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>