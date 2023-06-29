<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootPath . '/head.php');

include_once($rootPath . '/header.php');

try 
    {
        $basePatients = new PDO('mysql:host=127.0.0.1;dbname=hospitalE2N;charset=utf8', 'root');
    }

    catch(Exception $e) 
    {
        die('Erreur : ' .$e->getMessage());
    }

        $SQLquery = 'SELECT * FROM patients JOIN appointments ON patients.id = appointments.idPatients';
        $hospitalStatement = $basePatients -> prepare($SQLquery);
        $hospitalStatement -> execute();
        $appointments = $hospitalStatement -> fetchAll((PDO::FETCH_ASSOC));
     ?>   

<form method="POST" action="confirm-deleterdv.php">
    <label for="rendezvous">Choisissez le rendez-vous</label>
    <select name="rendezvous" id="rendezvous">
        <?php
foreach($appointments as $appointment) {
    echo('<option value="' . htmlspecialchars($appointment['id']) . '">' . 'Le patient ' . htmlspecialchars($appointment['lastname']) . " " . htmlspecialchars($appointment['firstname']) . ' a pris rendez-vous le ' . htmlspecialchars($appointment['dateHour']) . '</option>');
}
?>
    </select>
    <input type="submit" value="Supprimer">
</form>
