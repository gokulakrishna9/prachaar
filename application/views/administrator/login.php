<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author gokul
 */
class login extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        if($this->session->userdata('logged_in')=='yes'){
            $user_session_data = array(
                'logged_in' => 'yes'
            );
            $this->session->set_userdata($user_session_data);            
            $this->data['title']="Search Notification";
            $this->load->model('notification_category_model');
            $this->data['notification_categories'] = $this->notification_category_model->get_categories();
            $view = "administrator/get_notifications";
            $this->load->view('administrator/administrator_header',$this->data);
            
            $this->load->model('notification_model');
            $notification_records = $this->notification_model->get_notifications();
            if(sizeof($notification_records)>1){         
                $this->data['notification_records'] = $notification_records;
                $this->load->view($search_view,$this->data);
            }else{
                $this->data['notification_record'] =  $notification_records;
                $this->load->view($view,$this->data);
            }
            $this->load->view('footer');
        }else if($this->input->post('user_name')&&$this->input->post('password')){
            $this->load->model('login_model');
            $user_info = $this->login_model->authenticate();
            if($user_info){
                $this->data['status'] = "Successfully logged in.";
                $user_session_data = array(
                    'logged_in' => 'yes'
                );
                $this->session->set_userdata($user_session_data);            
                $this->data['title']="Search Notification";
                $this->load->model('notification_category_model');
                $this->data['notification_categories'] = $this->notification_category_model->get_categories();
                $view = "administrator/get_notifications";
                $this->load->view('administrator/administrator_header',$this->data);
                
                $this->load->model('notification_model');
                $notification_records = $this->notification_model->get_notifications();
                if(sizeof($notification_records)>1 || sizeof($notification_records)==0){         
                    $this->data['notification_records'] = $notification_records;
                    $this->load->view($search_view,$this->data);
                }else{
                    $view = "administrator/update_notifications";
                    $this->data['notification_record'] =  $notification_records;
                    $this->load->view($view,$this->data);
                }
            }else{
                $this->load->view('header');
                $this->data['status'] = "Invalid credentials please try again.";
                $this->load->view("login.php",$this->data);
            }
        }else{
            $this->load->view('header');
            $this->data['status'] = "Welcome please login.";
            $this->load->view("login.php",$this->data);
        }
        $this->load->view('footer');                
    }
}
