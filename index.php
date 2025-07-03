<html lang="en">
<head>
<title>Grievanceredressal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="jquery.min.js"></script>
<script src="2jquery.min.js"></script>
<script src="bootstrap.bundle.min.js"></script>
<script src="bootstrapValidator.js"></script>
<style>
body {
    background: white;
    font-family: 'Roboto', sans-serif;
}
#img{
/*width:250px;
height:100px;*/

margin-left:-60px;

        height:110px;
        margin-top:1px;
  padding:15px;
  width: 350px;
}
.login-box {
    margin-top: 75px;
    height: auto;
    background: white;
    text-align: center;
    box-shadow: 0 3px 16px rgba(0, 0, 1, 0.66), 0 3px 16px rgba(0, 0, 1, 0.63);

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

.login-key {
    height: 100px;
    font-size: 80px;
    line-height: 100px;
    background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}



.login-title {
    margin-top: 222px;
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: -90px;
    font-weight:italic;
    color: black;
}
.login-form {
    margin-top: 25px;
    text-align: left;
}
input[type=text] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    color: #ECF0F5;
}

input[type=password] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #ECF0F5;
}

.form-group {
    margin-bottom: 40px;
    outline: 0px;
}
.form-control:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 2px solid #0DB8DE;
    outline: 0;
    background-color: white;
    color: white;
}

input:focus {
    outline: none;
    box-shadow: 0 0 0;
}

label {
    margin-bottom: 0px;
}

.form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
}
.btn-outline-primary {
    border-color: #0DB8DE;
    color: linear-gradient(to bottom, #00ffff 0%, #ff6600 100%);
    border-radius: 0px;
    font-weight: bold;
    letiter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.btn-outline-primary:hover {
    background-color: #0DB8DE;
    right: 0px;
}

.login-btm {
    float: left;
}

.login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
}

.login-text {
    text-align: left;
    padding-left: 0px;
    color: #A2A4A4;
}

.loginbttm {
    padding: 0px;
}

.page-header {
        color:white;
        text-shadow: 0px -1px 0px #000;
/*      border-bottom: solid #181818 1px;*/
        -moz-box-shadow: 0px 1px 0px #3a3a3a;
        text-align: center;
        padding: 8px;
	margin: 0px;
        width:-10px;
        height:10px;
        font-weight: normal;
        font-size: 20px;
        font-family: Lucida Grande, Helvetica, Arial, sans-serif;
/*      background: linear-gradient(to top right, #00cc99 20%, #ff3300 87%);*/
	/* background:#19919e;*/
        }
.footer {
  text-align: center;
  margin-top:230px;
  margin-bottom:12px;

  padding:2px 3px;
/*   background: linear-gradient(to top right, #00cc99 20%, #ff3300 87%);*/
 /*  background: #19919e;*/


  color:black;
}
.container 
{
margin-top:100px;
margin-bottom:100px;
}

</style>
</head>

<body>
<div class="page-header">
<img src="newlogo.png"class="img"alt="index"id="img">
</div>
<form action=""method="POST">

<div class="container">
<div class="row">
<div class="col-lg-3 col-md-2"></div>
<div class="col-lg-6 col-md-8 login-box">
<div class="col-lg-12 login-key">
<i class="fa fa-key"aria-hidden="true"></i>
</div>                                  
<div class="col-lg-12 login-title">
 Grievance Redressal Portal for Employees and Students
</div>
<div class="col-lg-12 login-form">
<div class="col-lg-12 login-form">
<form>
<center>
<div class="form-group">
<button type="submit"class="btnRegister"name="faculty"value="Faculty Login"formaction="faculty1.php?usercategory=faculty">Faculty Login</button>
</div>
<div class="form-group">
<button type="submit"class="btnRegister"name="staff"value="Staff  Login"formaction="staff.php?usercategory=staff">Staff  Login</button>
</div>
<div class="form-group">
<button type="submit"class="btnRegister"name="student"value="Student Login"formaction="student.php?usercategory=student">Student Login</button>
</div>
</div>
</center>
</form>
</div>
</div>
<div class="col-lg-3 col-md-2"></div>
</div>
</div>
</form>

<div class="footer">
<p>© E-Services Team, Computer Center</p>
</div>
</body>

</html> 
