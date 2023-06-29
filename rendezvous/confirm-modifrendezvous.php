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
$dateString = $_POST['dateHour'];
$date = new DateTime($dateString);
$formattedDate = $date->format("Y-m-d H:i:s");
$idPatients = $_POST['idPatients'];

$insertAppointment = $basePatients -> prepare('UPDATE appointments SET dateHour = :dateHour, idPatients = :idPatients WHERE id = :id');
$insertAppointment -> execute([
    'dateHour' => $formattedDate,
    'idPatients' => $idPatients,
    'id' => $id,
]);
header("location:../liste-rendezvous.php");