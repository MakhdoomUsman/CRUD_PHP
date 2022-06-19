<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update Data</h1>
    <?php

$localhost="localhost";
$username="root";
$password="";
$db="crud";

$data=mysqli_connect($localhost,$username,$password,$db);


$s_id=$_GET['id'];

$query="SELECT * from crud.form where form.sno='$s_id'";


$result=mysqli_query($data,$query);

$info=$result->fetch_assoc();



?>
 <form action="update_data.php" method="POST" enctype="multipart/form-data">
 <input
            type="text"
            name="sno"
            value="<?php echo "{$info['sno']}";?> "
            hidden>
                 
 <label>Name</label>
          <input
            type="text"
            name="Name"
            value="<?php echo "{$info['Name']}";?> "
            placeholder="Name"
          />
         
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail">Email</label>
          <input
            type="email"
            name="email"
            value="<?php echo "{$info['email']}";?> "
            placeholder="Email"
          />
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword">Password</label>
          <input
            type="password"
            name="password"
            value="<?php echo "{$info['password']}";?> "
            placeholder="Password"
          />
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Address</label>
        <input
          type="text"
          name="Address"
          value="<?php echo "{$info['address']}";?> "
          placeholder="1234 Main St"
        />
      </div>
        <div class="form-group col-md-6">
          <label for="inputCity">City</label>
          <input type="text" name="City" 
          value="<?php echo "{$info['city']}";?> " />
        </div>
        <label for="">Old image</label>
        
        <img height='150' width='150' src="<?php echo "{$info['image']}";?>">

        <label for="">change image</label>
        <input type="file" name="image" id="image">
      <button type="submit" name="update" value="update_data">Sign in</button>
    </form>
<?php

?>

</body>
</html>