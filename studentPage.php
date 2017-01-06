<?php
include("header.php");

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id']) && $_SESSION['connected_type'] == "student") {
    ?>
    Page d'un eleve


    <?php
    include("footer.php");
} else {
    header("Location: index.php");
}
?>