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

    public function insertNote($idStudent, $note, $coeff, $comment = "null") {

        $resultat = $bdd->prepare("INSERT INTO `note`(`idTeacher`, `idStudent`, `note`, `coeff`, `comment`) VALUES (?, ?, ?, ?, ? )");
        $resultat->execute(array($this->_id, $idStudent, $note, $coeff, $comment));
    }

}
