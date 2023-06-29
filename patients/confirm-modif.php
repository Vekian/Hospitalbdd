<?php

try 
{
    $basePatients = new PDO('mysql:host=127.0.0.1;dbname=hospitalE2N;charset=utf8', 'root');
}

catch(Exception $e) 
{
    die('Erreur : ' .$e->getMessage());
}

    $id = $_POST['id'];
    $lastName = $_POST['lastname'];
    $firstName = $_POST['firstname'];
    $birthDate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];


    $insertPatient = $basePatients->prepare('UPDATE patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail WHERE id = :id');
    $insertPatient->execute([
        'lastname' => $lastName,
        'firstname' => $firstName,
        'birthdate' => $birthDate,
        'phone' => $phone,
        'mail' => $mail,
        'id' => $id,
    ]);
header("location:../liste-patients.php");