<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <title>Submittion page</title>
  </head>
  <body>
<?php
if(isset($_POST['name'])){
$server="localhost";
$username="root";
$password="";
$con= mysqli_connect($server,$username,$password);

if(!$con){
    die("conennection to this database failed due to ".mysqli_connect_error());
}
// echo "Success connecting to the db";
$sno = $_POST["sno"];
$name = $_POST["name"];
$email = $_POST['email'];
$password = $_POST['password'];
$Address = $_POST['Address'];
$City = $_POST['City'];
// $state = $_POST['state'];
$file = $_FILES['image']['name'];
$tmp_file=$_FILES['image']['tmp_name'];
$dst="./image/".$file;

$dst_db="image/".$file;

move_uploaded_file($tmp_file,$dst);

$sql="INSERT INTO `crud`.`form` (`sno`,`Name`,`email`,`password`,`address`,`city`,`image`) VALUES ('$sno','$name','$email','$password','$Address','$City','$dst_db');";
// echo $sql;

if($con->query($sql)==true){
    echo "sucess";
}
else{
    echo "error: $sql </br> $con->error";
}
}

?>

    <form action="main.php" method="post" enctype="multipart/form-data">
      <div class="form-row">
          <label>Serial Number</label>
          <input
            type="text"
            name="sno"
            id="sno"
            placeholder="Your Serial Number"
          />
        </div>
          <label>Name</label>
          <input
            type="text"
            name="name"
            id="name"
            placeholder="Name"
          />
        </div>
        <div name="form-group col-md-6">
          <label for="inputEmail">Email</label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Email"
          />
        </div>
        <div name="form-group col-md-6">
          <label for="inputPassword">Password</label>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Password"
          />
        </div>
      </div>
      <div name="form-group">
        <label for="inputAddress">Address</label>
        <input
          type="text"
          name="Address"
          id="Address"
          placeholder="1234 Main St"
        />
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">City</label>
          <input type="text" name="City" id="City" />
        </div>
      </div>
      <di class="form-group">
        <input
          type="file"
          name="image"
          id="image"
        />
        <br>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    <?php

$localhost="localhost";
$username="root";
$password="";

$db=mysqli_connect($localhost,$username,$password);

if(!$db)
{
    die( "not connected ".mysqli_connect_error());
}

$query="SELECT * from crud.form";

$result=mysqli_query($db,$query);

if(isset($_GET['search'])){

  $text=$_GET['search_text'];

  $query="SELECT * from crud.form where name LIKE '%".$text."%' ";

  $result=mysqli_query($db,$query);
}
?>
<form action="main.php" method= "GET" align="center" >

<input type="text" name="search_text">
<input type="submit" value="Search Something" name="search">
</form>
<br>
<table class="table">
<thead>
  <tr>
    <!-- <th scope="col">#</th> -->
    <th scope="col">Serial Number</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Delete</th>
    <th scope="col">Update</th>
  </tr>
</thead>
<tbody>
<?php
while($info=$result->fetch_assoc())
{?>

<tr>
  <!-- <th scope="row"></th> -->
  <td><?php echo "{$info['sno']}"; ?></td>
  <td><?php echo "{$info['Name']}"; ?></td>
  <td><?php echo "{$info['email']}"; ?></td>
  <?php echo "<td><a href='delete.php?id={$info['sno']}'>Delete</a></td>"; ?>
  <?php echo "<td><a href='update.php?id={$info['sno']}'>Update</a></td>"; ?>
  


</tr>

<?php
}
?>
  </tbody>
</table>
  </body>
</html>
