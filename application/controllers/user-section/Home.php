<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
        $this->load->model('back/Home_model');
        //$this->load->model(array('Login_model','backend/Beneficiary_model','backend/Event_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
               
    }

    public function index()

    {    
     if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
        {

        $data['active'] = 'home'; 
        $data['title'] = 'Webadmin';
        //$this->load->view('header_view', $data);
        $this->load->view('back/webadmin/header_view', $data);
        $this->load->view('back/webadmin/home_view', $data); 
        $this->load->view('back/footer_view', $data); 
        
     }elseif($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
        {

        $data['active'] = 'home'; 
        $data['title'] = 'Agency';
        $this->load->view('back/agency/header_view', $data);
        $this->load->view('back/agency/home_view', $data);
        $this->load->view('back/footer_view', $data); 
        

     }elseif($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'administrator')
        {

        $data['active'] = 'home'; 
        $data['title'] = 'Child Care';
        //$this->load->view('header_view', $data);
        $this->load->view('back/agency/home_view', $data);
        //$this->load->view('footer_view', $data);   
     }elseif($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'vendor')
        {

        $data['active'] = 'home'; 
        $data['title'] = 'Child Care';
        //$this->load->view('header_view', $data);
        $this->load->view('back/agency/home_view', $data);
        //$this->load->view('footer_view', $data);  
     }elseif($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'employee')
        {

        $data['active'] = 'home'; 
        $data['title'] = 'Child Care';
        $this->load->view('back/employee/header_view', $data);
        $this->load->view('back/employee/home_view', $data);
        $this->load->view('back/footer_view', $data);  
     }else {
            redirect(base_url().'login');
     }
    


    }

}