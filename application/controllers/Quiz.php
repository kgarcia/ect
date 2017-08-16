<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daycare extends CI_Controller {
	public function __construct(){
		parent::__construct();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        //$this->load->model(array('Period_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
        //$this->load->helper('server_root');
        //$this->removeCache();
        $this->load->model('back/quiz_model');
	}

	function quiz_registration(){

        $data['title'] = 'Quiz Registration';    
        $data['active'] = 'Quiz_Registration';
        $this->load->view('back/header_view', $data);
        //$this->load->view('front/nav_view', $data);
        $this->load->view('back/daycare/quiz_registration', $data);
        $this->load->view('back/footer_view', $data); 
        
	}

	function create_quiz(){
                
		$data = array(
			'name' => $this->input->post('name'),
			'address' =>$this->input->post('address'),// $this->input->post('address'),
                        'daycare_id' => 1,
                        'user_id'=>1,
                        'phone'=>$this->input->post('phone'),
                        'birthdate'=>$this->input->post('birthdate'),
                        'gender'=>$this->input->post('gender'),
			);
                $this->quiz_model->createquiz($data);
                $this->quiz_list(); 
	}

	function quiz_list(){
		 $data['title'] = 'quiz List';    
        $data['active'] = 'quiz_List';
        $data['quizzes'] = $this->quiz_model->getquizzes();
        
        $this->load->view('back/header_view', $data);
        $this->load->view('back/daycare/quiz_list', $data);
        $this->load->view('back/footer_view', $data); 
        
	}
	
	function show_quiz(){
		 $data['title'] = 'quiz List';    
        $data['active'] = 'quiz_List';
        #$data['quizzes'] = $this->quiz_model->getquizzes();
        $data['segmento'] = $this->uri->segment(3);
        $this->load->view('back/header_view', $data);
        if($data['segmento']){
            $data['quiz'] = $this->quiz_model->showquiz($data['segmento']);
            $data['workshops'] = $this->quiz_model->getWorkshops($data['segmento']);
            $this->load->view('back/daycare/show_quiz', $data);
        }
        else{
            $this->load->view('back/daycare/show_quiz', $data);
        }
        $this->load->view('back/footer_view', $data); 
        
	}
}
?>