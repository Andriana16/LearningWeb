<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FORM EDIT ARTIKEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<body style="width:600px; margin:0 auto;">
    <?php
    include ("koneksi.php");

    $id_artikel     =$_GET['id_artikel'];
    $query          = "SELECT*FROM artikel WHERE id_artikel='$id_artikel'";
    $sql            = mysql_query($query);
    while($data = mysql_fetch_array($sql)){
        $id_artikel                 =$data['id_artikel'];
        $judul                      =$data['judul'];
        $desk_singkat               =$data['desk_singkat'];
        $id_kategori                =$data['id_kategori'];
        $foto                       =$data['foto'];
    ?>


<div style="width:860px; min-height:400px; background-color:#F2F1EF;float:left;border-radius:5px;padding:0 10px">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<form action="update_artikel.php"class="pure-form" method="post" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $id_artikel?>" name="id_artikel">
    <fieldset>
        <legend><h3>FORM INPUT ARTIKEL</h3></legend>
        <table>
        <tr>
            <td>Judul</td>
            <td>&nbsp; : &nbsp;</td>
             <td><input type="text" value="<?php echo $judul?>" placeholder="Masukkan judul artikel" size="30" name="judul"></td>
        </tr>

        <tr>
                <td>Deskripsi Singkat</td>
                <td>&nbsp; : &nbsp;</td>
                <td><textarea name="desk_singkat" value="<?php echo $desk_singkat?>" cols="31" rows="5"></textarea></td>
            </tr>

            <tr>
                <td>Kategori</td>
                <td>&nbsp; : &nbsp;</td>
                <td>
                    <select name="id_kategori">
                    <option value="1" <?php if($id_kategori=="1") echo "selected";?>>Teknologi</option>
                    <option value="2" <?php if($id_kategori=="2") echo "selected";?>>Olahraga</option>
                    <option value="3" <?php if($id_kategori=="3") echo "selected";?>>Otomotif</option>
                    <option value="4" <?php if($id_kategori=="4") echo "selected";?>>Politik</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Foto</td>
                <td>&nbsp; : &nbsp;</td>
                <td><input type="file" name="foto"></td>
                <td><input type="hidden" name="foto_tmp" value="<?php echo $foto?>"></td>
            </tr>

            <tr>
            <td colspan="3"><center><img src="foto/<?php echo $foto ?>" width="100" height="100"></center>
            </td>
            </tr>

            <tr>
            <td colspan="3"><button type="submit" class="btn btn-primary">Simpan</button></td>
            </tr>
        </table>
    </fieldset>
</form>
</div>
    <?php
    }
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
            echo "Upload Gagal, Ukuran File Terlalu Besar! Maksimal 500kb";
            break;
        }
    }
    ?>
</body>
</html>