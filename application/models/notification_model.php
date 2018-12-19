<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notification_model
 *
 * @author gokul
 */
class notification_model extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function add_notification(){
        $notification_record = array();
        $file_count = 0;
        if($this->input->post('notification_category_id')){ 
            $notification_record['notification_category_id'] = $this->input->post('notification_category_id');
        }
        if($this->input->post('notification_date')){ 
            $notification_record['notification_date'] = date("Y-m-d",strtotime($this->input->post('notification_date')));
        }
        if($this->input->post('title')){ 
            $notification_record['title'] = $this->input->post('title');
        }
        //File upload
        $this->db->select('*')
            ->from('counter')
            ->where('counter_name','file_counter');
        
        $query = $this->db->get();		
        $result = $query->row();
        $file_count = ++$result->counter_value;
        $file_name =$_FILES["userfile"]['name'];
        $renamed_file = ((string)$file_count).'_'.$file_name;
        $config['upload_path'] = './assets/documents/';
        $config['allowed_types'] = 'gif|jpg|png|chm|doc|dcom|docx|dot|dotx|hwp|odt|pdf|pub|rtf|xps|key|odp|pps|ppsx|ppt|pptm|pptx';
        $config['file_name'] = $renamed_file;
        $this->load->library('upload',$config);
        if($this->upload->do_upload('userfile')){
            $notification_record['link'] = base_url().'assets/documents/'.urlencode($renamed_file);
            $data = array('upload_data' => $this->upload->data());
        } //End of file upload.
        else if($this->input->post('link')){
            $notification_record['link'] = urlencode($this->input->post('link'));
        }else{
            return false;
        }
        if($this->input->post('office_file_number')){ 
            $notification_record['office_file_number'] = $this->input->post('office_file_number');
        }
        $this->db->trans_start();
        $this->db->insert('notification',$notification_record);
	$this->db->update('counter',array('counter_value'=>$file_count),array('counter_name'=>'file_counter'));
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        }
        else {
            return true;
        }
    }
    
    function update_notification(){
        $notification_record = array();
        if($this->input->post('notification_category_id')){ 
            $notification_record['notification_category_id'] = $this->input->post('notification_category_id');
        }
        if($this->input->post('notification_date')){ 
            $notification_record['notification_date'] = date("Y-m-d",strtotime($this->input->post('notification_date')));
        }
        if($this->input->post('title')){ 
            $notification_record['title'] = $this->input->post('title');
        }
        //File upload
        $this->db->select('*')
            ->from('counter')
            ->where('counter_name','file_counter');
        
        $query = $this->db->get();		
        $result = $query->row();
        $file_count = ++$result->counter_value;
        $file_name =$_FILES["userfile"]['name'];
        $renamed_file = ((string)$file_count).'_'.$file_name;
        $config['upload_path'] = './assets/documents/';
        $config['allowed_types'] = 'gif|jpg|png|chm|doc|dcom|docx|dot|dotx|hwp|odt|pdf|pub|rtf|xps|key|odp|pps|ppsx|ppt|pptm|pptx';
        $config['file_name'] = $renamed_file;
        $this->load->library('upload',$config);
        if($this->upload->do_upload('userfile')){
            $notification_record['link'] = base_url().'assets/documents/'.urlencode($renamed_file);
            $data = array('upload_data' => $this->upload->data());
        } //End of file upload.
        else if($this->input->post('link')){
            $notification_record['link'] = urlencode($this->input->post('link'));
        }else{
            return false;
        }
        if($this->input->post('office_file_number')){ 
            $notification_record['office_file_number'] = $this->input->post('office_file_number');
        }
        if($this->input->post('view_flag')){ 
            $notification_record['view_flag'] = $this->input->post('view_flag');
        }
        if($this->input->post('office_file_number')){ 
            $notification_record['office_file_number'] = $this->input->post('office_file_number');
        }
        if($this->input->post('notification_id')){
            $notification_id = $this->input->post('notification_id');
        }else{
            return false;
        }
        $this->db->trans_start();
        $this->db->update('notification',$notification_record,array('notification_id'=>$notification_id));
        $this->db->update('counter',array('counter_value'=>$file_count),array('counter_name'=>'file_counter'));
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        }
        else {
            return true;
        }
    }
    
    function get_notifications(){
        $limit = 30;
        $notification_record = array();
        if($this->input->post('notification_category_id')){ 
            $notification_record['notification.notification_category_id'] = $this->input->post('notification_category_id');
        }
        if($this->input->post('from_date') && $this->input->post('to_date')){
            $from_date=date("Y-m-d",strtotime($this->input->post('from_date')));
            $to_date=date("Y-m-d",strtotime($this->input->post('to_date')));           
        }
        else if($this->input->post('from_date') || $this->input->post('to_date')){
            if($this->input->post('from_date')){
                $from_date = $this->input->post('from_date');
                if($this->input->post('to_date')){
                    $to_date=$this->input->post('to_date');                        
                }else{
                    $to_date=date("Y-m-d");
                }
            }else{
                $to_date = $this->input->post('to_date');
                $from_date = date('Y-m-d', strtotime($to_date . ' -90 days'));
            }            
        }
        else{
            $to_date=date("Y-m-d");
            $from_date = date('Y-m-d', strtotime($to_date . ' -90 days'));
        }
        if($this->input->post('title')){
            $title = $this->input->post('title');
            $this->db->like('LOWER(title)', strtolower($title), 'both'); 
        }
        if($this->input->post('notification_id')){
            $notification_id = $this->input->post('notification_id');
            $this->db->where('notification.notification_id', $notification_id);
        }
        $this->db->select('*,notification_category.notification_category')
            ->from('notification')
            ->join('notification_category','notification_category.notification_category_id=notification.notification_category_id')
            ->where($notification_record)
            ->where("(notification_date BETWEEN '$from_date' AND '$to_date')")
            ->order_by('notification_date','desc')
            ->order_by('notification_id','asc')
            ->limit('30');
        $query = $this->db->get();
		
	return $query->result();
    }
    
    function get_public_notifications(){
        $limit = 30;
        $notification_record = array();
        if($this->input->post('notification_category_id')){ 
            $notification_record['notification.notification_category_id'] = $this->input->post('notification_category_id');
        }
        if($this->input->post('from_date') && $this->input->post('to_date')){
            $from_date=date("Y-m-d",strtotime($this->input->post('from_date')));
            $to_date=date("Y-m-d",strtotime($this->input->post('to_date')));           
        }
        else if($this->input->post('from_date') || $this->input->post('to_date')){
            if($this->input->post('from_date')){
                $from_date = $this->input->post('from_date');
                if($this->input->post('to_date')){
                    $to_date=$this->input->post('to_date');                        
                }else{
                    $to_date=date("Y-m-d");
                }
            }else{
                $to_date = $this->input->post('to_date');
                $from_date = date('Y-m-d', strtotime($to_date . ' -90 days'));
            }            
        }
        else{
            $to_date=date("Y-m-d");
            $from_date = date('Y-m-d', strtotime($to_date . ' -90 days'));
        }
        if($this->input->post('title')){
            $title = $this->input->post('title');
            $this->db->like('LOWER(title)', strtolower($title), 'both');
        }
        if($this->input->post('notification_id')){
            $notification_id = $this->input->post('notification_id');
        }
        
        $this->db->select('*,notification_category.notification_category')
        ->from('notification')
        ->join('notification_category','notification_category.notification_category_id=notification.notification_category_id')
        ->where("(notification_date BETWEEN '$from_date' AND '$to_date')")
        ->where("view_flag",'yes')
        ->where($notification_record)
        ->order_by('notification_date','desc')
        ->limit('30');
        $query = $this->db->get();
	return $query->result();
    }
}
