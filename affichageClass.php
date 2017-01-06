
<?php
include("header.php");

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id']) && $_SESSION['connected_type'] == "teacher") {
    $person = unserialize($_SESSION['connected_objet']);
    $classRoom = $person->getAllClass($bdd);
    ?>
    <div class="buttonleft">
        <a href="index.php">Deconnexion</a>
    </div>
    <div class="center">
        <img src="img/logo.png" alt="">
        <h3>Bonjour <?= $_SESSION['connected_user'] ?></h3>
        Bienvenue sur votre espace professeur,<br>
        Veuillez choisir une classe.
        <ul>
            <?php
            foreach ($classRoom as $value) {
                ?>
                <li><a href="classe-<?= $value["id"] ?>.html"> <?= $value["name"] ?></a> - <?= $value["comment"] ?></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
    // include("footer.php");
} else {
    header("Location: index.php");
}
?>
