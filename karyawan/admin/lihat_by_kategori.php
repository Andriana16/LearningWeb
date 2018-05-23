<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<h3 class="text-center">DETAIL ARTIKEL</h3>
<table class="table table-hover table-bordered">
<thead>
    <tr>
        <th>No</th>
        <th>ID</th>
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
    include ("koneksi.php");
    $id_kategori    =$_GET['id_kategori'];
    //startpagination
    $sqlcount       ="SELECT COUNT(id_artikel) FROM artikel WHERE id_kategori='$id_kategori'";

    $rscount        =mysql_fetch_array(mysql_query($sqlcount));
    $banyakdata     =$rscount[0];
    $page           =isset($_GET['page'])?$_GET:1; //jika page ada nilai maka tampilkan page, jika tidak maka tampilkan page1
    $limit          =5;
    $mulai_dari     =$limit*($page-1);
    //end pagination
    
    //$query          ="SELECT*FROM karyawan, divisi WHERE karyawan.kode_divisi=divisi.kode_divisi AND
    //karyawan.kode_divisi='$kode_divisi' ORDER BY karyawan.nomor_induk DESC LIMIT $mulai_dari,$limit";
    $query          ="SELECT*FROM artikel,kategori WHERE artikel.id_kategori = kategori.id_kategori AND artikel.id_kategori='$id_kategori' ORDER BY artikel.id_artikel DESC LIMIT $mulai_dari, $limit";
    $sql            =mysql_query($query);
    $no             =($page*$limit)-4;
    while($data     = mysql_fetch_array($sql)){
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
    
    </table>
    </tbody>

    
    <?php

    // membuat pagination
    $banyakhalaman = ceil($banyakdata / $limit);  // ceil=membulatkan ke atas
    echo 'Halaman : ';
    for($i=1; $i <=$banyakhalaman; $i++)
    {
        if($page != $i)
        {
            echo '[<a href=detail_artikel.php?page='.$i.'">' .$i. '</a>]';        
        }    
        else
        {
            echo "[$i]";        
        }
    }

    ?>
&nbsp;&nbsp;<a href="form_input_artikel.php">Tambah Artikel</a>

<br>