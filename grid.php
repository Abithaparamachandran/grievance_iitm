<?php
include"dbconfig.php";
$sql="SELECT * FROM grievanceredressal";
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Grievance View</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>
.container
{
padding-right: 2120px;
margin-top:80px;
margin-bottom:80px;
border:none!important;
box-shadow:0 9px 50px 0 rgba(0,0,0,0.6);
width:100%;
background:#ebebe0;
}
</style>
</head>
<body>
<form method="post" action="export.php" align="center">
		     <input type="submit" name="export" value="CSV Export" class="btn btn-success" />
</form>
<div class="container">
<h2>Users</h2>
<hr>
<table class="table">
<thead>
<tr>
<th>usercategory</th>
<th>name</th>
<th>subject</th>
<th>msg</th>
<th>file</th>
<th>createddate</th>
</tr>
</thead>
<tbody>
<?php
        if($result->num_rows > 0) {
	 while($row =$result->fetch_assoc()){
?>
<tr>
<td><?php echo $row['usercategory'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['subject'];?></td>
<td><?php echo $row['msg'];?></td>
<td><?php echo $row['file'];?></td>
<td><?php echo $row['createddate'];?></td>
</tr>
</form>
<?php
	 }
 }
?>
</tbody>
</table>
</div>
</body>
</html>



