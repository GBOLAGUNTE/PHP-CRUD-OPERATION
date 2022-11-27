<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
    
</body>
</html>
<?php 
if (isset($_REQUEST['btnCancel'])) {
   // redirect to allclubs.php
   header("Location: allpersons.php");
   exit;
}

if (isset($_REQUEST['btnDelete'])) {
    # add club class
    include_once "shared/person.php";

    // create object of class club
    $clubobj = new Person();
    $output = $clubobj->deleteClub($_REQUEST['id']);
    
    if ($output == true) {
        $status = "success";
        $msg = "Record was successfully deleted";
    }else {
        $status = "failed";
        $msg = "Oops ! something went wrong, try it later";
    }

    //redirect to allclubs.php
    header("Location: allpersons.php?msg=$msg&status=$status");
}
?>