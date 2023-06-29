<?php
try 
{
    $basePatients = new PDO('mysql:host=127.0.0.1;dbname=hospitalE2N;charset=utf8', 'root');
}

catch(Exception $e) 
{
    die('Erreur : ' .$e->getMessage());
}
?>
<?php 
    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    include_once($rootPath . '/head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
include_once($rootPath . '/header.php');
?>
    <div id="liste">
<?php
    $id = $_GET['id'];
    $SQLquery = 'SELECT * FROM patients JOIN appointments ON patients.id = appointments.idPatients where appointments.id = ' . $id;
    $hospitalStatement = $basePatients -> prepare($SQLquery);
    $hospitalStatement -> execute();
    $appointment = $hospitalStatement -> fetch((PDO::FETCH_ASSOC));

    echo("<div class='card'><p>Nom du patient : " . $appointment['lastname'] . " " .$appointment['firstname']."</p><br />" . 
    "<p>Date et heure du rendez-vous : " . $appointment['dateHour'].'</p>');
    echo('<a href="rendezvous/modif-rendezvous.php?id=' . $id . '">  Modifier le rendez-vous</a></div>');
?>
    </div>
</body>
</html>