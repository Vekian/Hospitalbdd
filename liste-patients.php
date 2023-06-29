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
?>
<div class="modif">
    <a href="patients/ajout-patient.php">Ajout d'un patient</a>
    <a href="patients/delete-patient.php">Supprimer un patient</a>
</div>
<form action="liste-patients.php" method="POST" id="search">
    <label for="patient">Tapez le nom du patient</label>
    <input type="text" name="patient" id="Patient">
    <input type="submit" value="Rechercher">
</form>

<div id="liste">
    <?php
    //Ajoute la partie recherche
        $SQLquery = 'SELECT * FROM patients';
        $hospitalStatement = $basePatients -> prepare($SQLquery);
        $hospitalStatement -> execute();
        $patients = $hospitalStatement -> fetchAll();

    function search ($name, $array) {
            $nameSecure = htmlspecialchars($name);
            foreach($array as $patient) {
                if (in_array(strtolower($nameSecure), array_map('strtolower', $patient))) {
                echo('<div class="card"><p>Nom de famille : ' . $patient['lastname'] . ', prénom : ' . $patient['firstname'].'</p>');
                echo("<a href='profil-patient.php?patient=" . $patient['id']. "'>En savoir plus" . "</a></div>");
                return;}
        };
        echo ($nameSecure . ' ne fait pas partie des patients');
    };
    if(isset($_POST['patient'])) {
    $namePatient = $_POST['patient'];
    search ($namePatient, $patients);
    };
    ?>

    <?php
    if (!isset($_POST['patient'])) {
        $page = isset($_GET['page']) ? $_GET['page'] : 1; 
        $perPage = 10; 

        $offset = ($page - 1) * $perPage;

        $SQLquery = "SELECT * FROM patients LIMIT $perPage OFFSET $offset";
        $hospitalStatement = $basePatients->prepare($SQLquery);
        $hospitalStatement->execute();
        $patients = $hospitalStatement->fetchAll();

        foreach ($patients as $patient) {
            echo('<div class="card">');
            echo('<p>Nom de famille : ' . $patient['lastname'] . ', prénom : ' . $patient['firstname'].'</p>');
            echo("<a href='profil-patient.php?patient=" . $patient['id'] . "'>En savoir plus" . "</a>");
            echo('</div><br />');
        }

        $SQLcount = "SELECT COUNT(*) AS total FROM patients";
        $countStatement = $basePatients->query($SQLcount);
        $totalPatients = $countStatement->fetch()['total'];

        $totalPages = ceil($totalPatients / $perPage); 

        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?page=' . $i . '">' . $i . '</a> ';
        }
        echo '</div>';
    };
    ?>
</div>
</body>
</html>