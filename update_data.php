<?php
$localhost="localhost";
$username="root";
$password="";
$db="crud";

$data=mysqli_connect($localhost,$username,$password,$db);

if(!$data)
{
    die("dei due to " .mysqli_connect_error());
}
if(isset($_POST['update'])){
   

    $u_sno = $_POST["sno"];
    $u_name = $_POST["Name"];
    $u_email = $_POST['email'];
    $u_password = $_POST['password'];
    $u_Address = $_POST['Address'];
    $u_City = $_POST['City'];

    $file=$_FILES['image']['name'];
   $tmpfile=$_FILES['image']['tmp_name'];

    $dst="./image/".$file;

    $db_dst="image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    $query="UPDATE crud.form SET Name='$u_name', email='$u_email', password='$u_password', address='$u_Address', City='$u_City', image='$db_dst' WHERE sno='$u_sno'";

    $result=mysqli_query($data,$query);

    if($result)
    {
        header('Location: main.php');
    }
    else {
        echo "not updated";
    }
}

?>