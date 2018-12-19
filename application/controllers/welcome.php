<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $this->load->view('header');
            $this->load->model('notification_model');
            $notification_records = $this->notification_model->get_public_notifications();
            $this->data['notification_records'] = $notification_records;
            $this->load->view('left_nav');
            $this->load->view('welcome_message',$this->data);            
            $this->load->view('footer');
	}
        
        public function about_us()
        {
            $this->load->view('header');
            $this->load->view('left_nav');
            $this->load->view('about_us');
            $this->load->view('footer');
        }
        
        public function objectives(){
            $this->load->view('header');
            $this->load->view('left_nav');
            $this->load->view('objectives');
            $this->load->view('footer');
        }
        
        public function projects_completed()
        {
            $this->load->view('header');
            $this->load->view('left_nav');
            $this->load->view('projects_completed');
            $this->load->view('footer');
        }
        
        public function divisions()
        {
            $this->load->view('header');
            $this->load->view('left_nav');
            $this->load->view('divisions');
            $this->load->view('footer');
        }
        public function e_aushadhi()
        {
            $this->load->view('header');
            $this->load->view('left_nav');
            $this->load->view('e_aushadhi');
            $this->load->view('footer');
        }
        public function achievements()
        {
            $this->load->view('header');
            $this->load->view('left_nav');
            $this->load->view('achievements');
            $this->load->view('footer');
        }
        public function who_is_who()
        {
            $this->load->view('header');
            $this->load->view('left_nav');
            $this->load->view('who_is_who');
            $this->load->view('footer');
        }
        
        public function notification()
        {
            $this->load->view('header');
            $this->data['title']="Search Notification";
            $this->load->model('notification_category_model');
            $this->data['notification_categories'] = $this->notification_category_model->get_categories();
            $search_view = "notification";
            $this->load->view('header');
            $this->load->view('left_nav');
            $this->load->model('notification_model');
            $notification_records = $this->notification_model->get_public_notifications();
            $this->data['notification_records'] = $notification_records;
            $this->load->view($search_view,$this->data);
            $this->load->view('footer');
        }
        
        public function services()
        {
            $this->load->view('header');
            $this->load->view('left_nav');
            $this->load->view('services');
            $this->load->view('footer');
        }
        
        function quick_links(){
            $this->load->view('header');
            $this->load->view('left_nav');
            $this->load->view('quick_links');
            $this->load->view('footer');
        }
        
        public function contact()
        {
            $this->load->view('header');
            $this->load->view('left_nav');
            $this->load->view('contact');
            $this->load->view('footer');
        }
        
        function add_grievance(){            
            $captcha_word = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
            $user_session_data = array(
                'captcha_word' => $captcha_word
            );
            
            $this->load->helper('captcha');
            $captcha_config = array(   
                'word'          => $captcha_word,
                'img_path'	=> './assets/captcha/',
                'img_url'	=> base_url().'assets/captcha/',                
                'img_width'	=> '150',
                'img_height'    => 30,
                'expiration'    => 300
            );
            
            $cap_link = create_captcha($captcha_config);
            $this->data['image'] = $cap_link['image'];
            
            $this->load->helper('form');
            $this->load->library('form_validation');            
            $this->data['title']="Add Grievance";
            $this->load->model('wings_category_model');
            $this->data['wing_categories'] = $this->wings_category_model->get_wings_categories();
            $this->load->model('divisions_category_model');
            $this->data['division_categories'] = $this->divisions_category_model->get_divsions_categories();
            $view = "add_grievance";
            $this->load->view('header',$this->data);
            
            $this->form_validation->set_rules('complainee_name','complainee_designation','wings_category_id','grievance_text','captcha','trim|xss_clean');
            if ($this->form_validation->run() === FALSE){
                $this->session->unset_userdata('captcha_word');
                $this->session->set_userdata($user_session_data);
                $this->data['response'] = "Missing data.";
                $this->load->view('left_nav');
                $this->load->view($view,$this->data);
            }else if($this->input->post('add_grievance')){
                $user_captcha = $this->input->post('captcha');
                $session_captcha = $this->session->userdata('captcha_word');
                if(strcmp(strtoupper($user_captcha),strtoupper($session_captcha)) == 0){
                    $this->load->model('grievances_model');
                    $this->data['response'] = $this->grievances_model->add_grievance() ? "Succesfully added." : "Something went wrong.";
                    $this->session->unset_userdata('captcha_word');
                    $this->session->set_userdata($user_session_data);
                    $this->load->view('left_nav');
                    $this->load->view($view,$this->data);                
                }else{
                    $this->session->unset_userdata('captcha_word');
                    $this->session->set_userdata($user_session_data);
                    $this->data['response'] = "Incorrect Captcha.";
                    $this->load->view($view,$this->data);
                }
            }else{
                $this->session->unset_userdata('captcha_word');
                $this->session->set_userdata($user_session_data);
                $this->data['response'] = "Welcome.";
                $this->load->view($view,$this->data);
            }

            $this->load->view('footer');
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */