<?php
header('Content-Type: application/json');

header('Acess-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: PUT');
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

$sql=" UPDATE crud.form SET Name='{$name}',email='{$email}',password='{$password}',address='{$address}',city='{$city}' WHERE sno={$sno}";

if(mysqli_query($con,$sql))
{
    echo json_encode(array('message'=>'updated record found.','status'=>true));

}
else{

    echo json_encode(array('message'=>'no record updated.','status'=>false));

}

?>