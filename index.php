<?php 
    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    include_once($rootPath . '/head.php');
?>
<body>
    <?php
        include_once($rootPath . '/header.php');
    ?>
    <main>
    <div class="card">
        <h1> Nouveau patient ? </h1>
        <p>Je veux juste ajouter un client : </p>
        <a href="patients/ajout-patient.php" target="_blank">Ajouter un patient</a>

        <p> Je veux ajouter un client et son rendez-vous : </p>
        <a href="patients/ajout-patient-rendezvous.php" target="_blank">Ajouter un patient et son rendez-vous</a>
    </div>
    <div class="card">
        <h2> Nouveau rendez-vous ? </h2>
        <p>Je veux un nouveau rendez-vous : </p>
        <a href="rendezvous/ajout-rendezvous.php" target="_blank">Ajouter un rendez-vous</a>
    </div>
    </main>
</body>
</html>