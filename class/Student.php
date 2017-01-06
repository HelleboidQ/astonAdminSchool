<?php

/**
 *
 * @author ????????
 *
 */
class Student extends Person {

    public function __construct($_id, $_lastname, $_firstname) {
        parent::__construct($_id, $_lastname, $_firstname);
    }

    function getClass($bdd) {
        $req = $bdd->prepare('SELECT name, comment FROM classroom JOIN student ON student.idClassRoom = classroom.id WHERE student.id=:idStudent;');
        $req->execute(array(
                    'idStudent' => parent::getId()
                )) or die(print_r($bdd->errorInfo()));

        return $req->fetchAll();
    }

    function getAllStudentNotes($bdd) {
        $req = $bdd->prepare('SELECT teacher.firstName AS teacherFName, teacher.lastName AS teacherLName, note, coeff, comment, date FROM note JOIN teacher ON teacher.id = idTeacher WHERE idStudent=:idStudent;');
        $req->execute(array(
                    'idStudent' => parent::getId()
                )) or die(print_r($bdd->errorInfo()));

        return $req->fetchAll();
    }

    function getMoyenneStudent($bdd) {

        $resultat = $bdd->prepare("SELECT
                                    AVG(note) as moyenne
                                FROM  note
                                WHERE idStudent = ? ");
        $resultat->execute(array(parent::getId()));
        return $resultat->fetch();
    }

}
