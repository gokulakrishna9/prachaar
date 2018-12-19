<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notification
 *
 * @author gokul
 */
class notification_admin_access extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in')=='yes'){
            $this->data['status'] = "Login successful.";
        }else{
            $this->data['status'] = "Invalid credentials please try again.";
            $this->load->view("login.php",$this->data);
        }
    }
    
    function add_notification(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->data['title']="Add Notification";
        $this->load->model('notification_category_model');
        $this->data['notification_categories'] = $this->notification_category_model->get_categories();
        $view = "administrator/add_notification";
        $this->load->view('administrator/administrator_header',$this->data);
        
        $this->form_validation->set_rules('notification_category_id','notification_date','title','link','trim|xss_clean');
        if ($this->form_validation->run() === FALSE){
            $this->data['response'] = "Missing data.";            
            $this->load->view($view,$this->data);
        }else if($this->input->post('add_notification')){
            $this->load->model('notification_model');
            $this->data['response'] = $this->notification_model->add_notification() ? "Succesfully added." : "Something went wrong.";
            $this->load->view($view,$this->data);
        }else{
            $this->data['response'] = "Welcome.";
            $this->load->view($view,$this->data);
        }

        $this->load->view('footer');
    }
    
    function update_notification(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->data['title']="Edit Notification";
        $this->load->model('notification_category_model');
        $this->data['notification_categories'] = $this->notification_category_model->get_categories();
        $edit_view = "administrator/update_notification";
        $search_view = "administrator/get_notifications";
        $this->load->view('administrator/administrator_header',$this->data);
        
        $this->form_validation->set_rules('notification_category_id','notification_date','title','link','trim|xss_clean');
        if (!($this->form_validation->run() === TRUE) && $this->input->post('notification_id')!=''){
            $this->data['response'] = "Missing data.";
            $this->load->model('notification_model');
            $this->data['notification_record'] = $this->notification_model->get_notifications();
            $this->load->view($edit_view,$this->data);
        }else if($this->input->post('notification_id')!='' && $this->input->post('update_notification')==''){
            $this->load->model('notification_model');
            $this->data['notification_record'] = $this->notification_model->get_notifications();
            $this->load->view($edit_view,$this->data);
        }
        else if($this->input->post('update_notification')){
            $this->load->model('notification_model');
            $this->data['response'] = $this->notification_model->update_notification() ? "Succesfully updated." : "Something went wrong.";
            unset($_POST);
            $this->data['notification_records'] = $this->notification_model->get_notifications();
            $this->load->view($search_view,$this->data);
        }else{
            $this->load->model('notification_model');
            $this->data['notification_records'] = $this->notification_model->get_notifications();            
            $this->load->view($search_view,$this->data);
        }

        $this->load->view('footer');
    }
    
    function search_notfications(){
        $this->data['title']="Search Notification";
        $this->load->model('notification_category_model');
        $this->data['notification_categories'] = $this->notification_category_model->get_categories();
        $search_view = "administrator/get_notifications";
        $edit_view = "administrator/update_notification";
        $this->load->view('administrator/administrator_header',$this->data);
        
        $this->load->model('notification_model');
        $notification_records = $this->notification_model->get_notifications();
        if(sizeof($notification_records)>1 || sizeof($notification_records)==0){         
            $this->data['notification_records'] = $notification_records;
            $this->load->view($search_view,$this->data);
        }else{
            $this->data['notification_record'] =  $notification_records;
            $this->load->view($edit_view,$this->data);
        }
        $this->load->view('footer');
    }
    
}
