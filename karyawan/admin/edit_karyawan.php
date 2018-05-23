<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FORM EDIT KARYAWAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<body style="width:600px; margin:0 auto;">
    <?php
    include "koneksi.php";

    $nomor_induk    =$_GET['nomor_induk'];
    $query          = "SELECT*FROM karyawan WHERE nomor_induk='$nomor_induk'";
    $sql            = mysql_query($query);
    while($data = mysql_fetch_array($sql)){
        $nomor_induk                =$data['nomor_induk'];
        $nama                       =$data['nama'];
        $tempat_tanggal_lahir       =$data['tempat_tanggal_lahir'];
        $jenis_kelamin              =$data['jenis_kelamin'];
        $agama                      =$data['agama'];
        $alamat                     =$data['alamat'];
        $no_tlp                     =$data['no_tlp'];
        $kode_divisi                =$data['kode_divisi'];
        $foto                       =$data['foto'];
    ?>

<form action="update_karyawan.php"class="pure-form" method="post" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $nomor_induk?>" name="nomor_induk">
    <fieldset>
        <legend><h3>FORM INPUT KARYAWAN</h3></legend>
        <table>
        <tr>
            <td>Nama</td>
            <td>&nbsp; : &nbsp;</td>
             <td><input type="text" value="<?php echo $nama?>" placeholder="Masukkan nama lengkap anda" size="30" name="nama"></td>
        </tr>

        <tr>
            <td>Tempat, Tanggal </td>
            <td>&nbsp; : &nbsp;</td>
            <td><input type="text" value="<?php echo $tempat_tanggal_lahir?>" placeholder="Jakarta, 30 Oktober 2014" size="30" name="tempat_tanggal_lahir"></td>
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>&nbsp; : &nbsp;</td>
            <td>
                <input type="radio" name="jenis_kelamin" value="Laki - Laki" <?php
                if($jenis_kelamin="Laki - Laki") echo "checked";?>>Laki - Laki
                <input type="radio" name="jenis_kelamin" value="Perempuan" <?php
                if($jenis_kelamin="Perempuan") echo "checked";?>>Perempuan
            </td> 
        </tr>

        <tr>
            <td>Agama</td>
            <td>&nbsp; : &nbsp;</td>
            <td>
                <select name="agama">
                <option value="Buddha" <?php if($agama=="Buddha") echo "selected";?>>Buddha</option>
                <option value="Hindu" <?php if($agama=="Hindu") echo "selected";?>>Hindu</option>
                <option value="Islam" <?php if($agama=="Islam") echo "selected";?>>Islam</option>
                <option value="Katolik" <?php if($agama=="Katolik") echo "selected";?>>Katolik</option>
                <option value="Kristen Protestan" <?php if($agama=="Kristen Protestan") echo "selected";?>>Kristen Protestan</option>
                <option value="Konghucu" <?php if($agama=="Konghucu") echo "selected";?>>Konghucu</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Telepon</td>
            <td>&nbsp; : &nbsp;</td>
            <td><input type="text" value="<?php echo $no_tlp; ?>" placeholder="Masukkan Nomor Telepon Anda" size="30" name="no_tlp"></td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>&nbsp; : &nbsp;</td>
            <td><textarea name="alamat" cols="31" rows="5"><?php echo $alamat; ?></textarea></td>
        </tr>

        <tr>
            <td>Divisi</td>
            <td>&nbsp; : &nbsp;</td>
            <td>
                <select name="kode_divisi">
                <option value="1" <?php if($kode_divisi=="1") echo "selected";?>>HRD</option>
                <option value="2" <?php if($kode_divisi=="2") echo "selected";?>>Administrasi Dan Keuangan</option>
                <option value="3" <?php if($kode_divisi=="3") echo "selected";?>>Marketing</option>
                <option value="4" <?php if($kode_divisi=="4") echo "selected";?>>Produksi</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Foto</td>
            <td>&nbsp; : &nbsp;</td>
            <td>
                <input type="file" name="foto">
                <input type="hidden" name="foto_tmp" value="<?php echo $foto ?>">
            </td>
        </tr>

        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
            <td colspan="3"><center><img src="foto/<?php echo $foto ?>" width="100" height="100"></center>
            </td>
        </tr>

        <tr>
            <td colspan="3"><button type="submit" class="pure-button pure-button-primary">Simpan</button></td>
        </tr>
        </table>
    </fieldset>
</form>
    <?php
    }
    //KODE UNTUK MENAMPILKAN PESAN STATUS
    if(isset($_GET['status'])){
        $status =$_GET['status'];
        switch($status){
            case 0 :
            echo "UPLOAD SUKSES! <br><br>";
            echo "<a class ='pure-button' href='data_karyawan.php'>
            <i class='fas fa-eye'></i>
            Lihat Data
            </a>";
            break;
    
            case 1 :
            echo "Anda Belum Memiliki File Yang Akan Diupload";
            break;
    
            case 2:
            echo "Upload Gagal, Format Yang Diperbolehkan Hanya jpg, png dan gif!";
            break;
    
            case 3 :
            echo "Upload Gagal, Ukuran File Terlalu Besar! Maksimal 500kb";
            break;
        }
    }
    ?>
</body>
</html>