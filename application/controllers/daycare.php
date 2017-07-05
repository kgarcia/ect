<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daycare extends CI_Controller {
	function __construct(){
		parent::__construct();
		 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        //$this->load->model(array('Period_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
        //$this->load->helper('server_root');
        //$this->removeCache();
        $this->load->model('back/employee_model');
	}

	function personnel_registration(){

        $data['title'] = 'Personnel Registration';    
        $data['active'] = 'Personnel_Registration';
        $this->load->view('back/header_view', $data);
        //$this->load->view('front/nav_view', $data);
        $this->load->view('back/daycare/personnel_registration', $data);
        $this->load->view('back/footer_view', $data); 
        
	}

	function create_employee(){
                
		$data = array(
			'name' => $this->input->post('name'),
			'address' =>$this->input->post('address'),// $this->input->post('address'),
                        'daycare_id' => 1,
                        'user_id'=>1,
                        'phone'=>$this->input->post('phone'),
                        'birthdate'=>$this->input->post('birthdate'),
                        'gender'=>$this->input->post('gender'),
			);
                $this->employee_model->createEmployee($data);
                $this->employee_list(); 
	}

	function employee_list(){
		 $data['title'] = 'Employee List';    
        $data['active'] = 'Employee_List';
        $data['employees'] = $this->employee_model->getEmployees();
        
        $this->load->view('back/header_view', $data);
        $this->load->view('back/daycare/employee_list', $data);
        $this->load->view('back/footer_view', $data); 
        
	}
}
?>