<?php
include "koneksi.php";
$nomor_induk                =$_POST['nomor_induk'];
$nama                       =$_POST['nama'];
$tempat_tanggal_lahir       =$_POST['tempat_tanggal_lahir'];
$jenis_kelamin              =$_POST['jenis_kelamin'];
$agama                      =$_POST['agama'];
$alamat                     =$_POST['alamat'];
$no_tlp                     =$_POST['no_tlp'];
$kode_divisi                =$_POST['kode_divisi'];
$foto                       =$_POST['foto'];


//kode upload
$lokasi_file       =$_FILES['foto']['tmp_name'];
$foto              =$_FILES['foto']['name'];
$tipe_file         =$_FILES['foto']['type'];
$ukuran_file       =$_FILES['foto']['size'];

//kode untuk mengganti spasi dan karakter pada nama file
// serta karakter non alphabet menjadi garis bawah

$nama_baru         =preg_replace("/s\+/","_",$foto);
$direktori         ="foto/$nama_baru";

$MAX_FILE_SIZE     =5000000;//5000kb

//cek apakah file kosong?
if(strlen($foto)<1){
    header("Location:edit_karyawan.php?status=1&&nomor_induk=$nomor_induk");
    exit();
}

//cek apakah format file adalah format gambar
$formatgambar      = array("image/jpg", "image/jpeg", "image/gif", "image/png");
if(!in_array($tipe_file,$formatgambar)){
    header("Location:edit_karyawan.php?status=2&&nomor_induk=$nomor_induk");
    exit();
}

//cek apakah ukuran file diatas 500kb
if($ukuran_file > $MAX_FILE_SIZE){
    header("Location:edit_karyawan.php?status=3&&nomor_induk=$nomor_induk");
    exit();
}

//code untuk mengkopi file ke folder foto
move_uploaded_file($lokasi_file, $direktori);
$sql    ="UPDATE karyawan SET   nama                    ='$nama',
                                tempat_tanggal_lahir    ='$tempat_tanggal_lahir',
                                jenis_kelamin           ='$jenis_kelamin',
                                agama                   ='$agama',
                                alamat                  ='$alamat',
                                no_tlp                  ='$no_tlp',
                                kode_divisi             ='$kode_divisi',
                                foto                    ='$nama_baru'
        WHERE nomor_induk='$nomor_induk'";

//masukkan nama file ke dalam tabel foto di database mysql

$result = mysql_query($sql) or die(mysql_error());

//check if query succesful

if($result==true){
    header('location:data_karyawan.php');
}

mysql_close();

?>