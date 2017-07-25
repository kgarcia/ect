<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Employee_quiz extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
        $this->load->model('back/Quiz_model');
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
               
    }

    public function preservice_quiz()

    {    
         if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'employee')
            {

            $data['active'] = 'home'; 

            $daycare_id = $this->session->userdata('id_daycare');
            $quiz = $this->Quiz_model->get_daycare_quiz($daycare_id);
            $questions = $this->Quiz_model->get_quiz_questions($quiz->id_quizzes);

            foreach ($questions as $i => $question) {
            	if ($question->questiontype_id == 1) {
            		$solutions[$question->id_questions] = $this->Quiz_model->get_question_solutions($question->id_questions);
            	}
            }

            $data['questions'] = $questions;
            $data['solutions'] = $solutions;
            $data['quiz_description'] = $quiz->description;

            $this->load->view('back/header_view', $data);
            $this->load->view('back/employee/quiz_view', $data);
            $this->load->view('back/footer_view', $data);  
         }else {
            redirect(base_url().'login');
         }  
    }


    function request_transfer()
    {   
        if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'employee')

        {
        
            if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
            {

                //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
                $this->form_validation->set_rules('daycare','Daycare','required|trim|xss_clean');
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


                if($this->form_validation->run()==FALSE)
                {
                    $this->index();
                }
                else
                {
                    //EN CASO CONTRARIO PROCESAMOS LOS DATOS
                    $id_new_daycare = $this->input->post('daycare');
                    $id_employee = $this->session->userdata('id_employee');
                    $id_old_daycare = $this->session->userdata('id_daycare');

                    $this->Transfer_model->new_transfer_request($id_employee,$id_old_daycare,$id_new_daycare);

                    redirect(base_url()); //TODO
            }
        }
        

    } 
}

}