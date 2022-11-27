<?php
 include_once "shared/constants.php" 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

  
    <title> <?php echo APP_NAME ?></title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
            <?php

          if (isset($_REQUEST['btnsubmit'])){

          
         
            $errors = array();
            if (empty($_REQUEST['name'])) {
              $errors[] = "name is required";
            }
            if (empty($_REQUEST['email'])) {
              $errors[] = "email is required";
            }
            if (empty($_REQUEST['pnumber'])) {
              $errors[] = "phonenumber is required";
            }
            if (empty($_REQUEST['pwd'])) {
              $errors[] = "password is required";
            }
            if(empty($errors)){
          include_once "shared/person.php";
          $personobj = new Person();

          $output =$personobj ->insertPerson($_REQUEST['name'],$_REQUEST['email'],$_REQUEST['pnumber'],$_REQUEST['pwd'],);
              
          if ($output != 'success'){
            echo $output;
          }else{
            // redirect to another page
          header("Location: allpersons.php?msg=$output");

          }
        }
        }
?>
            <form method="post">
  <div class="form-group">
    <?php
    if (isset($errors)) {
      foreach ($errors as $key => $value ){
        echo "<div class='alert alert-danger'>$value</div>";
      }
    }
    ?>
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter name" name="name">
   
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email">
   
  </div>
  <div class="form-group">
    <label>Phone Number</label>
    <input type="number" class="form-control" placeholder="Enter phone number" name="pnumber">
   
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter password" name="pwd">
   
  </div>


  <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>
</form>
            </div>
        </div>
        
    </div>


  </body>
</html>
