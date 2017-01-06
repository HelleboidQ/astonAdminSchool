
<?php
include("header.php");

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id']) && $_SESSION['connected_type'] == "teacher") {
    $person = unserialize($_SESSION['connected_objet']);
    $classRoom = $person->getAllClass($bdd);
    ?>

    <div class="buttonleft">
        <a href="affichageClass.php">Retour</a>
        <a href="index.php">Deconnexion</a>
    </div>
    <img src="images/logo.png" alt="">
    <br>
    Détail de la class <?= $_GET["id"] ?>
    <?php
    // include("footer.php");
} else {
    header("Location: index.php");
}
?>