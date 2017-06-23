<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Agency_daycare extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
        //$this->load->model('back/Register_daycare_model');
        //$this->load->model(array('Login_model','backend/Beneficiary_model','backend/Event_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
               
    }

    public function index()

    {    
     if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
        {

        $data['active'] = 'daycare'; 
        $data['title'] = 'Daycare';
        $this->load->view('back/header_view', $data);
        $this->load->view('back/agency/agency_daycare_view', $data); 
        $this->load->view('back/footer_view', $data);
     }
    


    }

}