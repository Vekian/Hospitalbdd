<?php 
    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    include_once($rootPath . '/head.php');
?>
<body>

<?php 
include_once($rootPath . '/header.php');
?>
<form action="confirm-ajoutpatientrendezvous.php" method= "POST">
    <label for="lastname"> Nom de famille : </label>
    <input type="text" name="lastname" id="lastname" required> 
    <label for="firstname"> Prénom : </label>
    <input type="text" name="firstname" id="firstname" required>
    <label for="birthdate"> date de naissance : </label>
    <input type="date" name="birthdate" id="birthdate" value="2023-06-26" required>
    <label for="phone"> Numéro de téléphone : </label>
    <input type="text" name="phone" id="phone" required>
    <label for="mail"> Email : </label>
    <input type="text" name="mail" id="mail" required>
    <label for="date">Date et heure du rendez-vous.</label>
    <input type="datetime-local" name="date" id="date" required>
    <input type="submit" value="Envoyer">
</form>
</body>
</html>