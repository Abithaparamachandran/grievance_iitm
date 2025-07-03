<?php
session_start();
if(!isset($_SESSION['usernamee'])) {
header("location:log1.php");
}
?>

<?php
session_start();
if(isset($_SESSION['usernamee'])) {
$z=$_SESSION['usernamee'];
}
?>

<?php
$name=  $_POST['name'];
$subject=$_POST['subject'];
$msg=  $_POST['msg'];

$usercategory=$_GET['usercategory'];
if($usercategory=="student"){
$email=$z."@smail.iitm.ac.in";
}
else{
$email=$z."@iitm.ac.in";
}
?>

<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>
<script src="jquery.min.js"></script>
<script src="jquery.validate.min.js"></script><!-- jquery validation -->
<style>
.container
{

padding:30px 10px;
margin-top:80px;
margin-bottom:80px;
border:none!important;
box-shadow:0 9px 50px 0 rgba(0,0,0,0.6);
width:40%;

}
.fac{
color:linear-gradient(to bottom, #0033cc 0%, #00cc00 100%);
/*color:#0033cc;*/
font-weight:bold;
font-size:30px;

}
.page-header {
        color:white;
        text-shadow: 0px -1px 0px #000;
/*      border-bottom: solid #181818 1px;*/
        -moz-box-shadow: 0px 1px 0px #3a3a3a;
        text-align: center;
        padding: 8px;
        margin: 0px;
        font-weight: normal;
        font-size: 18px;
        font-family: Lucida Grande, Helvetica, Arial, sans-serif;
/*      background: linear-gradient(to top right, #00cc99 20%, #ff3300 87%);*/
         background:#19919e;
        }
.footer {
  text-align: center;
  padding: 3px;
/*   background: linear-gradient(to top right, #00cc99 20%, #ff3300 87%);*/
   background: #19919e;


  color:black;
}
.success{
color:#4F8A10;
font-weight:bold;
font-size:20px;
}

</style>


<div class="container-fluid">

<div class="container">
<center>
<h5 class="register-heading">
<?php
if($usercategory=='faculty'){
echo '<div class="fac">Grievance Redressal Registration for Faculty</div>'; }
elseif($usercategory=='staff'){
echo "Grievance Redressal Registration for Staffs"; }
else{
echo "Grievance Redressal Registration for Students"; }
?>
</h5>
</center>
<br>
<hr>
<?php
$name =  $_POST['name'];
$subject=  $_POST['subject'];
$msg=  $_POST['msg'];
$createddate=date('d/m/Y h:i:s a');
$filename = $_FILES["fileToUpload"]["name"];

$con=mysqli_connect("localhost","root","Password1","grievance");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO grievanceredressal(usercategory,name,subject,msg,file,createddate)VALUES('$usercategory','$name','$subject','$msg','$filename','$createddate')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

else{

	require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Host = 'smtp2.iitm.ac.in';
$mail->SMTPAuth = true;
$mail->Username = 'ebind';
$mail->Password = 'pgSiitmcc';
$mail->SMTPSecure = 'tls';
$mail->Port = 25;

$mail->From= $email;
$mail->FromName = $email;

$nam = $_FILES["fileToUpload"]["name"];
$tmp_name = $_FILES['fileToUpload']['tmp_name'];
$location = '/var/www/html/grievanceredressal/upload/';
$fullpath = '/var/www/html/grievanceredressal/upload/'.$nam;
if(move_uploaded_file($tmp_name, $location.$nam)){
$mail->AddAttachment($fullpath);
}

if($usercategory=="faculty"){
$mail->addAddress("ccprj05@iitm.ac.in");
$mail->addAddress("ccprj36@iitm.ac.in");
$mail->addAddress("ccprj37@iitm.ac.in");
//$mail->addAddress("ccprj06@iitm.ac.in");
}
elseif($usercategory=="staff"){
$mail->addAddress("ccprj05@iitm.ac.in");
$mail->addAddress("ccprj36@iitm.ac.in");
//$mail->addAddress("ccprj06@iitm.ac.in");
}
else{
	$mail->addAddress("ccprj05@iitm.ac.in");
	$mail->addAddress("ccprj36@iitm.ac.in");
$mail->addAddress("ccprj37@iitm.ac.in");
//$mail->addAddress("director@iitm.ac.in");
//$mail->addAddress("ccprj06@iitm.ac.in");
}

$mail->isHTML(true);

$mail->Subject ="[New mail from IITM Grievance Redressal Portal]".$subject;
$mail->Body ="
Dear Sir/Madam,<br><br>
Name : $name<br>
<b>$subject</b><br>
$msg";

if(!$mail->send()) {
echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
else {
echo '<div class="success">Dear User<br>Thank you, your response has been forwarded to concerned authority.</div>';
                        $mail->ClearAddresses();
                        $mail->addAddress($email);
                        $mail->Body = "Dear Sir/Madam,<br><br>
                                        Name : $name<br>
                                        <b>$subject</b><br>
                                        $msg";
                                if(!$mail->send()) {
                                echo 'Message could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                                }
                                else{ echo '';
                                }

}

}
?>
</div>
</div>
