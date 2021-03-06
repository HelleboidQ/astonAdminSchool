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

        if ($coeff === null || $coeff == '')
            $coeff = 1;
        $resultat = $bdd->prepare("INSERT INTO `note`(`idTeacher`, `idStudent`, `note`, `coeff`, `comment`) VALUES (?, ?, ?, ?, ? );");
        $resultat->execute(array(parent::getId(), $idStudent, $note, $coeff, $comment)) or die(print_r($bdd->errorInfo()));
    }

    public function getAllClass($bdd) {

        $resultat = $bdd->prepare("SELECT * FROM classRoom;");
        $resultat->execute() or die(print_r($bdd->errorInfo()));
        return $resultat->fetchAll();
    }

    public function getAllStudentByClass($bdd, $idClassRoom) {

        $resultat = $bdd->prepare("SELECT
                                    s.id,
                                    s.firstName,
                                    s.lastName,
                                    s.isDelegate,
                                    n.note,
                                    n.coeff
                                FROM student s
                                    JOIN note n ON n.idStudent=s.id
                                WHERE s.idClassRoom = ? AND n.idTeacher = ?");
        $resultat->execute(array($idClassRoom, parent::getId()));
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

    function getAllMoyenneClass($bdd, $idClassRoom) {

        $resultat = $bdd->prepare("SELECT
                                    AVG(n.note) as moyenne
                                FROM  note n
                                    JOIN student s ON s.id = n.idStudent
                                WHERE s.idClassRoom = ? AND n.idTeacher = ?");
        $resultat->execute(array($idClassRoom, parent::getId()));
        return $resultat->fetch();
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
