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
        $req = $bdd->prepare('SELECT * FROM note WHERE idStudent=:idStudent;');
        $req ->execute(array(
                        'idStudent' => parent::getId()
                        )) or die(print_r($bdd->errorInfo()));
        
        $lesNotes = array();
        while($donnees = $req->fetch())
        {
            array_push($lesNotes, $donnees['note']);
        }
        $req->closeCursor();
        
        return $lesNotes;
    }
}
