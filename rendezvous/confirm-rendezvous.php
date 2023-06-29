<?php
try 
{
    $basePatients = new PDO('mysql:host=127.0.0.1;dbname=hospitalE2N;charset=utf8', 'root');
}

catch(Exception $e) 
{
    die('Erreur : ' .$e->getMessage());
}

if (!isset($_POST['date']) || !isset($_POST['idPatients'])) {
    echo ('Il faut un patient et une date pour soumettre le formulaire');
    return;
}


$idPatients = $_POST['idPatients'];
$dateString = $_POST['date'];
$date = new DateTime($dateString);
$formattedDate = $date->format("Y-m-d H:i:s");


$insertPatient = $basePatients->prepare('INSERT INTO appointments(dateHour, idPatients) VALUES (:dateHour, :idPatients)');
        $insertPatient->execute([
            'dateHour' => $formattedDate,
            'idPatients' => $idPatients,
        ]);
header("location:../liste-rendezvous.php");