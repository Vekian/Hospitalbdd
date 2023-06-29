<?php 
    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    include_once($rootPath . '/head.php');
?>
<body>
<?php 
include_once($rootPath . '/header.php');
?>
<div id="liste">
    <form action="confirm-ajoutpatient.php" method= "POST" class="card">
        <label for="lastname"> Nom de famille : </label>
        <input type="text" name="lastname" id="lastname" required> 
        <label for="firstname"> Prénom : </label>
        <input type="text" name="firstname" id="firstname" required>
        <label for="birthdate"> Date de naissance : </label>
        <input type="date" name="birthdate" id="birthdate" value="2023-06-26" required>
        <label for="phone"> Numéro de téléphone : </label>
        <input type="text" name="phone" id="phone" required>
        <label for="mail"> Email : </label>
        <input type="text" name="mail" id="mail" required>
        <input type="submit" value="Envoyer">
    </form>
</div>
<div class="modif">
<a href="../liste-patients.php">Liste des patients</a>
</div>
</body>
</html>