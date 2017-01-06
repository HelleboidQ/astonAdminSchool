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

    public function insertTeacher($bdd, $firstName, $lastName, $pass) {
        $cryptedPass = sha1("oui" . $pass . "tartiflette");

        $resultat = $bdd->prepare("INSERT INTO `teacher`(`firstName`, `lastName`, `pass`) VALUES (?, ?, ?);");
        $resultat->execute(array($firstName, $lastName, $cryptedPass));
    }

    public function insertStudent($bdd, $firstName, $lastName, $pass, $classRoom, $isDelegate = 0) {
        $cryptedPass = sha1("oui" . $pass . "tartiflette");

        if($isDelegate === 0)
        {
            $resultat = $bdd->prepare("INSERT INTO `student`(`firstName`, `lastName`, `pass`, `idClassRoom`) VALUES (?, ?, ?, ?);");
            $resultat->execute(array($firstName, $lastName, $cryptedPass, $classRoom));
        }
        else
        {
            $resultat = $bdd->prepare("INSERT INTO `student`(`firstName`, `lastName`, `pass`, `idClassRoom`, `isDelegate`) VALUES (?, ?, ?, ?, ?);");
            $resultat->execute(array($firstName, $lastName, $cryptedPass, $classRoom, 1)); 
        }
    }

    public function insertClassRoom($bdd, $name, $comment) {
        $resultat = $bdd->prepare("INSERT INTO `classroom`(`name`, `comment`) VALUES (?, ?);");
        $resultat->execute(array($name, $comment));
    }

    public function getAllClass($bdd) {

        $resultat = $bdd->prepare("SELECT * FROM classRoom ");
        $resultat->execute();
        return $resultat->fetchAll();
    }

    function getAllStudentNotes($bdd, $idStudent) {
        $req = $bdd->prepare('SELECT teacher.firstName AS teacherFName, teacher.lastName AS teacherLName, note, coeff, comment, date
                             FROM note JOIN teacher ON teacher.id = idTeacher
                             WHERE idStudent=:idStudent;');
        $req->execute(array(
                    'idStudent' => $idStudent
                )) or die(print_r($bdd->errorInfo()));

        return $req->fetchAll();
    }

    function getMoyenneStudent($bdd, $idStudent) {

        $resultat = $bdd->prepare("SELECT
                                    AVG(note) as moyenne
                                FROM  note
                                WHERE idStudent = ? ");
        $resultat->execute(array($idStudent));
        return $resultat->fetch();
    }

}
