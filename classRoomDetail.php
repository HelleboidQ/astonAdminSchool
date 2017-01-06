
<?php
include("header.php");

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id']) && $_SESSION['connected_type'] == "teacher") {
    $person = unserialize($_SESSION['connected_objet']);
    $classRoom = $person->getAllClass($bdd);
    ?>
    Détail de la class <?= $_GET["id"] ?>
    <?php
    // include("footer.php");
} else {
    header("Location: index.php");
}
?>