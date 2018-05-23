<html>
<head>
    <title>Form Kirim email</title>

    <script language="JavaScript" src="validjs.js" type="text/javascript"></script>
</head>
<body>
<h1>Form Kirim Email</h1>

<form name="myform" action="" method='POST'  >
<table>
  <tr>
    <td>Nama</td>
    <td><input type="text" name="name" id='nama'></td>
  </tr>
  <tr>
    <td>EMail</td>
    <td><input type="text" name="email"></td>
  </tr>
  <tr>
    <td>Subjek</td>
    <td><input type="text" name="subject"></td>
  </tr>
  <tr>
    <td>Pesan</td>
    <td><textarea name="message" cols="30" rows="5"></textarea></td>
  </tr>
</table>
    
    <div id='myform_errorloc' style='color:red'></div>
   <br/>
    <input type="submit" value="Submit">
</form>
<script language="JavaScript" src="valid.js" type="text/javascript">
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 
  frmvalidator.addValidation("name","req","Nama belum di isi");
  frmvalidator.addValidation("name","maxlen=20","nama Maximal  20");
  frmvalidator.addValidation("name","alpha_s","Nama tidak boleh mengandung angka atau symbol");

  frmvalidator.addValidation("email","req");
  frmvalidator.addValidation("email","email","email tidak valid");
  
  frmvalidator.addValidation("subject","req","Subjek belum di isi");

  frmvalidator.addValidation("message","req","Pesan belum di isi");
</script>
<body>
</html>

