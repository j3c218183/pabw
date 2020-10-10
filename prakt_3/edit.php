<?php
include 'koneksi.php';
?>
<html>
<h2>Form edit data</h2>
<form method="POST" enctype="multipart/form-data">
    <?php
    $idnya = $_GET['id'];
    $r = mysqli_query($kon, "SELECT * FROM siswa WHERE id = '" . $idnya . "'");
    $brs = mysqli_fetch_assoc($r);
    $datahobi = explode(', ', $brs['olahraga']);
    ?>
    <!-- <input type="hidden" name="idnya" value="<?php echo $x; ?>"> -->

    <table height="10px">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nm" value="<?= $brs['nama']; ?>"></td>
        </tr>
        <tr>
            <td>Nim</td>
            <td><input type="text" name="nimnya" value="<?= $brs['nim']; ?>"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <input type="radio" id="male" name="gender" value="Laki-laki" <?php if ($brs['jeniskelamin'] == 'Laki-laki') echo 'checked'; ?>>
                <label for="male">Laki-laki</label>
                <input type="radio" id="female" name="gender" value="Perempuan" <?php if ($brs['jeniskelamin'] == 'Perempuan') echo 'checked'; ?>>
                <label for="female">Perempuan</label>
            </td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>
                <select name="agama">
                    <option value="Islam" <?php if ($brs['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
                    <option value="Kristen" <?php if ($brs['agama'] == 'Kristen') echo 'selected'; ?>>Kristen</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Olahraga Favorit</td>
            <td>
                <input type="checkbox" id="of1" name="hobi[]" value="Sepak Bola" <?php if (in_array("Sepak Bola", $datahobi)) echo "checked"; ?>>
                <label for="of1"> Sepak Bola</label>
                <input type="checkbox" id="of2" name="hobi[]" value="Basket" <?php if (in_array("Basket", $datahobi)) echo "checked"; ?>>
                <label for="of2"> Basket</label>
                <input type="checkbox" id="of3" name="hobi[]" value="Futsal" <?php if (in_array("Futsal", $datahobi)) echo "checked"; ?>>
                <label for="of3"> Futsal</label>
                <input type="checkbox" id="of4" name="hobi[]" value="Badminton" <?php if (in_array("Badminton", $datahobi)) echo "checked"; ?>>
                <label for="of4"> Badminton</label>
                <input type="checkbox" id="of5" name="hobi[]" value="Renang" <?php if (in_array("Renang", $datahobi)) echo "checked"; ?>>
                <label for="of5"> Renang</label>
            </td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td><img src="img/<?= $brs['gambar']; ?>" height="70px"></td>
            <td><input type="file" name="image"></td>
        </tr>
    </table>

    <input type="submit" name="sub" value="simpan data!">
    <input type="submit" name="sub" value="kembali ke daftar data">

    <?php
    if (isset($_POST['sub'])) {
        if ($_POST['sub'] == 'kembali ke daftar data') {
            header("location:tampil_data.php");
        } else {
            $data = implode(", ", $_POST['hobi']);

            if ($_FILES['image']['error'] === 4) {
                $namaFile = $brs['gambar'];
            } else {
                $ukuran = $_FILES['image']['size'];
                $namaFile = $_FILES['image']['name'];
                $tmpName = $_FILES['image']['tmp_name'];

                if ($ukuran > 1000000) {
                    echo "<script>
                         alert('Ukuran Gambar Terlalu Besar!');
                      </script>";
                    header("location:edit.php");
                } else {
                    move_uploaded_file($tmpName, 'img/' . $namaFile);
                }
            }

            if (strlen($_POST['nimnya']) && strlen($_POST['nm']) && strlen($_POST['gender']) && strlen($_POST['agama']) && strlen($data) && strlen($namaFile)) {
                //include "koneksi.php"; //di atas sudah ya
                mysqli_query($kon, "UPDATE `siswa` SET `nim` = '" . $_POST['nimnya'] . "',`nama` = '" . $_POST['nm'] . "',
                `jeniskelamin` = '" . $_POST['gender'] . "', `agama` = '" . $_POST['agama'] . "', `olahraga` = '" . $data . "',`gambar` = '" . $namaFile . "'
                                   WHERE `id` = '" . $idnya . "'");

                echo "<br>Data <b>'" . $_POST['nm'] . "'</b> telah disimpan sebagai perubahan pada database";
                echo "<br>silahkan klik tombol kembali ke daftar data untuk melihat hasilnya";
                //header("location:tampil_data_link_insert.php");
            } else {
                echo "Data nama baru tidak boleh kosong :)";
            }
        }
    }
    ?>
</form>

</html>