
<?php
include("header.php");

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id'])) {

    $person = unserialize($_SESSION['connected_objet']);
    $type = get_class($person);

    if ($type == "Teacher") {
        if (isset($_POST["Ajouter"]) && isset($_POST["note"]) && !empty($_POST["Ajouter"])) {
            $coeff = !empty($_POST["coeff"]) ? $_POST["coeff"] : "";
            $comment = !empty($_POST["comment"]) ? $_POST["comment"] : "";
            $person->insertNote($bdd, intval($_GET["id"]), intval($_POST["note"]), $coeff, $comment);
            header("Location: " . $_SERVER["REQUEST_URI"]);
        }
        $note = $person->getAllStudentNotes($bdd, intval($_GET["id"]));
    } else {
        $note = $person->getAllStudentNotes($bdd);
    }
    ?>
    <div id="allNote">
        <?php
        foreach ($note as $value) {
            ?>
            note : <?= $value["note"] ?> - coeff :  <?= $value["coeff"] ?>   <?= $value["comment"] != "" ? "commentaire" . $value["comment"] : "" ?> <br />
            <?php
        }
        ?>
    </div>
    <?php
    if ($type == "Teacher" || $type == "Admin") {
        ?>
        <hr>
        <div id="ajouterUneNote">
            <h2>Ajouter une note</h2>
            <form method="post" action="<?= $_SERVER["REQUEST_URI"] ?>">
                <label>Note</label>
                <input type="number" min="0" max="20" name="note" required>
                <br />
                <label>Coeff</label>
                <input type="number" min="0" max="20" name="coeff">
                <br />
                <label>Commentaire</label>
                <input type="text" name="comment">
                <br /><br />
                <input type="submit" name="Ajouter">
            </form>
        </div>
        <?php
    }
    // include("footer.php");
} else {
    header("Location: index.php");
}
?>