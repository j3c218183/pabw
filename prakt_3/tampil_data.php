<?php
include 'koneksi.php';
?>
<html>

<head>
    <title>Tampilan Utama</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <a href="insert.php">Tambah Data</a>
    <h2>Daftar Data dalam Database</h2>

    <table class="table1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Hobi</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        $i = 1;
        $r = mysqli_query($kon, "SELECT * FROM siswa");
        while ($brs = mysqli_fetch_assoc($r)) {
        ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $brs['nim']; ?></td>
                <td><img src="img/<?= $brs['gambar']; ?>" height="70px"></td>
                <td><?= $brs['nama']; ?></td>
                <td><?= $brs['jeniskelamin']; ?></td>
                <td><?= $brs['agama']; ?></td>
                <td><?= $brs['olahraga']; ?></td>
                <td><a href="edit.php?id=<?= $brs['id']; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?= $brs['id']; ?>">Delete</a></td>
            </tr>
        <?php
        }
        ?>

    </table>
</body>

</html>