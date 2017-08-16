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
        $this->load->model('back/employee_model');
        $this->load->model('back/quiz_model');
        $this->load->model('back/Workshop_model');
	}

	function personnel_registration(){

        $data['title'] = 'Personnel Registration';    
        $data['active'] = 'Personnel_Registration';
        $this->load->view('back/daycare/header_view_k', $data);
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
        
        $this->load->view('back/daycare/header_view_k', $data);
        $this->load->view('back/daycare/employee_list', $data);
        $this->load->view('back/footer_view', $data); 
        
	}
	
	function show_employee(){
		 $data['title'] = 'Employee Workshops';    
        $data['active'] = 'Employee_List';
        #$data['employees'] = $this->employee_model->getEmployees();
        $data['segmento'] = $this->uri->segment(3);
        $this->load->view('back/daycare/header_view_k', $data);
        if($data['segmento']){
            $data['employee'] = $this->employee_model->showEmployee($data['segmento']);
            $data['workshops'] = $this->employee_model->getWorkshops($data['segmento']);
            $this->load->view('back/daycare/show_employee', $data);
        }
        else{
            $this->load->view('back/daycare/show_employee', $data);
        }
        $this->load->view('back/footer_view', $data); 
        
	}
	
	 public function employee_workshops()

    {    
         if($this->session->userdata('roles') == TRUE && 
            $this->session->userdata('roles') == 'administrator')
        {
            $data['title'] = 'Employee Workshops';    
            $data['active'] = 'Employee_List';
            #$data['employees'] = $this->employee_model->getEmployees();
            $data['segmento'] = $this->uri->segment(3);
            
            $id_employee = $this->uri->segment(3);
            $employee = $this->Workshop_model->get_employee($id_employee);

            $enrolls = $this->Workshop_model->get_employee_enrolls($id_employee);

            if( is_array($enrolls)){
                foreach ($enrolls as $i => $enroll) {

                    $workshops[$i] = $this->Workshop_model->get_workshop($enroll->workshop_id);
                    $vendor_id = $workshops[$i]->vendor_id;
                    $vendors[$i] = $this->Workshop_model->get_vendor($vendor_id);

                }
            }


            $data['active'] = 'home'; //TODO 
            $data['workshops'] = $workshops;
            $data['vendors'] = $vendors;
            
            $emp = $this->employee_model->get_employee($data['segmento']);
            $data['employee'] = $emp;
            
            $this->load->view('back/daycare/header_view_k', $data);
            $this->load->view('back/daycare/employee_workshops', $data);
            $this->load->view('back/footer_view', $data);  
         }
         else 
         {
            redirect(base_url().'login');
         }  
    }
    
    function quiz_registration(){

        $data['title'] = 'Quiz Registration';    
        $data['active'] = 'Quiz_Registration';
        $this->load->view('back/daycare/header_view_k', $data);
        $this->load->view('back/daycare/quiz_registration', $data);
        $this->load->view('back/footer_view', $data); 
        
	} 
    
    function create_quiz(){
         if($this->session->userdata('roles') == TRUE && 
            $this->session->userdata('roles') == 'administrator')
        {
//echo '<pre>';
            $id_employee = $this->session->userdata('id_user');
            $employee = $this->employee_model->get_employee_by_user_id($id_employee);
                            $quiz = array(
                    			'description' => $this->input->post('description'),
                    			'daycare_id' =>$employee->daycare_id,
                                            'quiztype_id' => 1,
                                            'duration' => '10:00:00'//
                    			);
                    			$quizid = $this->quiz_model->createQuiz($quiz);
                                //echo 'quiz_id'.$quizid;
                                
                             if ($this->input->post('question')) { // returns false if no property 
                                $questions = $this->input->post('question', true);
                                $count = $this->input->post('count', true);// questions count
                                $score = $this->input->post('score', true);
                                $opciones = array();
                                for ($x = 0; $x <= $count; $x++) {
                                    $var = 'optio'.$x.'n';
                                    ${"options$x"} = $this->input->post($var, true);
                                    array_push($opciones,${"options$x"});
                                    //echo '<br>opt'.$x;
                                    ////print_r(${"options$x"});
                                  
                                } 
                                  //echo '<br>las opciones';
                                    ////print_r($opciones);
                                    //echo '<br>las score';
                                    ////print_r($score);
                                //echo '<br>Qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq';
                            
                                foreach ($questions as $i => $a) { // need index to match other properties
                                    //echo '<br>quest';
                                    //echo $a;
                                    //echo '<br>score';
                                    //echo $score[$i];
                                    $question = array(
                                			'description' => $a,
                                			'quiz_id' => $quizid,
                                            'questiontype_id' => 1,
                                            'score' => $score[$i]//
                                			);
                                    $questionid = $this->quiz_model->createQuestion($question);
                                    
                                        //echo '<br>OOOOOOOOOOOOOOOOoooooooooooooooooooooopppp';
                                        $optin = $i+1;
                                    foreach (${"options$optin"} as $in => $op) {
                                        //echo '<br>quest';
                                        //echo $op;
                                        $option = array(
                                			'description' => $op,
                                			'question_id' => $questionid,
                                            'correct' => 1
                                			);
                            			if (!$this->db->insert('solutions', $option)) {
                                            // quit if insert fails - adjust accordingly
                                            //print_r($question);
                                            die('Failed question insert');
                                        }  
                                    }
                                    
                                }
                            
                                // don't redirect inside the loop
                                redirect(base_url().'daycare/quiz_list');
                                //echo '</pre>';   
                            } else{
                                ////echo 'No Data';
                            }
        }
         else 
         {
            redirect(base_url().'login');
         }            
	}
	
	function quiz_list(){
		$data['title'] = 'Quizzes List';    
        $data['active'] = 'Employee_List';
        
        $data['quizzes'] = $this->quiz_model->getQuizzes();
        
        $this->load->view('back/daycare/header_view_k', $data);
        $this->load->view('back/daycare/quiz_list', $data);
        $this->load->view('back/footer_view', $data); 
        
	}
}
?>