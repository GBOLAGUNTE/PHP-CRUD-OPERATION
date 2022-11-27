
<?php
 include_once "shared/constants.php" ;
 include_once "shared/person.php"; 
 $myobj = new Person();

 if (isset($_REQUEST['id'])) {
   //make reference to getclub method
   $person = $myobj->getPerson($_REQUEST['id']);
 
   echo "<pre>";
   print_r($person);
   echo "</pre>";
 }

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
            if (empty($_REQUEST['phone'])) {
              $errors[] = "phonenumber is required";
            }
            if (empty($_REQUEST['pwd'])) {
              $errors[] = "password is required";
            }
            
            if (empty($errors)) {
                // sanitize inpts
                
                $name = $_REQUEST['name'];
                $email = $_REQUEST['email'];
                $phone = $_REQUEST['phone'];
                $pswd =  $_REQUEST['pwd'];
                $id = $_REQUEST['id'];
             
                // add club class
                include_once "shared/person.php";
                $obj = new Person(); // club object
                // reference insertClub method and pass parameters
                $output = $obj->updateClub($name,$phone,$id);
             
                if ($output == 'success' || $output == 'NOTHING TO UPDATE'){
                // redirect to allclubs.php
               //  $msg = "success";
               //  header("Location: allclub.php?msg=$msg");
               //  exit();
                header("Location: allpersons.php?msg=$output");
                exit();
                }else {
                 $errors[] = $output;
                }
             
               }
        }
?>
    <?php
    if (isset($errors)) {
      foreach ($errors as $key => $value ){
        echo "<div class='alert alert-danger'>$value</div>";
      }
    }
    ?>
            <form method="post" name="personform" id="editform" action='edit.php?id=<?php if (isset($_REQUEST['id'])) {
     echo $_REQUEST['id'];
    } ?>'  >
  <div class="form-group">

    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter name" name="name" value="<?php
    if(isset($person['name'])){
      echo $person['name'];
    }
    ?>">
   
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php
    if(isset($person['email'])){
      echo $person['email'];
    }
    ?>">
   
  </div>
  <div class="form-group">
    <label>Phone Number</label>
    <input type="text" class="form-control" placeholder="Enter phone number" name="phone" value="<?php
    if(isset($person['phonenumber'])){
      echo $person['phonenumber'];
    }
    ?>">
   
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter password" name="pwd" value="<?php
    if(isset($person['password'])){
      echo $person['password'];
    }
    ?>">
   
  </div>

  <input type="hidden" name="id" value="<?php if(isset($person['id'])){echo $person['id'];} ?>">
  <button type="submit" class="btn btn-primary" id="btnsubmit" name="btnsubmit">Save Changes</button>
</form>
            </div>
        </div>
        
    </div>


  </body>
</html>
