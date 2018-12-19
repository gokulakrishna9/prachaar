<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of grievances_model
 *
 * @author gokul
 */
class Grievances_Model extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function add_grievance(){
        $grievance_record = array();
        $file_count = 0;
        
        if($this->input->post('complainee_name')){ 
            $grievance_record['complainee_name'] = $this->input->post('complainee_name');
        }
        if($this->input->post('complainee_designation')){ 
            $grievance_record['complainee_designation'] = $this->input->post('complainee_designation');
        }
        if($this->input->post('wings_category_id')){ 
            $grievance_record['wings_category_id'] = $this->input->post('wings_category_id');
        }
        if($this->input->post('division_category_id')){ 
            $grievance_record['division_category_id'] = $this->input->post('division_category_id');
        }
        if($this->input->post('grievance_text')){ 
            $grievance_record['grievance_text'] = $this->input->post('grievance_text');
        }        
        //File upload
        $this->db->select('*')
            ->from('counter')
            ->where('counter_name','file_counter');
        
        $query = $this->db->get();		
        $result = $query->row();
        $file_count = $result->counter_value + 1;
        $file_name =$_FILES["userfile"]['name'];
        $renamed_file = ((string)$file_count).'_'.$file_name;
        $config['upload_path'] = './assets/grievance_documents/';
        $config['allowed_types'] = 'gif|jpg|png|chm|doc|dcom|docx|dot|dotx|hwp|odt|pdf|pub|rtf|xps|key|odp|pps|ppsx|ppt|pptm|pptx';
        $config['file_name'] = $renamed_file;
        $this->load->library('upload',$config);
        if($this->upload->do_upload('userfile')){
            $grievance_record['link'] = base_url().'assets/grievance_documents/'.urlencode($renamed_file);
            $data = array('upload_data' => $this->upload->data());
        } //End of file upload.
        else if($file_name ==''){
            
        }else{
            return false;
        }        
        $this->db->trans_start();
        $this->db->insert('grivences',$grievance_record);
        $ticket_number = $this->db->insert_id();
	$this->db->update('counter',array('counter_value'=>$file_count),array('counter_name'=>'file_counter'));
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        }
        else {            
            $this->db->select('*')
                    ->from('wings')
                    ->where('wings_category_id',$grievance_record['wings_category_id']);
            $wings_query = $this->db->get();
            $wings_result = $wings_query->row();
            $wing = $wings_result->wing_category;
            $this->db->select('*')
                    ->from('divisions')
                    ->where('division_id', $grievance_record['division_category_id']);
            $divisions_query = $this->db->get();
            $divisions_result = $divisions_query->row();
            $division = $divisions_result->division;
            
            $email_body = '<p><b>Ticket:</b> &nbsp; '.$ticket_number.'</p><br>'.
                    '<p><b>Complainee Name:</b> &nbsp; '.$grievance_record['complainee_name'].'</p><br>'.
                    '<p><b>Complainee Designation:</b> &nbsp; '.$grievance_record['complainee_designation'].'</p><br>'.
                    '<p><b>Wing:</b> &nbsp; '.$wing.'</p><br>'.
                    '<p><b>Division:</b> &nbsp; '.$division.'</p><br>'.
                    '<p><b>Grievance:</b></p><br><p>'.$grievance_record['grievance_text'].'</p>';
            $email_alternate = 'Ticket:'.$ticket_number.'.\n'.
                    'Complainee Name: '.$grievance_record['complainee_name'].'.\n'.
                    'Complainee Designation: '.$grievance_record['complainee_designation'].'.\n'.
                    'Wing: '.$wing.'.\n'.
                    'Division: '.$division.'.\n'.
                    'Grievance: '.$grievance_record['grievance_text'].'.\n';
           
            $email_subject = 'Ticket: '.$ticket_number;
            $file_name = $renamed_file;
            
            $email_message = array('to_address'=>'gokulakrishna9@gmail.com',
                'subject'=>$email_subject,
                'email_body'=>$email_body,
                'file_name'=>$_SERVER["DOCUMENT_ROOT"].'/public_org/assets/grievance_documents/'.$renamed_file,
                'email_alternate'=>$email_alternate);            
            $this->load->library('custom_email');
            $this->custom_email->send_email($email_message);
            
            return $ticket_number;
        }
    }
}
