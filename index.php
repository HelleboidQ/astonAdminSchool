<?php
include("template/header.php");

if (isset($_POST["connexion"]) && !empty($_POST["nom"]) && !empty($_POST["pass"])) {
    $nom = htmlentities($_POST["nom"]);
    $pass = htmlentities($_POST["pass"]);
    $pass = sha1("oui" . $pass . "tartiflette");

    $resultStudent = $bdd->prepare("SELECT id FROM student WHERE lastName = ? AND pass = ?");
    $resultStudent->execute(array($nom, $pass));
    if ($resultStudent->rowCount() > 0) {
        $resStudent = $resultStudent->fetch();
        $person = new Student($resStudent["id"], $nom, $resStudent["firstName"]);
        $_SESSION['connected_user'] = $nom;
        $_SESSION['connected_id'] = $resStudent["id"];
        $_SESSION['connected_type'] = "student";
        $_SESSION['connected_objet'] = serialize($person);
        header("Location: studentPage.php");
    }

    $resultTeacher = $bdd->prepare("SELECT id FROM teacher WHERE lastName = ? AND pass = ?");
    $resultTeacher->execute(array($nom, $pass));
    if ($resultTeacher->rowCount() > 0) {
        $resTeacher = $resultTeacher->fetch();
        $person = new Teacher($resTeacher["id"], $nom, $resTeacher["firstName"]);
        $_SESSION['connected_user'] = $nom;
        $_SESSION['connected_id'] = $resStudent["id"];
        $_SESSION['connected_type'] = "teacher";
        $_SESSION['connected_objet'] = serialize($person);
        header("Location: affichageClass.php");
    }

    $resultAdmin = $bdd->prepare("SELECT id FROM admin WHERE lastName = ? AND pass = ?");
    $resultAdmin->execute(array($nom, $pass));
    if ($resultAdmin->rowCount() > 0) {
        $resAdmin = $resultAdmin->fetch();
        $person = new Admin($resAdmin["id"], $nom, $resAdmin["firstName"]);
        $_SESSION['connected_user'] = $nom;
        $_SESSION['connected_id'] = $resAdmin["id"];
        $_SESSION['connected_type'] = "admin";
        $_SESSION['connected_objet'] = serialize($person);
        header("Location: adminPage.php");
    }
} else {
    unset($_SESSION['connected_user']);
    unset($_SESSION['connected_id']);
    unset($_SESSION['connected_type']);
    unset($_SESSION['connected_objet']);
}
?>
<div class="center">
    <img src="images/logo.png" alt="">
    <form method="post" action="index.php">
        <p>
        <h3>Bienvenue sur le site AdminSchool<br>
            Veuillez entrer vos identifiant</h3>
        <label for="nom">Votre nom :</label>
        <input type="text" name="nom" id="nom" /><br><br />
        <label for="pass">Votre mot de passe :</label>
        <input type="password" name="pass" id="pass" /><br><br>
        <input type="submit" name="connexion" value="SE CONNECTER">
        </p>
    </form>
</div>
