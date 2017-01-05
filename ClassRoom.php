<?php

/**
 *
 * @author ????????
 * 
 */

class ClassRoom 
{
    private $_id;
    private $_name;
    private $_coment;
    
    function __construct($_id, $_name, $_coment) 
    {
        $this->_id = $_id;
        $this->_name = $_name;
        $this->_coment = $_coment;
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

    function getName() 
    {
        return $this->_name;
    }

    function getComent() 
    {
        return $this->_coment;
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

    function setName($name) 
    {
        $this->_name = $name;
    }

    function setComent($coment) 
    {
        $this->_coment = $coment;
    }
}
