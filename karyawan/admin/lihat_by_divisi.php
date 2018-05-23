<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<h3 class="text-center">DATA KARYAWAN</h3>
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
    $kode_divisi    =$_GET['kode_divisi'];
    //startpagination
    $sqlcount       ="SELECT COUNT(nomor_induk) FROM karyawan WHERE kode_divisi='$kode_divisi'";

    $rscount        =mysql_fetch_array(mysql_query($sqlcount));
    $banyakdata     =$rscount[0];
    $page           =isset($_GET['page'])?$_GET:1; //jika page ada nilai maka tampilkan page, jika tidak maka tampilkan page1
    $limit          =5;
    $mulai_dari     =$limit*($page-1);
    //end pagination

    $query          ="SELECT*FROM karyawan, divisi WHERE karyawan.kode_divisi=divisi.kode_divisi AND
    karyawan.kode_divisi='$kode_divisi' ORDER BY karyawan.nomor_induk DESC LIMIT $mulai_dari,$limit";
    $sql            =mysql_query($query);
    $no             =($page*$limit)-4;
    while($data     = mysql_fetch_array($sql)){
        $nomor_induk             =$data['nomor_induk'];
        $nama                    =$data['nama'];
        $tempat_tanggal_lahir    =$data['tempat_tanggal_lahir'];
        $jenis_kelamin           =$data['jenis_kelamin'];
        $agama                   =$data['agama'];
        $alamat                  =$data['alamat'];
        $no_tlp                  =$data['no_tlp'];
        $kode_divisi             =$data['desk_divisi'];
        $foto                    =$data['foto'];

        echo"
            <tr>
                <td>$no</td>
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
                    <a href='edit_karyawan.php?nomor_induk=$nomor_induk'>Edit</a>
                    <a href='hapus_karyawan.php?nomor_induk=$nomor_induk'>Hapus</a>
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
            echo '[<a href="data_karyawan.php?page='.$i.'">' .$i. '</a>]';        
        }    
        else
        {
            echo "[$i]";        
        }
    }

    ?>
&nbsp;&nbsp;<a href="form_input.php">Tambah Data Karyawan</a>

<br>