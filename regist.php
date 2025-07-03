<?php
session_start();
if(!isset($_SESSION['usernamee'])) {
	header("location:log1.php");
}
?>
<?php $usercategory=$_GET['usercategory'];?>

<?php
$z=$_SESSION['usernamee'];
?>
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>
<script src="jquery.min.js"></script>
<script src="jquery.validate.min.js"></script><!-- jquery validation -->
<style>
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
	/** background:#19919e;*/
        }

.container
{

padding:30px 10px;
margin-top:80px;
margin-bottom:80px;
border:none!important;
box-shadow:0 9px 50px 0 rgba(0,0,0,0.6);
width:40%;

}
.register-heading
{
color:black;
font-size:23px;
}

#img
{
margin-left:-30px;

        height:110px;
        margin-top:1px;


  padding:15px;
  width: 350px;
}
.footer {
  text-align: center;
  padding: 3px;
/*   background: linear-gradient(to top right, #00cc99 20%, #ff3300 87%);*/
   /**background: #19919e;*/


  color:black;
}
.btnRegister{
/*    float: right;*/
    margin-top: 7%;
    border: none;
    border-radius: 1.1rem;
    padding: 2%;
    background:linear-gradient(to bottom, #ffccff 0%, #00cc99 100%);
    color: black;
    font-weight: 600;
    width: 40%;
    cursor: pointer;
}

</style>
<script>
function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024;// in MB
        if (FileSize > 1000) {
            alert('Maximum file size is 1 MB');
           file.value = "";
        } else {
        }
  if ( /\.(pdf)$/i.test(file.files[0].name) === false ) { alert("Please Upload a PDF File!");file.value=""; }


    }
</script>


<script>
 $(document).ready(function(){
 $("#file").keyup(function(){
 var file = $(this).val().trim();
 if(file != ''){
 $.ajax({
 url: 'file.php',
 type: 'post',
 data: {file:file},
 success: function(response){
 $('#file_response').html(response);
 }
 });
 }else{
 $("#file_response").html("");
 }
 });
 });
 </script>

<div class="container-fluid">
<div class="page-header">
<img src="newlogo.png"class="img"alt="index"id="img">
</div>
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
<form method="post" action="" enctype="multipart/form-data" id="register-form">
<center>
<div class="row">
<div class="col-md-4">
<label for="name"class="form-label"><b>Name</b></label>
</div>
<div class="col-md-6">
<input type="text"name="name"class="form-control">
</div>
</div>
<br>
<div class="row">
<div class="col-md-4">
<label for="subject"class="form-label"><b>Subject</b></label>
</div>
<div class="col-md-6">
<input type="text"name="name"class="form-control">
</div>
</div>
<br>
<div class="row">
<div class="col-md-4">
<label for="msg"class="form-label"><b>Your Message</b></label>
</div>
<div class="col-md-6">
<textarea  type="text"name="msg"class="form-control"></textarea>
</div>
</div>
<br>
<div class="row">
<div class="col-md-4">
<label for="uploadfile"class="form-label"><b>Upload File</b><font color="#000000" size="-4" style="font-weight:bold">(Upload File Less Than 1MB)</font>  </label>
</div>
<div class="col-md-6">
<input type="file"id="file"name="fileToUpload"class="form-control"onchange="ValidateSize(this)"></div>
<div id="file_response"></div>
</div>
<br>
<input type="submit" class="btnRegister"name="submit"value="Submit"formaction="succ1.php?usercategory=<?php echo $usercategory;?>">

</center>
</form>
</div>
</div>

</div>
<div class="footer">
<p>© E-Services Team, Computer Center</p>
</div>


