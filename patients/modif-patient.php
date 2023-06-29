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

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id']))
{
    echo("Il faut un identifiant d'utilisateur pour le modifier.");
    return;
}

$retrievePatientStatement = $basePatients->prepare('SELECT * FROM patients WHERE id = :id');
$retrievePatientStatement->execute([
    'id' => $getData['id'],
]);
$patient = $retrievePatientStatement->fetch((PDO::FETCH_ASSOC));
?>

    <form action="confirm-modif.php" method= "POST">
    <input type="hidden" id="id" name="id" value="<?php echo($getData['id']); ?>">
    <label for="lastname"> Nom de famille : </label>
    <input type="text" name="lastname" id="lastname" required value="<?php echo htmlspecialchars($patient['lastname']) ?>"> 
    <label for="firstname"> Prénom : </label>
    <input type="text" name="firstname" id="firstname" required value="<?php echo htmlspecialchars($patient['firstname']) ?>">
    <label for="birthdate"> date de naissance : </label>
    <input type="date" name="birthdate" id="birthdate" value="<?php echo htmlspecialchars($patient['birthdate']) ?>" required>
    <label for="phone"> Numéro de téléphone : </label>
    <input type="text" name="phone" id="phone" required value="<?php echo htmlspecialchars($patient['phone']) ?>">
    <label for="mail"> Email : </label>
    <input type="text" name="mail" id="mail" required value="<?php echo htmlspecialchars($patient['mail']) ?>">
    <input type="submit" value="Envoyer">
    </form>

</body>
</html>