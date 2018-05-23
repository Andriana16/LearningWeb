<?php
$connection = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('karyawan', $connection);
$term = strip_tags(substr($_GET['nama'],0, 100));
$term = mysql_escape_string($term); // Attack Prevention
if($term=="")
echo "<p class=\"text-error\">Masukan nama karyawan yang akan anda cari!";
else{
    
$query = mysql_query("select * from karyawan where nama like '%$term%'") or die(mysql_error());
$hasil = '';

if (mysql_num_rows($query)){
while($rows = mysql_fetch_array($query)){

$hasil=$hasil."<div class=\"row\">
    <div class='col-md-1'></div>
    <div class='col-md-11'>
            <h4><a href='detail_karyawan.php?nomor_induk=$rows[nomor_induk]'>$rows[nama]</a></h4>
            <img src=\"foto/$rows[foto]\"  class=\"img-polaroid\" width='50' height='50'>
            $rows[jenis_kelamin]
            $rows[alamat]
    </div>
</div>";

}
} else{
$hasil = " <h4 style='color:red'>Film tidak ditemukan!</h4><img src='image/404.jpg'>";
}

echo $hasil;
}
?>
