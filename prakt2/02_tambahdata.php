<h2>FORM ISI DATA BARU</h2>
<form>
    <span>Nama</span>
    <input type="text" name="nama">
    <input type="submit" name="submit" value="Simpan data baru">
    <input type="submit" name="submit" value="Kembali ke tampil data">
    <?php
    if(isset($_GET['submit'])) { //Mengecek udah ditekan apa belum
        if($_GET['submit'] == "Kembali ke tampil data"){
            header("location:01_tampildata.php");
        }
        else{
            if (strlen($_GET['nama'])) { //strlen mengukur panjang string || Tujuannya mengecek data kosong atau tidak
                include "koneksi.php";
                mysqli_query($koneksi,"INSERT INTO mahasiswa (id, nama) VALUES (NULL, '".$_GET['nama']."')");
                echo "<br><br>Data <b>".$_GET['nama']."</b> Telah Disimpan di Database";
            }
            else
                echo "<br>Data Nama Tidak Boleh Kosong";
       }	
    }
?>
</form>