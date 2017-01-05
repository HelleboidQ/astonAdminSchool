<?php

/**
 *
 * @author ????????
 * 
 */

require ('./ClassRoom.php');

class Student extends Person
{   
    public function __construct($_ref, $_nom, $_prenom) 
    {
        parent::__construct($_ref, $_nom, $_prenom);
    }
    
    function getClass()
    {
        $classRoom = new ClassRoom();
        
        return $class;
    }
}
