<?php
try 
{
    $basePatients = new PDO('mysql:host=127.0.0.1;dbname=hospitalE2N;charset=utf8', 'root');
}

catch(Exception $e) 
{
    die('Erreur : ' .$e->getMessage());
}

$id = $_POST['idPatients'];

    $insertPatient = $basePatients -> prepare('DELETE FROM patients WHERE id = :id');
$insertPatient -> execute([
        'id' => $id,
]);
header("location:../liste-patients.php");