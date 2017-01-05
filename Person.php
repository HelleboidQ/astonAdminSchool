<?php

/**
 * Description of Person
 *
 * @author osef
 */
class Person {

    private $_id;
    private $_nom;
    private $_prenom;

    // Constructeur paramétré
    function __construct($_id, $_nom, $_prenom) {
        $this->$_id = $_id;
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
    }

    /*          /*
     *          /*
     * GETTERS  /*
     *          /*
     *          */

    function getId() {
        return $this->$_id;
    }

    function getNom() {
        return $this->_nom;
    }

    function getPrenom() {
        return $this->_prenom;
    }

    /*          /*
     *          /*
     * SETTERS  /*
     *          /*
     *          */

    function setId($_id) {
        $this->$_id = $_id;
    }

    function setNom($_nom) {
        $this->_nom = $_nom;
    }

    function setPrenom($_prenom) {
        $this->_prenom = $_prenom;
    }

}
