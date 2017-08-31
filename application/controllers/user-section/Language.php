<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Language extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
        //$this->load->model(array('Login_model','backend/Beneficiary_model','backend/Event_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
               
    }

 function index($lang)
    {   

    $this->session->set_userdata('lang',$lang);

   redirect($_SERVER['HTTP_REFERER']);
   

    //$this->lang->load('employeeheader', $lang ); 


    }


}