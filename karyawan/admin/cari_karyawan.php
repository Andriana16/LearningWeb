<?php
session_start();
include ('koneksi.php');

    
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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
   <script src="script.js"></script>
   <title>Administrator</title>

        
        <style type="text/css">        body {
                padding-top: 20px;
                padding-bottom: 40px;
            
                
            }
            /* Custom container */
            .container-narrow {
                margin: 0 auto;
                max-width: 800px;
            }
            .container-narrow > hr {
                margin: 30px 0;
            }
            /* Main marketing message and sign up button */
            .jumbotron {
                margin: 60px 0;
                text-align: center;
            }
            .jumbotron h1 {
                font-size: 72px;
                line-height: 1;
            }
            .jumbotron .btn {
                font-size: 21px;
                padding: 14px 24px;
            }
            /* Supporting marketing content */
            .marketing {
                margin: 60px 0;
            }
            .marketing p + h4 {
                margin-top: 28px;
            }
            label.error{
                color:red;
            }
</style>
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

    <div style="width:860px; min-height:400px; background-color:#F2F1EF;float:left;border-radius:5px;padding:0 10px">
            <hr>
            <div class="well">
                                <?php
$pg = '';
/*
 * PHP Code untuk mendapatkan halaman view masing masing tabel
 */
include ('koneksi.php');
if(!isset($_GET['pg'])) {
 include ('form_cari_karyawan.php');
    }else {
    $pg = $_GET['pg'];
    $mod = $_GET['mod'];
    include $mod . '/' . $pg . ".php";
}?>
            </div>
            
            <hr>
            
        
        </div>


</div>

</body>
<html>

