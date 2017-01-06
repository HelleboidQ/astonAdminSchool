<?php
include("template/header.php");

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id']) && $_SESSION['connected_type'] == "admin") {

    $person = unserialize($_SESSION['connected_objet']);
    $classRoom = $person->getAllClass($bdd);
    ?>
    <div class="buttonreturn">
        <a href="affichageClass.php" style="text-decoration:none">Retour</a>
    </div>
    <div class="buttondisco">
        <a href="index.php" style="text-decoration:none">Deconnexion</a>
    </div>
    <img src="images/logo.png" alt="">
    <br>
    <div class="containerAdmin">
        <div>
            <form method="post" action="controlAdminPage.php">
                <strong>Ajouter un étudiant : </strong><br><br>
                Classe :
                <select name="classe">
                    <?php
                    foreach ($classRoom as $value) {
                        ?>
                        <option value="<?= $value["id"] ?>"> <?= $value["name"] ?></option>
                        <?php
                    }
                    ?>

                </select>
                <br>
                Prénom de l'étudiant :
                <input type="text" name="firstname"><br><br>
                Nom de l'étudiant:
                <input type="text" name="lastname"><br><br>
                Mot de passe de l'étudiant :
                <input type="text" name="password"><br><br>

                <input type="checkbox" name="delegue" value="Délégué">Délégué<br><br>
                <input type="hidden" name="student_" value="student">
                <input type="submit" name="" value="Ajouter un étudiant" />
            </form>
        </div>
        <div>
            <form method="post" action="controlAdminPage.php">
                <strong>Ajouter un professeur : </strong><br><br>
                Prénom du professeur:
                <input type="text" name="firstname"><br><br>
                Nom du professeur:
                <input type="text" name="lastname"><br><br>
                Mot de passe du professeur:
                <input type="text" name="password"><br><br>
                <input type="hidden" name="teacher_" value="teacher">
                <input type="submit" name="" value="Ajouter un professeur">
            </form>
        </div>
        <div >
            <form method="post" action="controlAdminPage.php">
                <strong>Ajouter une classe : </strong><br><br>
                Nom de la classe :
                <input type="text" name="name"><br><br>
                Commentaire :<br>
                <textarea rows="4" cols="50" name="comment_"></textarea><br>
                <input type="hidden" name="class_" value="class">
                <input type="submit" name="" value="Ajouter une classe">
            </form>
        </div>
    </div>
    <div class="valid_note">
        <h3>Validation des notes</h3>
        <br><br>
        <div class="tables_valid">
            <table border="1" cellpadding="10" cellspacing="1" width="100%">
                <tr>
                    <th>Nom du Professeur</th>
                    <th>Prénom et Nom de l'étudiant</th>
                    <th>Note</th>
                    <th>Commentaire</th>
                    <th>Validation</th>
                </tr>
                <tr>
                    <td>M.LEGRAND</td>
                    <td>Paul Paul</td>
                    <td>15</td>
                    <td>NUL A CHIER</td>
                    <td> <input id="checkbox_valid" type="checkbox" name="validnote" value=""></td>
                </tr>
                <tr>
                    <td>Terence</td>
                    <td>NAME</td>
                    <td>10</td>
                    <td>tamere</td>
                    <td> <input id="checkbox_valid" type="checkbox" name="validnote" value=""></td>
                </tr>
                <tr>
                    <td>Quentin</td>
                    <td>NAME</td>
                    <td>10</td>
                    <td>tamere</td>
                    <td> <input id="checkbox_valid" type="checkbox" name="validnote" value=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
    include("template/footer.php");
} else {
    header("Location: index.php");
}
?>
