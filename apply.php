<?php

require_once 'source/db_connect.php';

if(isset($_POST['apply'])) {

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $phonenumber = $_POST['phonenumber'];
      $website = $_POST['website'];
      $speciality = $_POST['speciality'];
      
    try {
      $SQLInsert = "INSERT INTO applications (firstname, lastname, email, phonenumber,
                    website, speciality, sent_at)
                   VALUES (:firstname, :lastname, :email, :phonenumber,
                    :website, :speciality, now())";

      $statement = $conn->prepare($SQLInsert);
      $statement->execute(array(
        ':firstname' => $firstname, 
        ':lastname' => $lastname,
        ':email' => $email, 
        ':phonenumber' => $phonenumber,
        ':website' => $website, 
        ':speciality' => $speciality
      ));

      if($statement->rowCount() == 1) {
        header('location: index.html');
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>