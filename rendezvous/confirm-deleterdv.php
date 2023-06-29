<?php

try 
{
    $basePatients = new PDO('mysql:host=127.0.0.1;dbname=hospitalE2N;charset=utf8', 'root');
}

catch(Exception $e) 
{
    die('Erreur : ' .$e->getMessage());
}


$id = $_POST['rendezvous'];
$insertAppointment = $basePatients -> prepare('DELETE FROM appointments WHERE id = :id');
$insertAppointment -> execute([
        'id' => $id,
]);
header("location:../liste-rendezvous.php");