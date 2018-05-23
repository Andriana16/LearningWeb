<?php
session_start();
include("koneksi.php");

    
if (empty($_SESSION['admin'])) {  header("location:login_form.php");  }

?>

<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Administrator</title>
</head>
<body>

<div style="margin:10px auto ; width:1120px; background-color:#66665e;padding:10px 0; text-align:center;border-radius:5px; color:#fff;font-family: calibri;" ><marquee>Halaman Administrator</marquee></div>

<div style="margin:0 auto ; width:1120px">
    <div style="float:left;margin-right:10px;width:250px;">
        <div id='cssmenu'>
        <ul>
           <li class='active'><a href='index.php'><span>Home</span></a></li>
           <li class='has-sub'><a href='#'><span>Karyawan</span></a>
              <ul>
                 <li><a href='data_karyawan.php'><span>Lihat</span></a></li>
                 <li><a href='form_input_karyawan.php'><span>Tambah</span></a></li>
                 <li><a href='cari_karyawan.php'><span>Cari</span></a></li>
              </ul>
           </li>
           <li class='has-sub'><a href='#'><span>Artikel</span></a>
              <ul>
                 <li><a href='data_artikel.php'><span>Lihat</span></a></li>
                 <li><a href='form_input_artikel.php'><span>Tambah</span></a></li>
              </ul>
           </li>
           <li class='last'><a href='logout.php'><span>Logout</span></a></li>
        </ul>
        </div>
    </div>

    <div style="width:860px; min-height:400px; background-color:#F2F1EF;float:left;border-radius:5px;padding:0 10px">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <h3 class="text-center">Data Karyawan</h3>
        <table class="table table-hover table-bordered ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Divisi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include"koneksi.php";
        $nomor_induk=$_GET['nomor_induk'];
        $query    ="SELECT*FROM karyawan,divisi WHERE karyawan.kode_divisi=divisi.kode_divisi AND karyawan.nomor_induk='$nomor_induk'";
        $sql    =mysql_query($query);
        while($data=mysql_fetch_array($sql)){
            $nomor_induk     =$data['nomor_induk'];
            $nama            =$data['nama'];
            $tempat_tanggal_lahir    =$data['tempat_tanggal_lahir'];
            $jenis_kelamin            =$data['jenis_kelamin'];
            $agama                     =$data['agama'];
            $alamat                 =$data['alamat'];
            $no_tlp                    =$data['no_tlp'];
            $kode_divisi            =$data['desk_divisi'];
            $foto                     =$data['foto'];

            echo"
                <tr>
                    <td>$nomor_induk</td>
                    <td>$nama</td>
                    <td>$tempat_tanggal_lahir</td>
                    <td>$jenis_kelamin</td>
                    <td>$agama</td>
                    <td>$alamat</td>
                    <td>$no_tlp</td>
                    <td>$kode_divisi</td>
                    <td><center><img src='foto/$foto' width='100' height='100'></center></td>
                    <td>
                        <a href='form_edit_karyawan.php?nomor_induk=$nomor_induk'>Edit</a>
                        <a href='hapus_karyawan.php?nomor_induk=$nomor_induk'>Hapus</a>
                    </td>
                </tr>
                ";
        }

        ?>

        </tbody>
        </table>


        &nbsp;&nbsp;<a href="form_input_karyawan.php">Tambah Data Karyawan</a>

        <br>
        <h5>Lihat by</h5>
        <ol>
            <li><a href="lihat_by_divisi.php?kode_divisi=1">HRD</a></li>
            <li><a href="lihat_by_divisi.php?kode_divisi=2">Administrasi dan Keuangan</a></li>
            <li><a href="lihat_by_divisi.php?kode_divisi=3">Marketing</a></li>
            <li><a href="lihat_by_divisi.php?kode_divisi=4">Produksi</a></li>
        </ol>

    </div>

</div>

</body>
<html>

