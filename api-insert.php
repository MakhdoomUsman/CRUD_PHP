<?php
header('Content-Type: application/json');

header('Acess-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

$data=json_decode(file_get_contents("php://input"),true);

$sno=$data['ssno'];
$name=$data['sname'];
$email=$data['semail'];
$password=$data['spassword'];
$address=$data['saddress'];
$city=$data['scity'];
// $mem_sno=$data['simage'];

include "config.php";

$sql="INSERT into crud.form(sno,Name,email,password,address,city) VALUES('$sno','{$name}','{$email}','{$password}','{$address}','{$city}')";

if(mysqli_query($con,$sql))
{
    echo json_encode(array('message'=>'inserted record found.','status'=>true));

}
else{

    echo json_encode(array('message'=>'no record inserted.','status'=>false));

}

?>