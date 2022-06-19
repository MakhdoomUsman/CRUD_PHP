<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Dsiplay data</title>
</head>
<body>
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
    ?>
    <table class="table">
    <thead>
      <tr>
        <!-- <th scope="col">#</th> -->
        <th scope="col">Serial Number</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
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


    </tr>

<?php
    }
    ?>
    
      </tbody>
</table>
</body>
</html>