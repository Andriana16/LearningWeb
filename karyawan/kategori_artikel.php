<!doctype html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>
<br>
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-12">
            <h1 class="text-center">WEBHOZZ BLOG</h1>
            
            <center>
            <div class="btn-group" role="group" aria-label="...">
            <?php 
                    include "koneksi.php";
                    $query    ="SELECT*FROM kategori";
                    $tampil    =mysql_query($query);
                    while($data=mysql_fetch_array($tampil)){
                        $id_kategori          =$data['id_kategori'];
                        $desk_kategori        =$data['desk_kategori'];
                        
                        ?>
              <a href="<?php echo "kategori.php?id_kategori=$id_kategori";?>" type="button" class="btn btn-default"><?php echo"$desk_kategori"; ?></a>
              <?php } ?>
            </div>
            </center>

            <br>
                <div class='row'>
                    <?php 
                    include "admin/koneksi.php";
                    $id_artikel = $_GET['id_kategori'];
                    $query    ="SELECT*FROM artikel,kategori WHERE artikel.id_kategori=kategori.id_kategori AND artikel.id_kategori='$id_artikel'";
                    $tampil    = mysql_query($query);
                    if ($tampil === FALSE) {
                        die(mysql_error());
                    }
                    while($data=mysql_fetch_array($tampil)){
                        $id_artikel             =$data['id_artikel'];
                        $judul            =$data['judul'];
                        $desk_singkat    =$data['desk_singkat'];
                        $detail_desk    =$data['detail_desk'];
                        $id_kategori        =$data['desk_kategori'];
                        $foto             =$data['foto'];
                        echo"
                            
                              <div class='col-sm-6 col-md-4'>
                              <h5>$id_kategori</h5>
                                <div class='thumbnail'  style='min-height:500px;'>
                                  <img src='admin/foto/$foto' width='100%' height='100px'>
                                  <div class='caption'>
                                    <h3>$judul</h3>
                                    <h5>$desk_singkat</h5>
                                  </div>
                                  <p class='text-center'><a href='detail_artikel.php?id_artikel=$id_artikel' class='btn btn-primary' role='button'>Readmore</a></p>
                                </div>
                              </div>
                            
                        ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

