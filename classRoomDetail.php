
<?php
include("template/header.php");

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id']) && $_SESSION['connected_type'] == "teacher") {
    $person = unserialize($_SESSION['connected_objet']);
    $classRoom = $person->getAllStudentByClass($bdd, intval($_GET["id"]));
    print_r();
    ?>

    <div class="buttonleft">
        <a href="affichageClass.php">Retour</a>
        <a href="index.php">Deconnexion</a>
    </div>
    <img src="images/logo.png" alt="">
    <br>
    Détail de la classe

    <table>
        <thead>
            <tr>
                <th> Id </th>
                <th> Nom </th>
                <th> Prenom </th>
                <th> Note </th>
                <th> Coeff </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($classRoom as $value) {
                ?>
                <tr>
                    <td> <?= $value["id"] ?> </td>
                    <td> <a href="studentDetail?id=<?= $value["id"] ?>" > <?= $value["lastName"] ?> </a> </td>
                    <td> <?= $value["firstName"] ?> </td>
                    <td> <?= $value["note"] ?> </td>
                    <td> <?= $value["coeff"] ?> </td>

                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    // include("template/footer.php");
} else {
    header("Location: index.php");
}
?>