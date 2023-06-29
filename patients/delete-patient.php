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

    $SQLquery = 'SELECT * FROM patients';
    $hospitalStatement = $basePatients -> prepare($SQLquery);
    $hospitalStatement -> execute();
    $patients = $hospitalStatement -> fetchAll((PDO::FETCH_ASSOC));
     ?>   

    
    <div id="liste">
    <form action="delete-patient.php" method="POST" class="card">
        <p>Choisissez le patient à supprimer :</p>
        <label for="patient">Nom du patient</label>
        <select name="rendezvous" id="rendezvous">
            <option>Choisissez un patient</option>
        <?php
        foreach($patients as $patient) {
            echo('<option value="' . $patient['id'] . '">'.$patient['lastname'] . " " . $patient['firstname'] . '</option>');
        }
        ?>
    </select>
        <input type="submit" value="Valider">
    </form>

    <?php
        if (isset($_POST['rendezvous'])) {
            $id = $_POST['rendezvous'];
        
        $SQLsecondquery = 'SELECT * FROM appointments JOIN patients ON appointments.idPatients = patients.id where appointments.idPatients = ' .$id;
        $hospitalStatementsecond = $basePatients -> prepare($SQLsecondquery);
        $hospitalStatementsecond -> execute();
        $appointments = $hospitalStatementsecond -> fetchAll((PDO::FETCH_ASSOC));
        echo "<div class='card'>";
        if(empty($appointments)) {
            echo "<p>Ce patient n'a pas de rendez-vous.</p>";
        }
        else {
            foreach($appointments as $appointment) {
                echo('<p>Le patient ' . $appointment['lastname'] . " " . $appointment['firstname'] . (' a pris rendez-vous le ' . $appointment['dateHour']). '</p>');
            }
        };
        echo ('<br /><p>Voulez-vous supprimer ce patient et tous ces rendez-vous ? </p>
        <form action="confirm-deletepatient.php" method="POST">
            <input type="hidden" id="idPatients" name="idPatients" value="<?php echo($id) ?>">
            <input type="submit" value="Confirmer">
        </form><div>');
        };
        ?>
    </div>
</body>
</html>