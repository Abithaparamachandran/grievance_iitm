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
echo "Grievance Redressal Registration for Faculty"; }
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


function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}

//echo "before file upload";
if (isset($_FILES["fileToUpload"]["name"])) {
  //      echo "file name exist";
$errors=0;
$image=$_FILES['fileToUpload']['name'];
if ($image)
{

        //echo "image exist";
        $filename1 = stripslashes($_FILES['fileToUpload']['name']);
        //echo $filename1;
        $extension = getExtension($filename1);
        $extension = strtolower($extension);
       // echo "extension is".$extension;
        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png")
                && ($extension != "gif")&& ($extension != "JPG") && ($extension != "JPEG")
                && ($extension != "PNG") && ($extension != "GIF") && ($extension != "pdf"))
        {
                echo "unknown";
                $error[]='Unknown extension!';
                $errors=1;
        }
       else
        {
                //echo "else not pdf";
        if($extension != "pdf")
        {
                echo "jj";
        $image_info = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
$image_width = $image_info[0];
$image_height = $image_info[1];
if($image_width <= 600 && $image_height<= 500)
{

                if (file_exists("upload/" . $_FILES["fileToUpload"]["name"]))
      {
     $error[]= "Filename already exists.Rename it";
      }
          else
          {
          $image_name=time().'.'.$extension;
                $filename="upload/".$image_name;
        $copied = copy($_FILES['fileToUpload']['tmp_name'], $filename);
                if (!$copied)
                {
                        echo 'not copied';
                        $errors=1;
                }
                else
                echo '';
	  }
		}
        else {
                $error[]='Choose correct size file below 500kb';
                echo 'File Size Format Wrong';
    }


        }


        if($extension == "pdf")
        {
        if (file_exists("upload/" . $_FILES["fileToUpload"]["name"]))
      {
	      $error[]= "Filename already exists.Rename it";
	      echo 'Filename already exists.Rename it';
      }
          else
          {
          $image_name=time().'.'.$extension;
                $filename="upload/".$image_name;
        $copied = copy($_FILES['fileToUpload']['tmp_name'], $filename);
                if (!$copied)
                {
                        echo '';
                        $errors=1;
                }
                else echo '';
       }




                }

       }
	}
 else {
$error[]= 'Choose a correct size file';
        //$newname='';
    }
}

if(empty($error))
{

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
$mail->addAddress("deanadmn@iitm.ac.in");
$mail->addAddress("registrar@iitm.ac.in");
$mail->addAddress("director@iitm.ac.in");
//$mail->addAddress("ccprj05@iitm.ac.in");
}
elseif($usercategory=="staff"){
$mail->addAddress("registrar@iitm.ac.in");
$mail->addAddress("director@iitm.ac.in");
//$mail->addAddress("ccprj06@iitm.ac.in");
}
else{
	$mail->addAddress("dost@iitm.ac.in");
	$mail->addAddress("dost@smail.iitm.ac.in");
	$mail->addAddress("deanac@iitm.ac.in");
	$mail->addAddress("deanac@smail.iitm.ac.in");
	$mail->addAddress("deanar@iitm.ac.in");
	$mail->addAddress("deanar@smail.iitm.ac.in");
        $mail->addAddress("director@iitm.ac.in");
//$mail->addAddress("ccprj05@iitm.ac.in");
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
echo '<div class="success">Dear User<br>Thank you, your response has been forwarded to concerned authority.';
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
}
?>
</div>
</div>
