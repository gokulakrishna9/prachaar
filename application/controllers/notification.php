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
class notification extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function search_notfications(){
        $this->data['title']="Search Notification";
        $this->load->model('notification_categories_model');
        $this->data['notification_categories'] = $this->notification_categories_model->get_notification_categories();
        $view = "pages/public/search_notifications";
        $this->load->view('templates/public_header',$this->data);
        $this->load->model('notification_model');
        $notification_records = $this->notification_model->search_notifications();
        $this->data['notification_records'] = $notification_records;
        $this->load->view($search_view,$this->data);        
        $this->load->view('templates/footer');
    }
}
