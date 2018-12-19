<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wings_category_model
 *
 * @author gokul
 */
class wings_category_model extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function get_wings_categories(){
        $this->db->select('*')
            ->from('wings');
            
        $wings_query = $this->db->get();
        return $wings_query->result();
    }
}
