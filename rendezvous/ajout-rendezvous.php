<?php 
    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    include_once($rootPath . '/head.php');
?>
<body>
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
    <form action="confirm-rendezvous.php" method="POST" class="card">
        <h1>Ajouter un rendez-vous</h1>
        <label for="date">Date et heure</label>
        <input type="datetime-local" name="date" id="date" required>
        <label for="idPatients">Patient : </label>
        <select name='idPatients' id='idPatients' required>
            <option>Choisissez un patient</option>
        <?php
        foreach($patients as $patient) {
            echo('<option value="' . $patient['id'] . '">'.$patient['lastname'] . '</option>');
        }
        ?>
        </select>
        <br />
        <input type='submit' value='Ajouter le rendez-vous'>
    </form>
    </div>
</body>
</html>