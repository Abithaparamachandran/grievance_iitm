<?php
$username='';
$password='';
?>

<?php $usercategory=$_GET['usercategory']; ?>

<?php
error_reporting(0);
ob_start();
session_start();
        if(isset($_POST['username']) && isset($_POST['password'])){
                $_SESSION['username']=$_POST['username'];

$app_user = "***";
$app_pass = "***";


        $username = $_POST['username'];
        $password = $_POST['password'];

        $userdn = '';

        // Connect to LDAP service
        $conn_status = ldap_connect('***', '389');
        if ($conn_status === FALSE) {
            die("Couldn't connect to LDAP service");

}
ldap_set_option($conn_status, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($conn_status, LDAP_OPT_REFERRALS, 0);

         $bind_status = ldap_bind($conn_status, $app_user, $app_pass);
         if ($bind_status === FALSE) {
         die("Couldn't bind to LDAP as application user");
 }
$query = "cn=" . $username . "";
        $search_base = "ou=employee,dc=ldap,dc=iitm,dc=ac,dc=in";
        $search_status = ldap_search($conn_status, $search_base, $query, array('dn') );
        if ($search_status === FALSE) {
           die("Search on LDAP failed");
        }

        $result = ldap_get_entries($conn_status, $search_status);
        if ($result === FALSE) {
            die("Couldn't pull search results from LDAP");
        }

        if ((int) @$result['count'] > 0) {
            $userdn = $result[0]['dn'];
        }

        if (trim((string) $userdn) == '') {
            die("Empty DN. Only Faculty can Login.");
        }

        @$auth_status = ldap_bind($conn_status, $userdn, $password);
        if ($auth_status === FALSE) {
            die("Couldn't bind to LDAP as user!");
        }
        header("Location:regist.php?usercategory=$usercategory");
        }

?>




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

.login-box {

    margin-top: 75px;
    height: auto;
  /**  background: #dae8eb;*/
    text-align: center;
    box-shadow: 0 3px 6px rgba(0, 0, 2, 0.36), 0 3px 6px rgba(0, 0, 2, 0.43);

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
    margin-top: 15px;
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 15px;
    font-weight: bold;
    color: black;
 

}


.login-form {
    margin-top: 25px;
    text-align: left;
}

input[type=text] {
  /*  background-color: #dae8eb;*/
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
   /* background-color: #dae8eb;*/
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
    background-color: #1A2226;
    color: #ECF0F5;
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
    color: #0DB8DE;
    border-radius: 0px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 13px rgba(0, 0, 2, 2.12), 0 1px 12px rgba(0, 0, 2, 2.24);
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
.login-text {
    text-align: left;
    padding-left: 0px;
    color: #A2A4A4;
}

.loginbttm {
    padding: 0px;
}
</style>
</head>
<body>
<form action=""method="POST">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-2"></div>
<div class="col-lg-6 col-md-8 login-box">
<div class="col-lg-12 login-key">
<i class="fa fa-key" aria-hidden="true"></i>
</div>
<div class="col-lg-12 login-title">
Grievance Redressal Login for Faculty
</div>
<div class="col-lg-12 login-form">
<div class="col-lg-12 login-form">
                        <form>
                            <div class="form-group">
                                <!--label class="form-control-label">ADS/Email Username</label-->
                                <input type="text" class="form-control"placeholder="Enter LDAP Username"name="username">
                            </div>
                            <div class="form-group">
                                <!--label class="form-control-label">Password</label-->
                                <input type="password" class="form-control"placeholder="Enter Password"name="password">
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btnRegister">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
	</div>
</form>
</body>
</html>
<?php
$_SESSION['usernamee'] =$_POST['username'];
?>
