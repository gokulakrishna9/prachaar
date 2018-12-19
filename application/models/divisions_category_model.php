<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of divisions_category_model
 *
 * @author gokul
 */
class divisions_category_model extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function get_divsions_categories(){
        $this->db->select('*')
            ->from('divisions');
        
        $divisions_query = $this->db->get();
        return $divisions_query->result();
    }
}
