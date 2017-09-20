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

        $this->lang->load('employeeheader',$this->session->userdata('lang') ); 
        $this->lang->load('employeequiz',$this->session->userdata('lang') );
               
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

                            $correct_solutions = $this->Quiz_model->get_question_correct_solutions($question_id);
                            $answer_options = $this->input->post('ans_'.$question_id.'[]');

                            $cont = 0;

                            if (is_array($correct_solutions) && is_array($answer_options)){
                                foreach ($correct_solutions as $sol) {
                                    if (in_array($sol->id_solutions, $answer_options)){
                                        $cont++;
                                    }
                                }
                            }


                            if ($cont == sizeof($correct_solutions)){
                                $score = $question->score;
                            } else {
                                $score = 0;
                            }

                            if (is_array($answer_options)){
                                foreach ($answer_options as $opts) {
                                    $this->Quiz_model->create_answer_option($employee_quiz_id,$question_id,$opts,$score);
                                }
                            }

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

            echo "<script>javascript:alert('".$this->lang->line('quiz_sent_success')."');
            window.location='".base_url()."quiz/preservice'
            </script>";

        }
        
    } 

    public function preservice_quiz()

    {    
         if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'employee')
            {

            $lang = $this->session->userdata('lang');

            if ($lang == "spanish") {
                $quiz_type_id = 2;
            } else {
                $quiz_type_id = 1;
            }

            $daycare_id = $this->session->userdata('id_daycare');
            $quiz = $this->Quiz_model->get_daycare_quiz($daycare_id, $quiz_type_id);

             //Header & Footer Languages Variables
            
            $data['employee_label'] = $this->lang->line('employee_label');
            $data['home_item'] = $this->lang->line('home_item');
            $data['workshops_item'] = $this->lang->line('workshops_item');
            $data['workshops_completed_item'] = $this->lang->line('workshops_completed_item');
            $data['workshops_all_item'] = $this->lang->line('workshops_all_item');
            $data['quiz_item'] = $this->lang->line('quiz_item');
            $data['reports_item'] = $this->lang->line('reports_item');
            $data['reports_work_per_year_item'] = $this->lang->line('reports_work_per_year_item');
            $data['profile_item'] = $this->lang->line('profile_item');
            $data['change_password_item'] = $this->lang->line('change_password_item');
            $data['up_cert_item'] = $this->lang->line('up_cert_item');
            $data['signoff_item'] = $this->lang->line('signoff_item');
            $data['stay_footer'] = $this->lang->line('stay_footer');
            $data['enteremail_footer'] = $this->lang->line('enteremail_footer');
            $data['subscribe_footer'] = $this->lang->line('subscribe_footer');
            $data['copyright_footer'] = $this->lang->line('copyright_footer');
            $data['aboutus_footer'] = $this->lang->line('aboutus_footer');
            $data['product_footer'] = $this->lang->line('product_footer');
            $data['others_footer'] = $this->lang->line('others_footer');
            $data = array(
                            'employee_label'     =>         $data['employee_label'],
                            'home_item'     =>         $data['home_item'],
                            'workshops_item'        =>        $data['workshops_item'],
                            'workshops_completed_item'        =>        $data['workshops_completed_item'],
                            'workshops_all_item'         =>         $data['workshops_all_item'],
                            'quiz_item' =>  $data['quiz_item'],
                            'reports_item' =>  $data['reports_item'],
                            'reports_work_per_year_item' =>       $data['reports_work_per_year_item'],
                            'profile_item'     =>         $data['profile_item'],
                            'change_password_item'     =>         $data['change_password_item'],
                            'up_cert_item'     =>         $data['up_cert_item'],
                            'signoff_item'        =>         $data['signoff_item'],
                            'stay_footer'        =>        $data['stay_footer'],
                            'enteremail_footer'         =>         $data['enteremail_footer'],
                            'subscribe_footer' =>  $data['subscribe_footer'] ,
                            'copyright_footer' =>  $data['copyright_footer'],
                            'aboutus_footer' =>       $data['aboutus_footer'] ,
                            'product_footer' =>  $data['product_footer'] ,
                            'copyright_footer' =>  $data['copyright_footer'],
                            'others_footer' =>       $data['others_footer'] 
                            );        
                            $this->session->set_userdata($data);


            //LAnguage variables
            
            $data['quiz_send'] = $this->lang->line('quiz_send');
            $data['quiz_confirm'] = $this->lang->line('quiz_confirm');
            $data['no_quiz_language'] = $this->lang->line('no_quiz_language');
            $data['quiz_wrong_answer'] = $this->lang->line('quiz_wrong_answer');
            $data['quiz_correct_answer'] = $this->lang->line('quiz_correct_answer');
            $data['quiz_not_graded'] = $this->lang->line('quiz_not_graded');
            $data['quiz_graded'] = $this->lang->line('quiz_graded');

            if (is_null($quiz)) {

                $this->load->view('back/employee/header_view', $data);
                $this->load->view('back/employee/no_quiz_view', $data);
                $this->load->view('back/footer_view', $data);

            } else {

                $employee_id = $this->session->userdata('id_employee'); 
                $questions = $this->Quiz_model->get_quiz_questions($quiz->id_quizzes); 

                $employee_quiz = $this->Quiz_model->get_quiz_from_employee($quiz->id_quizzes, $employee_id);

                if (!is_null($employee_quiz)){

                    foreach ($questions as $i => $question) {
                        $answers[$question->id_questions] = $this->Quiz_model->get_employee_question_answers($employee_quiz->id_employee_quiz, $question->id_questions);
                        if ($question->questiontype_id == 1) {
                            $solutions[$question->id_questions] = $this->Quiz_model->get_question_solutions($question->id_questions);
                            if (is_array($answers[$question->id_questions])){
                                foreach ($answers[$question->id_questions] as $k => $ans) {
                                    $answers_options[$question->id_questions][$k] = $ans->answer_option;
                                }
                            }
                            //$correct_sols[$question->id_questions] = $this->Quiz_model->get_question_correct_solutions($question->id_questions);
                            //$correct_ids[$question->id_questions] = $correct_sol->id_solutions;
                        }
                    }

                    $data['questions'] = $questions;
                    $data['solutions'] = $solutions;
                    $data['answers'] = $answers;
                    $data['answers_options'] = $answers_options;
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

            }

         }else {
            redirect(base_url().'login');
         }  
    }
}