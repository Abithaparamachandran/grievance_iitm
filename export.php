<?php
//    if(isset($_POST["Export"])){

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID','Name', 'Subject','Message','File','Created Date'));
    $con=mysqli_connect("localhost","root","r00t@123","liveportal");
    $query = "SELECT id,name,subject,msg,file,createddate from grievanceredressalusers";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result))
    {
    fputcsv($output, $row);
    }
    fclose($output);
//    }
?> 
