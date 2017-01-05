<?php
/**
 * Description of Person
 *
 * @author ????????
 */
class Person 
{
    private $_id;
    private $_lastname;
    private $_firstname;
    
    // Constructeur paramétré
    function __construct($_id, $_lastname, $_firstname) 
    {
        $this->_id = $_id;
        $this->_lastname = $_lastname;
        $this->_firstname = $_firstname;
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

    function getLastName() 
    {
        return $this->_lastname;
    }

    function getFirstName() 
    {
        return $this->_firstname;
    }
    
    /*          /*
     *          /*
     * SETTERS  /*
     *          /*  
     *          */
    
    function setId($_id) 
    {
        $this->_id = $_id;
    }

    function setLastName($_lastname) 
    {
        $this->_lastname = $_lastname;
    }

    function setFistName($_firstname) 
    {
        $this->_firstname = $_firstname;
    }
}
