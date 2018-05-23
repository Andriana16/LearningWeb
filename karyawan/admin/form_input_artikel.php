<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>FORM INPUT ARTIKEL</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
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


    <div style="width:840px; min-height:400px; background-color:#F2F1EF;float:left;border-radius:5px;padding:0 10px">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <form class="pure-form" action="insert_artikel.php" method="post" encytype="multipart/form-data">
        <legend><h3>FORM INPUT ARTIKEL</h3></legend>
        <table>
            <tr>
                <td>Judul</td>
                <td>&nbsp; : &nbsp;</td>
                <td><input type="text" placeholder="Masukkan judul artikel" size="30" name="judul"></td>
            </tr>

            <tr>
                <td>Deskripsi Singkat</td>
                <td>&nbsp; : &nbsp;</td>
                <td><textarea name="desk_singkat" cols="31" rows="5"></textarea></td>
            </tr>

            <tr>
                <td>Detail Deskripsi</td>
                <td>&nbsp; : &nbsp;</td>
                <td><textarea name="detail_desk" cols="31" rows="5"></textarea></td>
            </tr>

            <tr>
                <td>Kategori</td>
                <td>&nbsp; : &nbsp;</td>
                <td>
                    <select name="id_kategori">
                    <option value="1">Teknologi</option>
                    <option value="2">Olahraga</option>
                    <option value="3">Otomotif</option>
                    <option value="4">Politik</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Foto</td>
                <td>&nbsp; : &nbsp;</td>
                <td><input type="file" name="foto"></td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="3"><button type="submit" class="btn btn-primary">Simpan</button></td>
            </tr>
        </table>
   
    </form>
    </div>
<?php
//KODE UNTUK MENAMPILKAN PESAN STATUS

if(isset($_GET['status'])){
    $status =$_GET['status'];
    switch($status){
        case 0 :
        echo "UPLOAD SUKSES! <br><br>";
        echo "<a class ='pure-button' href='data_artikel.php'>
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
        echo "Upload Gagal, Ukuran File Terlalu Besar! Maksimal 50kb";
        break;
    }
}
?>
</div>
</body>
</html>