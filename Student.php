<?php

/**
 *
 * @author ????????
 * 
 */

require ('./ClassRoom.php');
require ('./Note.php');

class Student extends Person
{   
    public function __construct($_id, $_lastname, $_firstname) 
    {
        parent::__construct($_id, $_lastname, $_firstname);
    }
    
    function getClass()
    {
        $classRoom = new ClassRoom();
        
        return $classRoom->getName();
    }
        
    function getAllStudentNotes($bdd)
    {                                            
        $req = $bdd->prepare('SELECT teacher.firstName AS teacherFName, teacher.lastName AS teacherLName, note, coeff, comment, date FROM note JOIN teacher ON teacher.id = idTeacher WHERE idStudent=:idStudent;');
        $req ->execute(array(
                        'idStudent' => parent::getId()
                        )) or die(print_r($bdd->errorInfo()));
        
        return $req->fetchAll();
    }
}
