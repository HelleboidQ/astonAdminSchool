<?php

/**
 *
 * @author ????????
 * 
 */

class Note 
{
    private $_id;
    private $_date;
    private $_label;
    private $_coment;
    private $_coef;
    
    function __construct($id, $date, $label, $coment = null, $coef = 1.0) 
    {
        $this->_id = $id;
        $this->_date = $date;
        $this->_label = $label;
        $this->_coment = $coment;
        $this->_coef = $coef;
    }
    
    /*          /*
     *          /*
     * GETTERS  /*
     *          /*
     *          */

    function getId() 
    {
        return $this->_id;
    }

    function getDate() 
    {
        return $this->_date;
    }

    function getLabel() 
    {
        return $this->_label;
    }

    function getComent() 
    {
        return $this->_coment;
    }

    function getCoef() 
    {
        return $this->_coef;
    }
    
    function getAllNotes($bdd)
    {                                            
        $req = $bdd->prepare('SELECT teacher.firstName AS teacherFName, teacher.lastName AS teacherLName, student.firstName AS studentFName, student.lastName AS studentLName, note, coeff, comment, date FROM note JOIN student ON student.id = idStudent JOIN teacher ON teacher.id = idTeacher ORDER BY studentLName;');
        $req ->execute() or die(print_r($bdd->errorInfo()));
        
        return $req->fetchAll();
    }
    
    /*          /*
     *          /*
     * SETTERS  /*
     *          /*
     *          */
    
    function setId($id) 
    {
        $this->_id = $id;
    }

    function setDate($date) 
    {
        $this->_date = $date;
    }

    function setLabel($label) 
    {
        $this->_label = $label;
    }

    function setComent($coment) 
    {
        $this->_coment = $coment;
    }

    function setCoef($coef) 
    {
        $this->_coef = $coef;
    }
}

