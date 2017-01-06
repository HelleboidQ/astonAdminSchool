<?php
include("template/header.php");

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id']) && $_SESSION['connected_type'] == "student") {

    $person = unserialize($_SESSION['connected_objet']);
    ?>
    Page d'un eleve


    <?php
    include("template/footer.php");
} else {
    header("Location: index.php");
}
?>