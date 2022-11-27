<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    
</body>
</html>
<a href="addperson.php" class="btn btn-success">ADD</a>
<?php
        if (isset($_REQUEST['status'])) {
          ?>  
       
        
        <div class="alert alert-success">
            <p>
                <?php if (isset($_REQUEST['msg'])) {
                    echo $_REQUEST['msg'];
                }
               ?>

           </p>

        </div>
        <?php
        }
        ?>
<table class="table table-striped">
    <thead>
        <th>S/N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        
    </thead>
    <tbody>
        <?php
include_once "shared/person.php";
$obj = new Person();

$allpersons = $obj-> getPersons();
if (count($allpersons) > 0) {
    $counter = 1;
    foreach ($allpersons as $key => $value){


?>
<tr>
    <td><?php echo $counter++ ?></td>
    <td><?php echo $value['name']; ?></td>
    <td><?php echo $value['email']; ?></td>
    <td><?php echo $value['phonenumber']; ?></td>
    <td>
                    <a href="edit.php?id=<?php echo $value['id'] ?>" class="btn btn-success">Edit</a>
                    <a href="deleteperson.php?id=<?php echo $value['id'] ?>&name=<?php echo $value['name'] ?>" class="btn btn-danger">Delete</a>
                </td>
</tr>
<?php

    }
}
?>
    </tbody>
</table>