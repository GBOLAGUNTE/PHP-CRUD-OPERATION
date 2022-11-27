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
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-4 mb-3">
            <small>Delete Person</small>
            </h1>

            <?php
            if (isset($_REQUEST['name'])) {
                echo "<div class='alert alert-warning mb-4'><h2>Are you sure you want to delete ".$_REQUEST['name']." record </h2> </div>";
            }
            ?>

            <form action="deleterecord.php" method="post">
            <input type="hidden" name="id" value="<?php if(isset($_REQUEST['id'])){echo $_REQUEST['id'];} ?>">
            <input type="submit" value="Delete" name="btnDelete" class="btn btn-danger">
            <input type="submit" value="Cancel" name="btnCancel" class="btn btn-secondary">
            </form>
        </div>
    </div>
</div>