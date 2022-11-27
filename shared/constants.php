<?php
define("DB_HOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","crudoperation");

define("APP_NAME","CRUD");


function sanitizeInput($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);

    return $data;

}
?>