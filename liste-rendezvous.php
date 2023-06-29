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

<body>
    <?php
include_once($rootPath . '/header.php');
    ?>
    <div class="modif">
        <a href='rendezvous/ajout-rendezvous.php'>Ajouter un rendez-vous</a>
        <a href='rendezvous/delete-rendezvous.php'>Supprimer un rendez-vous</a>
    </div>
<div id='liste'>
    <?php
        $SQLquery = 'SELECT * FROM patients JOIN appointments ON patients.id = appointments.idPatients';
        $hospitalStatement = $basePatients -> prepare($SQLquery);
        $hospitalStatement -> execute();
        $appointments = $hospitalStatement -> fetchAll((PDO::FETCH_ASSOC));

        
        foreach($appointments as $appointment) {
            echo('<div class="card"><p>Le patient ' . $appointment['lastname'] . " " . $appointment['firstname'] . (' a pris rendez-vous le ' . $appointment['dateHour']). '</p>');
            echo("<a href='rendezvous.php?id=" . $appointment['id']. "'>En savoir plus" . "</a>");
            echo('</div><br />');
        }
    ?>
</div>
</body>
</html>