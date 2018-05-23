<?php

include "koneksi.php";

$judul          =$_POST['judul'];
$desk_singkat   =$_POST['desk_singkat'];
$id_kategori    =$_POST['id_kategori'];
$foto           =$_POST['foto'];


$query  ="INSERT INTO artikel (judul,desk_singkat,id_kategori,foto) VALUES ('$judul', '$desk_singkat', '$id_kategori', '$foto')";
$sql    =mysql_query($query) or die (mysql_error());
if ($sql){
    echo "Berhasil Simpan
    <meta http-equiv='refresh' content='1;url=data_artikel.php'>";
}
else{
    echo "Gagal Simpan
    <meta http-equiv='refresh' content='1;url=data_artikel.php'>";
}

?>
