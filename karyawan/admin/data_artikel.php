<?php
session_start();
include ("koneksi.php");

    
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
                 <li><a href='form_input.php'><span>Tambah</span></a></li>
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
        <h3 class="text-center">Data Artikel</h3>
        <table class="table table-hover table-bordered ">
        <thead>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Judul</th>
                <th>Deskripsi Singkat</th>
                <th>Kategori</th>
                <th>Foto</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        include ("koneksi.php");
            
            //startpagination
            $sqlcount     = "SELECT COUNT(id_artikel) FROM artikel";
            
            $rscount     = mysql_fetch_array(mysql_query($sqlcount));
            $banyakdata  = $rscount[0];
            $page        = isset($_GET['page']) ? $_GET['page'] : 1; // jika page ada nilai maka tampilkan page, jika tidak maka tampilkan page1
            $limit       = 5;
            
            $mulai_dari = $limit * ($page -1);
            //endpagination
           // "SELECT*FROM karyawan,divisi WHERE karyawan.kode_divisi=divisi.kode_divisi ORDER BY karyawan.nomor_induk DESC LIMIT $mulai_dari, $limit";
        $query    ="SELECT*FROM artikel,kategori WHERE artikel.id_kategori = kategori.id_kategori ORDER BY artikel.id_artikel DESC LIMIT $mulai_dari, $limit";
        $sql      =mysql_query($query);
        $no       =($page * $limit)-4 ;
        while ($data= mysql_fetch_array($sql)){
            $id_artikel              =$data['id_artikel'];
            $judul                   =$data['judul'];
            $desk_singkat            =$data['desk_singkat'];
            $id_kategori             =$data['desk_kategori'];
            $foto                    =$data['foto'];

            echo"
                <tr>
                    <td>$no</td>
                    <td>$id_artikel</td>
                    <td>$judul</td>
                    <td>$desk_singkat</td>
                    <td>$id_kategori</td>
                    <td><center><img src='foto/$foto' width='100' height='100'></center></td>
                    <td>
                        <a href='edit_artikel.php?id_artikel=$id_artikel'>Edit</a>
                        <a href='hapus_artikel.php?id_artikel=$id_artikel'>Hapus</a>
                    </td>
                </tr>
                ";
                $no++;
        }

        ?>

        </tbody>
        </table>


        <?php

            // membuat pagination
            $banyakhalaman = ceil($banyakdata / $limit);  // ceil=membulatkan ke atas
            echo 'Halaman : ';
            for($i=1; $i <=$banyakhalaman; $i++)
            {
                if($page != $i)
                {
                    echo '[<a href="data_artikel.php?page='.$i.'">' .$i. '</a>]';        
                }    
                else
                {
                    echo "[$i]";        
                }
            }

        ?>
        &nbsp;&nbsp;<a href="form_input_artikel.php">Tambah Data Artikel</a>

        <br>
        <h5>Lihat by</h5>
        <ol>
            <li><a href="lihat_by_kategori.php?id_kategori=1">Teknologi</a></li>
            <li><a href="lihat_by_kategori.php?id_kategori=2">Olahraga</a></li>
            <li><a href="lihat_by_kategori.php?id_kategori=3">Otomotif</a></li>
            <li><a href="lihat_by_kategori.php?id_kategori=4">Politik</a></li>
        </ol>

    </div>

</div>

</body>
<html>

