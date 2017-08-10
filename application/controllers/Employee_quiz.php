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


    function send_quiz()
    {   
        if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'employee')

        {

            $quiz_id = $this->input->post('quiz_id'); 
            $employee_id = $this->session->userdata('id_employee');
            $employee_quiz_id = $this->Quiz_model->create_employee_quiz($quiz_id,$employee_id);
        
            if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
            {
                $e=0;
                while (isset($_POST['quest_'.$e])){

                    $question_id = $this->input->post('quest_'.$e); 
                    $question = $this->Quiz_model->get_question($question_id);
                    switch($question->questiontype_id)
                    {
                        case 1:

                            $correct_solution = $this->Quiz_model->get_question_correct_solution($question_id);
                            $answer_option = $this->input->post('ans_'.$question_id);
                            if ($correct_solution->id_solutions == $answer_option){
                                $score = $question->score;
                            } else {
                                $score = 0;
                            }
                            $this->Quiz_model->create_answer_option($employee_quiz_id,$question_id,$answer_option,$score);
                            break;

                        case 2:

                            $answer_text = $this->input->post('ans_'.$question_id);
                            $score = 0;
                            
                            $this->Quiz_model->create_answer_text($employee_quiz_id,$question_id,$answer_text,$score);
                            break;
                    }
                    $e++;
                }

            }

            echo "<script>javascript:alert('The quiz has been sent successfully');
            window.location='".base_url()."quiz/preservice'
            </script>";

        }
        
    } 

    public function preservice_quiz()

    {    
         if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'employee')
            {

            $daycare_id = $this->session->userdata('id_daycare');
            $quiz = $this->Quiz_model->get_daycare_quiz($daycare_id);
            $employee_id = $this->session->userdata('id_employee'); 
            $questions = $this->Quiz_model->get_quiz_questions($quiz->id_quizzes); 

            $employee_quiz = $this->Quiz_model->get_quiz_from_employee($quiz->id_quizzes, $employee_id);

            if (!is_null($employee_quiz)){

                foreach ($questions as $i => $question) {
                    if ($question->questiontype_id == 1) {
                        $solutions[$question->id_questions] = $this->Quiz_model->get_question_solutions($question->id_questions);
                        $correct_sol = $this->Quiz_model->get_question_correct($question->id_questions);
                        $correct_ids[$question->id_questions] = $correct_sol->id_solutions;
                    }
                    $answers[$question->id_questions] = $this->Quiz_model->get_employee_question_answer($employee_quiz->id_employee_quiz, $question->id_questions);
                }

                $data['questions'] = $questions;
                $data['solutions'] = $solutions;
                $data['answers'] = $answers;
                $data['correct_ids'] = $correct_ids;
                $data['quiz_description'] = $quiz->description;
                $data['quiz_reviewed'] = $employee_quiz->reviewed;

                $this->load->view('back/employee/header_view', $data);
                $this->load->view('back/employee/solved_quiz_view', $data);
                $this->load->view('back/footer_view', $data);  

            } else {

                foreach ($questions as $i => $question) {
                    if ($question->questiontype_id == 1) {
                        $solutions[$question->id_questions] = $this->Quiz_model->get_question_solutions($question->id_questions);
                    }
                }

                $data['questions'] = $questions;
                $data['solutions'] = $solutions;
                $data['quiz_id'] = $quiz->id_quizzes;
                $data['quiz_description'] = $quiz->description;

                $this->load->view('back/employee/header_view', $data);
                $this->load->view('back/employee/quiz_view', $data);
                $this->load->view('back/footer_view', $data);  

            }

         }else {
            redirect(base_url().'login');
         }  
    }
}