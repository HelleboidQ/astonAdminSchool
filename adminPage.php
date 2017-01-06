<?php
include("header.php");

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id']) && $_SESSION['connected_type'] == "admin") {
    ?>
    Page d'admin


    <?php
    include("footer.php");
} else {
    header("Location: index.php");
}
?>