<?php

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

    public function insertNote($bdd, $idStudent, $note, $coeff = null, $comment = null) {

        if($coeff === null || $coeff == '') $coeff = 1;
        $resultat = $bdd->prepare("INSERT INTO `note`(`idTeacher`, `idStudent`, `note`, `coeff`, `comment`) VALUES (?, ?, ?, ?, ? );");
        $resultat->execute(array(parent::getId(), $idStudent, $note, $coeff, $comment)) or die(print_r($bdd->errorInfo()));
    }

    public function getAllClass($bdd) {

        $resultat = $bdd->prepare("SELECT * FROM classRoom;");
        $resultat->execute() or die(print_r($bdd->errorInfo()));
        return $resultat->fetchAll();
    }

}
