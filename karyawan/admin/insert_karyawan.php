<?php

include "koneksi.php";
$nama                       =$_POST['nama'];
$tempat_tanggal_lahir       =$_POST['tempat_tanggal_lahir'];
$jenis_kelamin              =$_POST['jenis_kelamin'];
$agama                      =$_POST['agama'];
$alamat                     =$_POST['alamat'];
$no_tlp                     =$_POST['no_tlp'];
$kode_divisi                =$_POST['kode_divisi'];
$foto                       =$_POST['foto'];

$query  ="INSERT INTO karyawan (nama,tempat_tanggal_lahir,jenis_kelamin,agama,alamat,no_tlp,kode_divisi,foto)VALUES 
('$nama','$tempat_tanggal_lahir','$jenis_kelamin','$agama', '$alamat', '$no_tlp', '$kode_divisi', '$foto')";
$sql    =mysql_query($query) or die(mysql_error());
if ($sql){
    echo "Berhasil Simpan
    <meta http-equiv='refresh' content='1;url=form_input.php'>";
}
else{
    echo "Gagal Simpan
    <meta http-equiv='refresh' content='1;url=data_karyawan.php'>";
}

?>