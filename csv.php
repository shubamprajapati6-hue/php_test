<?php
include"db.php";
   
header("content-type:text/csv");

header("content-disposition:attachment; filename=user_data.csv");

$output=fopen("php://output","w");

fputcsv($output,array('id','name','email','phone','city'));
$result=$conn->query("select * from user_data");


while ($row=$result->fetch_assoc()) {
    fputcsv($output,$row);
}
?>

