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
    
    function getNotes()
    {
        $notes = new Note();
        
        return $notes->getAllStudentNotes();
    }
}
