<?php
include "koneksi.php";
$nomor_induk    =$_GET['nomor_induk'];
$query          ="DELETE from karyawan where nomor_induk='$nomor_induk'";
$simpan         =mysql_query($query) or die (mysql_error());
if($simpan){
    echo "<script type='text/javascript'>
        // alert('ANDA INGIN MENGHAPUS DATA?')
        </script>
        <meta http-equiv ='refresh' content='0;url=data_karyawan.php'>";
}
else{
    echo "Gagal Hapus";
}
?>