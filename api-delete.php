<?php
header('Content-Type: application/json');

header('Acess-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');


$data=json_decode(file_get_contents("php://input"),true);

$mem_sno=$data['sid'];

include "config.php";

$sql="DELETE from crud.form WHERE sno = {$mem_sno}";

if(mysqli_query($con,$sql))
{
    echo json_encode(array('message'=>'data been deleted.','status'=>false));
}
else{

    echo json_encode(array('message'=>'do not deleted.','status'=>false));

}

?>