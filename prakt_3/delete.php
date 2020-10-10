<html>
<?php
include "koneksi.php";
$r = mysqli_query($kon, "SELECT * FROM siswa WHERE id=" . $_GET["id"]);
$brs = mysqli_fetch_assoc($r);
echo "apakah Anda yakin akan menghapus nama " . $brs['nama'] . " dari tabel?";
?>

<form>
    <input type="hidden" name="idDelete" value="<?php echo $_GET["id"]; ?>">
    <input type="submit" name="jawaban" value="ya">
    <input type="submit" name="jawaban" value="tidak">
</form>

<?php
if (isset($_GET['jawaban'])) {
    if ($_GET['jawaban'] == "tidak")
        header("location:tampil_data.php");
    else {
        $r = mysqli_query($kon, "DELETE FROM `siswa` WHERE `id` = " . $_GET['idDelete']);
        header("location:tampil_data.php");
    }
}
?>

</html>