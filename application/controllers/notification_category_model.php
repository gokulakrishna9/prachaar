<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notification_category_model
 *
 * @author gokul
 */
class notification_category_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function add_category(){
        
    }
    
    function edit_category(){
        
    }
    
    function get_categories(){
        $this->db->select('*')
            ->from('notification_category');
        $query = $this->db->get();
		
	return $query->result();
    }
}
