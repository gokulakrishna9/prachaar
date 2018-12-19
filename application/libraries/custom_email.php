<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Email
 *
 * @author gokul
 */
class Custom_Email {
    function __construct()
    {
        $this->CI =& get_instance();
    }
    
    function send_email($email_message){
        $config = array();
        $config['useragent'] = "CodeIgniter";
   //     $config['mailpath']  = "/usr/sbin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']  = "smtp";
        $config['smtp_host'] = "tsmsidc.in"; //your domain name.
        $config['smtp_port'] = "25";
        $config['smtp_user'] = "info@tsmsidc.in"; //your mail id
        $config['smtp_pass'] = "admintsmsidc@2016";       //mail account password
        $config['mailtype'] = 'html';
        $config['charset']  = 'utf-8';
        $config['newline']  = "\r\n";
        $config['wordwrap'] = TRUE;
        
       
        //load email library
        $this->CI->load->library('email');        
        $this->CI->email->initialize($config);
        
        //set email information and content
        $this->CI->email->from('info@tsmsidc.in', 'Info_TSMSIDC');
        $this->CI->email->to('gbsiyer@gmail.com'); // $email_message['to_address'];
        
        $this->CI->email->cc('gunaranjan@yousee.in');
        $this->CI->email->bcc('gokulakrishna9@gmail.com');
        
        $this->CI->email->subject($email_message['subject']);
        $this->CI->email->message($email_message['email_body']);
        $this->CI->email->set_alt_message($email_message['email_alternate']);
        $this->CI->email->attach($email_message['file_name']);
        
        if($this->CI->email->send())
        {
            
        }        
        else
        {
            show_error($this->CI->email->print_debugger());
        }  
    }
}
