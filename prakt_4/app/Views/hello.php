<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>
<body>
    <form action="<?php echo site_url('Mahasiswa/greetings')?>" method="POST">
        <input type="text" name="nama">
        <input type="submit" name="submit" value="Kirim">
    </form>
    <center><h1>Selamat malam, <?= $nama ?></h1></center>
    <?php
    echo date('d-m-Y')."<br />";
    echo "BASE URL => ".base_url()."<br />";
    echo "SITE URL => ".site_url()."<br />";
    echo "SITE URL MAHASISWA => ".site_url('Mahasiswa/greetings')."<br />";
    ?>
</body>
</html>