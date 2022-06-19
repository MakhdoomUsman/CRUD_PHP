<?php

$localhost="localhost";
$username="root";
$password="";
$db="crud";

$db=mysqli_connect($localhost,$username,$password,$db);


$s_id=$_GET['id'];

$query="DELETE from crud.form where form.sno='$s_id'";

$result=mysqli_query($db,$query);
if($result){
    header('Location: main.php');
}
else{
    echo "not updated";
}

?>
