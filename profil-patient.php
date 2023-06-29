<?php 
    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    include_once($rootPath . '/head.php');
?>
<body>
  
<?php
include_once($rootPath . '/header.php');
?>  
<div id="liste">
<?php
try 
    {
        $basePatients = new PDO('mysql:host=127.0.0.1;dbname=hospitalE2N;charset=utf8', 'root');
    }

    catch(Exception $e) 
    {
        die('Erreur : ' .$e->getMessage());
    }
    $id= $_GET['patient'];
    $SQLquery = 'SELECT * FROM patients WHERE id= ' . $id;
    $hospitalStatement = $basePatients -> prepare($SQLquery);
    $hospitalStatement -> execute();
    $patient = $hospitalStatement -> fetch((PDO::FETCH_ASSOC));
    

    echo('<div class="card"><p>Nom de famille : ' . $patient['lastname'] . 
    ',  </p><br /> <p>prénom : ' . $patient['firstname'] . ', 
    </p><br /><p>année de naissance : ' . $patient['birthdate'] . ',
    </p><br /> <p>numéro de téléphone : ' . $patient['phone'] . ',
    </p><br /> <p>adresse email : ' . $patient['mail']. '</p>');
    echo('<br />');
    echo("<a href='patients/modif-patient.php?id=" . $patient['id']. "'>Modifier le profil" . "</a></div>");
    ?>
</div>
</body>
</html>