<?php
try 
{
    $basePatients = new PDO('mysql:host=127.0.0.1;dbname=hospitalE2N;charset=utf8', 'root');
}

catch(Exception $e) 
{
    die('Erreur : ' .$e->getMessage());
}

if (!isset($_POST['lastname']) || !isset($_POST['firstname']) || !isset($_POST['birthdate']) || !isset($_POST['phone']) || !isset($_POST['mail']) || !isset($_POST['date'])) {
    echo ('Il faut un patient et une date pour soumettre le formulaire');
    return;
}

$lastName = $_POST['lastname'];
$firstName = $_POST['firstname'];
$birthDate = $_POST['birthdate'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$dateString = $_POST['date'];
$date = new DateTime($dateString);
$formattedDate = $date->format("Y-m-d H:i:s");

$insertPatient = $basePatients -> prepare('INSERT INTO patients(lastname, firstname, birthdate, phone, mail) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)');
$insertPatient -> execute([
    'lastname' => $lastName,
    'firstname' => $firstName,
    'birthdate' => $birthDate,
    'phone' => $phone,
    'mail' => $mail,
]);

$queryId = 'SELECT * FROM patients WHERE lastname= "' . $lastName . '"';
$hospitalStatement = $basePatients->prepare($queryId);
$hospitalStatement -> execute();
$patient = $hospitalStatement -> fetch();

$idPatient = $patient['id'];

$insertPatient = $basePatients -> prepare('INSERT INTO appointments(dateHour, idPatients) VALUES (:dateHour, :idPatients)');
$insertPatient -> execute([
    'dateHour' => $formattedDate,
    'idPatients' => $idPatient,
]);
header("location:../liste-patients.php");