
<?php

include("header.php");

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id'])) {

    $person = unserialize($_SESSION['connected_objet']);
    $type = get_class($person);

    if ($type == "Teacher" || $type == "Admin") {
        $note = $person->getAllStudentNotes($bdd, intval($_GET["id"]));
    } else {
        $note = $person->getAllStudentNotes($bdd);
    }
    print_r($note);
    ?>

    <?php

    // include("footer.php");
} else {
    header("Location: index.php");
}
?>