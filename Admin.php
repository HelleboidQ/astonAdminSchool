<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Quentin
 */
class Admin extends Person {

    function __construct($_id, $_nom, $_prenom) {
        parent::__construct($_id, $_nom, $_prenom);
    }

    public function insertTeacher($firstName, $lastName, $pass) {
        $cryptedPass = sha1("oui" . $pass . "tartiflette");

        $resultat = $bdd->prepare("INSERT INTO `teacher`(`firstName`, `lastName`, `pass`) VALUES (?, ?, ?)");
        $resultat->execute(array($firstName, $lastName, $cryptedPass));
    }

    public function insertStudent($firstName, $lastName, $pass) {
        $cryptedPass = sha1("oui" . $pass . "tartiflette");

        $resultat = $bdd->prepare("INSERT INTO `student`(`firstName`, `lastName`, `pass`) VALUES (?, ?, ?)");
        $resultat->execute(array($firstName, $lastName, $cryptedPass));
    }

    public function getAllClass($bdd) {

        $resultat = $bdd->prepare("SELECT * FROM classRoom ");
        $resultat->execute();
        return $resultat->fetchAll();
    }

}
