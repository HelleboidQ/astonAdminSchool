<?php

include("connect.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teacher
 *
 * @author Quentin
 */
class Teacher extends Person {

    function __construct($_id, $_nom, $_prenom) {
        parent::__construct($_id, $_nom, $_prenom);
    }

    public function insertTeacher($firstName, $lastName, $pass) {
        $cryptedPass = sha1("oui" . $pass . "tartiflette");

        $resultat = $bdd->prepare("INSERT INTO `teacher`(`firstName`, `lastName`, `pass`) VALUES (?, ?, ?)");
        $resultat->execute($firstName, $lastName, $cryptedPass);
    }

    public function createNote($idStudent, $note, $coeff, $comment = "null") {

        $resultat = $bdd->prepare("INSERT INTO `note`(`idTeacher`, `idStudent`, `note`, `coeff`, `comment`) VALUES (?, ?, ?, ?, ? )");
        $resultat->execute($this->_id, $idStudent, $note, $coeff, $comment);
    }

}
