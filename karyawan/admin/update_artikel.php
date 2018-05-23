<?php
include "koneksi.php";
$id_artikel                 =$_POST['id_artikel'];
$judul                      =$_POST['judul'];
$desk_singkat               =$_POST['desk_singkat'];
$id_kategori                =$_POST['id_kategori'];
$foto                       =$_POST['foto'];


//kode upload
$lokasi_file       =$_FILES['foto']['tmp_name'];
$foto              =$_FILES['foto']['name'];
$tipe_file         =$_FILES['foto']['type'];
$ukuran_file       =$_FILES['foto']['size'];

//kode untuk mengganti spasi dan karakter pada nama file
// serta karakter non alphabet menjadi garis bawah

$nama_baru         =preg_replace("/\s+/","_",$foto);
$direktori         ="foto/$nama_baru";

$MAX_FILE_SIZE     =5000000;//5000kb

//cek apakah file kosong?
if(strlen($foto)<1){
    header("Location:edit_artikel.php?status=1&&id_artikel=$id_artikel");
    exit();
}

//cek apakah format file adalah format gambar
$formatgambar      = array("image/jpg", "image/jpeg", "image/gif", "image/png");
if(!in_array($tipe_file,$formatgambar)){
    header("Location:edit_artikel.php?status=2&&id_artikel=$id_artikel");
    exit();
}

//cek apakah ukuran file diatas 500kb
if($ukuran_file > $MAX_FILE_SIZE){
    header("Location:edit_artikel.php?status=3&&id_arikel=$id_artikel");
    exit();
}

//code untuk mengkopi file ke folder foto
move_uploaded_file($lokasi_file, $direktori);
$sql    ="UPDATE artikel SET    judul                   ='$judul',
                                desk_singkat            ='$desk_singkat',
                                id_kategori             ='$id_kategori',
                                foto                    ='$nama_baru'
        WHERE id_artikel='$id_artikel'";

//masukkan nama file ke dalam tabel foto di database mysql

$result = mysql_query($sql) or die(mysql_error());

//check if query succesful

if($result==true){
    header('location:data_artikel.php');
}

mysql_close();

?>