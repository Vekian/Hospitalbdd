<?php
try 
{
    $basePatients = new PDO('mysql:host=127.0.0.1;dbname=hospitalE2N;charset=utf8', 'root');
}

catch(Exception $e) 
{
    die('Erreur : ' .$e->getMessage());
}

    if(isset($_POST['lastname'])) {
        $lastName = $_POST['lastname'];
    }
    if (isset($_POST['firstname'])) {
        $firstName = $_POST['firstname'];
    }
    if (isset($_POST['birthdate'])) {
        $birthDate = $_POST['birthdate'];
    }
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
    }
    if (isset($_POST['mail'])) {
        $mail = $_POST['mail'];
    }

    if (isset($lastName)) {
        $insertPatient = $basePatients->prepare('INSERT INTO patients(lastname, firstname, birthdate, phone, mail) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)');
        $insertPatient->execute([
            'lastname' => $lastName,
            'firstname' => $firstName,
            'birthdate' => $birthDate,
            'phone' => $phone,
            'mail' => $mail,
        ]);
    }
header("location:../liste-patients.php");
