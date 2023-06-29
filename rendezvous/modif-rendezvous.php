<?php 
    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    include_once($rootPath . '/head.php');
?>
<?php
include_once($rootPath . '/header.php');
try 
{
    $basePatients = new PDO('mysql:host=127.0.0.1;dbname=hospitalE2N;charset=utf8', 'root');
}

catch(Exception $e) 
{
    die('Erreur : ' .$e->getMessage());
}

$id = $_GET['id'];
    $SQLquery = 'SELECT * FROM patients JOIN appointments ON patients.id = appointments.idPatients WHERE appointments.id = ' . $id;
    $hospitalStatement = $basePatients -> prepare($SQLquery);
    $hospitalStatement -> execute();
    $appointment = $hospitalStatement -> fetch((PDO::FETCH_ASSOC));
   

    $SQLqueryTwo = 'SELECT * FROM patients';
    $hospitalStatementTwo = $basePatients -> prepare($SQLqueryTwo);
    $hospitalStatementTwo -> execute();
    $patients = $hospitalStatementTwo -> fetchAll((PDO::FETCH_ASSOC));

?>

<form method="POST" action="confirm-modifrendezvous.php">
    <input type="hidden" id="id" name="id" value="<?php echo($_GET['id']); ?>">
    <label for=dateHour>Date et heure</label>
    <input type="datetime-local" name="dateHour" id="dateHour" value="<?php echo htmlspecialchars($appointment['dateHour']) ?>" required>
    <label for=idPatients> Patient</label>
    <select name='idPatients' id='idPatients' required>
        <?php
        foreach($patients as $patient) {
            if ($patient['lastname'] == $appointment['lastname']) {
                echo ('<option value="' . htmlspecialchars($patient['id']) . '" selected >'. htmlspecialchars($patient['lastname']) . " " . htmlspecialchars($patient['firstname']) . '</option>');
            }
            else {
            echo('<option value="' . htmlspecialchars($patient['id']) . '">'. htmlspecialchars($patient['lastname']) . " " . htmlspecialchars($patient['firstname']) . '</option>');
        }}
        ?>
        </select>
    <input type="submit" value="Modifier">
</form>
</body>
</html>