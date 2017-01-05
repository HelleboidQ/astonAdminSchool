<?php
/**
 * Description of Person
 *
 * @author osef
 */
class Person 
{
    private $_ref;
    private $_nom;
    private $_prenom;
    
    // Constructeur paramétré
    function __construct($_ref, $_nom, $_prenom) 
    {
        $this->_ref = $_ref;
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
    }
    
    /*          /*
     *          /*
     * GETTERS  /*
     *          /*  
     *          */
    
    function get_ref() 
    {
        return $this->_ref;
    }

    function get_nom() 
    {
        return $this->_nom;
    }

    function get_prenom() 
    {
        return $this->_prenom;
    }
    
    /*          /*
     *          /*
     * SETTERS  /*
     *          /*  
     *          */
    
    function set_ref($_ref) 
    {
        $this->_ref = $_ref;
    }

    function set_nom($_nom) 
    {
        $this->_nom = $_nom;
    }

    function set_prenom($_prenom) 
    {
        $this->_prenom = $_prenom;
    }
}
