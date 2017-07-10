<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agency extends CI_Controller {
	function __construct(){
		parent::__construct();
		 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        //$this->load->model(array('Period_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
        //$this->load->helper('server_root');
        //$this->removeCache();
	}

	function index(){

        $data['title'] = 'Daycare Registration';    
        $data['active'] = 'daycare_registration';
        $this->load->view('back/header_view', $data);
        //$this->load->view('front/nav_view', $data);
        $this->load->view('back/agency/daycare_registration', $data);
        $this->load->view('back/footer_view', $data); 
        
	}
}
?>