<?php
include("header.php");

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id']) && $_SESSION['connected_type'] == "admin") {

    $person = unserialize($_SESSION['connected_objet']);
    $classRoom = $person->getAllClass($bdd);
    ?>
    <div class="buttonleft">
        <a href="index.php">Deconnexion</a>
    </div>
    <img src="img/logo.png" alt=""><br>
    <div class="containerAdmin">
        <div>
            <form method="post" action="adminPage.php">
                <strong>Ajouter un �tudiant : </strong><br><br>
                <FORM>
                    Classe :
                    <SELECT name="classe">
                        <?php
                        foreach ($classRoom as $value) {
                            ?>
                            <option value="<?= $value["id"] ?>"> <?= $value["name"] ?></option>
                            <?php
                        }
                        ?>
                    </SELECT>
                </FORM><br>
                Pr�nom de l'�tudiant :
                <input type="text" name="firstname"><br><br>
                Nom de l'�tudiant:
                <input type="text" name="lastname"><br><br>
                Mot de passe de l'�tudiant :
                <input type="text" name="password"><br><br>
                <input type="checkbox" name="" value="D�l�gu�">D�l�gu�<br><br>
                <input type="submit" name="" value="Ajouter un �tudiant">
            </form>
        </div>
        <div>
            <form method="post" action="adminPage.php">
                <strong>Ajouter un professeur : </strong><br><br>
                Pr�nom du professeur:
                <input type="text" name="firstname"><br><br>
                Nom du professeur:
                <input type="text" name="lastname"><br><br>
                Mot de passe du professeur:
                <input type="text" name="password"><br><br>
                <input type="submit" name="" value="Ajouter un professeur">
            </form>
        </div>
        <div >
            <form method="post" action="adminPage.php">
                <strong>Ajouter une classe : </strong><br><br>
                Nom de la classe :
                <input type="text" name="name"><br><br>
                Commentaire :<br>
                <textarea rows="4" cols="50"></textarea><br>
                <input type="submit" name="" value="Ajouter une classe">
            </form>
        </div>
    </div>
    <?php
    include("footer.php");
} else {
    header("Location: index.php");
}
?>