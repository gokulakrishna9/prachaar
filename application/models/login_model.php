<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author gokul
 */
class Login_model extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function authenticate(){
        $username = array(
            'user_name'=>$this->input->post('user_name'),
        );        
        $password = MD5($this->input->post('password'));
        
        $this->db->select('user_name')
                ->from('user')
                ->or_where($username)
                ->where('password', $password)
                ->limit(1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
}
