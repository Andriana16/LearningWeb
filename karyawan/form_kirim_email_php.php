<!DOCTYPE html>
<?php
//==============
//CONFIGURATION
//==============

//IMPORTANT!!
//Put in your email address below:
$to = 'webhozz@gmail.com';


//User info (DO NOT EDIT!)
$name = @trim(stripslashes($_POST['name'])); //sender's name
$email = @trim(stripslashes($_POST['email'])); //sender's email

//The subject
$subject = @trim(stripslashes($_POST['subject'])); // the subject
$message = @trim(stripslashes($_POST['message'])); //sender's email

//The message you will receive in your mailbox
//Each parts are commented to help you understand what it does exaclty.
//YOU DON'T NEED TO EDIT IT BELOW BUT IF YOU DO, DO IT WITH CAUTION!
$msg  = "From : $name \r\n";  //add sender's name to the message
$msg .= "e-Mail : $email \r\n";  //add sender's email to the message
$msg .= "Subject : $subject \r\n\r\n"; //add subject to the message (optional! It will be displayed in the header anyway)
$msg .= "---Message--- \r\n".@trim(stripslashes($_POST['message']))."\r\n\r\n";  //the message itself

//Extras: User info (Optional!)
//Delete this part if you don't need it
//Display user information such as Ip address and browsers information...
$msg .= "---User information--- \r\n"; //Title
$msg .= "User IP : ".@$_SERVER["REMOTE_ADDR"]."\r\n"; //Sender's IP
$msg .= "Browser info : ".@$_SERVER["HTTP_USER_AGENT"]."\r\n"; //User agent
$msg .= "User come from : ".@$_SERVER["HTTP_REFERER"]; //Referrer

// END Extras
?>
<html>
<head>
    <title>Form Kirim email</title>

    <script language="JavaScript" src="valid.js" type="text/javascript"></script>
</head>
<body>
<h1>Form Kirim Email</h1>

              <?php
                if ($_SERVER['REQUEST_METHOD'] != 'POST'){
                  $self = $_SERVER['PHP_SELF'];
              ?>

<form name="myform" action="#" method="POST" id="myform" >
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

              <?php
                 }else {
                  error_reporting(1);
                  
                  if  (mail($to, $subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n"))
                  {    
                  //Message sent!
                  //It the message that will be displayed when the user click the sumbit button
                  //You can modify the text if you want
                  echo nl2br("
                  <span class='MsgSent'>
                    <h1>Congratulations!</h1>
                    Thank you ".$name.", your message is sent!<br /> I will get back to you as soon as possible.
                  </span>
                   ");
                  }
                  else{
              
                  // Display error message if the message failed to send
                  echo "
                  <span class='MsgError'>
                    <h1>Error!</h1>
                    Sorry ".$name.", your message failed to send. Try later!
                  </span>";
                }
                }
              ?>

<!-- <script language="javascript" type="text/javascript">
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
</script> -->
</body>
</html>

