<?php
include 'koneksi.php';

$no    = 1;
$query = "SELECT * FROM anggota ORDER BY id DESC";
$sql   = $db1->prepare($query);
$sql->execute();
$res1  = $sql->get_result();
?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>No.</td>
        <td>Nama</td>
        <td>Jenis Kelamin</td>
        <td>Alamat</td>
        <td>No Telp</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    <?php if ($res1->num_rows > 0): ?>
        <?php while ($row = $res1->fetch_assoc()): ?>
            <?php
            $jeniskel = ($row['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan';
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= $jeniskel; ?></td>
                <td><?= htmlspecialchars($row['alamat']); ?></td>
                <td><?= htmlspecialchars($row['no_telp']); ?></td>
                <td>
                    <button id="<?= $row['id']; ?>" class="btn btn-success btn-sm edit_data">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                    <button id="<?= $row['id']; ?>" class="btn btn-danger btn-sm hapus_data">
                        <i class="fa fa-trash"></i> Hapus
                    </button>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="7">Tidak ada data ditemukan</td></tr>
    <?php endif; ?>
    </tbody>
</table>
