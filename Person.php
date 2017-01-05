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
    
    function getRef() 
    {
        return $this->_ref;
    }

    function getNom() 
    {
        return $this->_nom;
    }

    function getPrenom() 
    {
        return $this->_prenom;
    }
    
    /*          /*
     *          /*
     * SETTERS  /*
     *          /*  
     *          */
    
    function setRef($_ref) 
    {
        $this->_ref = $_ref;
    }

    function setNom($_nom) 
    {
        $this->_nom = $_nom;
    }

    function setPrenom($_prenom) 
    {
        $this->_prenom = $_prenom;
    }
}
