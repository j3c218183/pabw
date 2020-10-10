<h2>Data Mahasiswa</h2>
<form action="02_tambahdata.php">
<input type="submit" value="Tambah Data Baru">
</form>
<?php 
require('koneksi.php');
$cur = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
// $brs = mysqli_fetch_assoc($cur);
// foreach ($brs as $b) {
//     print_r($b);
// }
$i = 1;
while ($brs = mysqli_fetch_assoc($cur)) {
    echo "<form action=\"03_aksi.php\">";
    echo $i++.". ". $brs["nama"];
    echo " &nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"aksi\" value=\"Edit\">";
    echo " &nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"aksi\" value=\"Delete\">";
    echo "<p>";
    echo "<input type=\"hidden\" name=\"id\" value=\"".$brs["id"]."\">";
    echo "<input type=\"hidden\" name=\"nama\" value=\"".$brs["nama"]."\">";
    echo "</form>";
    
}
// print_r(mysqli_fetch_assoc($cur));
?>