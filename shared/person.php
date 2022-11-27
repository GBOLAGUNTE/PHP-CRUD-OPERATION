<?php
include_once "shared/constants.php";

class Person{
    var $name;
   var $email;
   var $number;
    var $pswd;
    var $mycon;


function __construct(){
    // coonect to database
    $this->mycon = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if ($this->mycon->connect_error) {
        die("Connection Failed ".$this->mycon->connect_error);
    }else{
        // echo "connection successful!";
    }
}
    function insertPerson($name,$email,$number,$pswd){
        $password = password_hash($pswd, PASSWORD_DEFAULT);
        $stmt = $this->mycon->prepare("INSERT INTO crud (name,email,phonenumber,password) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss",$name,$email,$number,$password);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            return true;
        }else {
            return false;
        }
    }

    function getPersons(){
        $statement = $this->mycon->prepare("SELECT * FROM crud");
        $statement->execute();
        $result=$statement->get_result();
        $records = array();
        if($result->num_rows > 0) {
            //fetch records
            while ($rows = $result->fetch_assoc()) {
                $records[] = $rows;
            }
            return $records;
        }else {
            return $records;
        }
    }

    function getPerson($id){
        // prepare the statement
        $statement = $this->mycon->prepare("SELECT * FROM crud WHERE id=?");
        //bind
        $statement->bind_param("i",$id);
        //execute
        $statement->execute();
       
        //get result set
        $result = $statement->get_result();
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();

        }else {
            return "Oops! something happened!";
        }
    }

    #end getClub method

    #begin updateClub method
    function updateClub($name,$number,$id){
        // prepare the statement
        $statement = $this->mycon->prepare("UPDATE crud SET name=?,
        phonenumber=? WHERE id=?");
        //bind parameters
        $statement->bind_param("ssi", $name,$number, $id);
        // execute the query
        $statement->execute();

        if ($statement->affected_rows == 1) {
            return "success";
        }elseif ($statement->affected_rows == 0) {
            return "nothing to update";
        }else {
            return "Oops! something went wrong ".$statement->error;
        }

    }


    #end updateClub method

    #begin delete method
    function deleteClub($id){
        $statement = $this->mycon->prepare("DELETE FROM crud WHERE id=?");
    // bind parameter
    $statement->bind_param("i",$id);
    //execute
    $statement->execute();

    if ($statement->affected_rows == 1) {
       return true;
    }else {
       return false;
    }
    }

}
?>