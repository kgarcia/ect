<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quiz_model extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}

  public function createQuiz($data){
    	$this->db->insert('quizzes', array('description'=>$data['description'], 
    										'address' =>$data['address'],
					                        'daycare_id' => $data['daycare_id'],
					                        'quizztype_id' => $data['quizztype_id'],
					                        'duration'=>$data['duration']
    											));
    }

    public function getQuizzes(){
    	$query = $this->db->get('quizzes');
    	echo $query->num_rows();
    	if($query->num_rows()>0) 
    		return $query;
    	else
    		return false;

    }

    public function showQuiz($id){
        $this->db->where('id_quizzes', $id);
        $query = $this->db->get('quizzes');
        if($query->num_rows()>0) 
            return $query;
        else
            return false;
    }
    
    public function getWorkshops($id){
        $this->db->where('quiz_id', $id);
        $query = $this->db->get('quiz_workshops');
        if($query->num_rows()>0) 
            return $query;
        else
            return false;
    }

	function get_daycare_quiz($daycare_id){
        
        $query = $this->db->get_where('quizzes', array('daycare_id' => $daycare_id, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    } 

    function get_quiz_questions($quiz_id){

		$query = $this->db->get_where('questions', array('quiz_id' => $quiz_id, 'status' => '1'));

        // si hay resultados
		if ($query->num_rows() > 0) {

			return $query->result();
		}
	}

	function get_question_solutions($question_id){

		$query = $this->db->get_where('solutions', array('question_id' => $question_id, 'status' => '1'));

        // si hay resultados
		if ($query->num_rows() > 0) {

			return $query->result();
		}
	}

	function create_employee_quiz($quiz_id,$employee_id)
    {
       $data = array(
            'quiz_id' => $quiz_id,
       		'employee_id' => $employee_id
        );
       $this->db->insert('employee_quiz', $data);
       return $this->db->insert_id();    
    }

    function get_question($id_questions){
        
        $query = $this->db->get_where('questions', array('id_questions' => $id_questions, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    }

    function get_question_correct_solution($question_id){
        
        $query = $this->db->get_where('solutions', array('question_id' => $question_id, 'correct' => 1, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    }

    function create_answer_option($employee_quiz_id,$question_id,$answer_option,$score)
    {
       $data = array(
            'employee_quiz_id' => $employee_quiz_id,
       		'question_id' => $question_id,
       		'answer_option' => $answer_option,
       		'score' => $score
        );
       $this->db->insert('answers', $data);
       return $this->db->insert_id();    
    }

    function create_answer_text($employee_quiz_id,$question_id,$answer_text,$score)
    {
       $data = array(
            'employee_quiz_id' => $employee_quiz_id,
       		'question_id' => $question_id,
       		'answer_text' => $answer_text,
       		'score' => $score
        );
       $this->db->insert('answers', $data);
       return $this->db->insert_id();    
    }

    function get_quiz_from_employee($quiz_id, $employee_id){
        
        $query = $this->db->get_where('employee_quiz', array('quiz_id' => $quiz_id, 'employee_id' => $employee_id, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    } 

    function get_employee_question_answer($employee_quiz_id, $question_id){
        
        $query = $this->db->get_where('answers', array('employee_quiz_id' => $employee_quiz_id, 'question_id' => $question_id, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    }

    function get_question_correct($question_id){
        
        $query = $this->db->get_where('solutions', array('question_id' => $question_id, 'correct' => 1, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    }


}