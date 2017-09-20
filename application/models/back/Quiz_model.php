<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quiz_model extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}

  public function createQuiz($data){
    	if (!$this->db->insert('quizzes', array('description'=>$data['description'], 
    										'quiztype_id' =>$data['quiztype_id'],
					                        'daycare_id' => $data['daycare_id'],
					                        'duration'=>$data['duration']
    											))) {
                                        // quit if insert fails - adjust accordingly
                                        print_r($question);
                                        die('Failed question insert');
        }   
    	$insert_id = $this->db->insert_id();
    	return $insert_id;
    }
    
    public function edit_quiz($data){
    	if (!$this->db->set('quizzes', array('description'=>$data['description'], 
    										'quiztype_id' =>$data['quiztype_id'],
					                        'daycare_id' => $data['daycare_id'],
					                        'duration'=>$data['duration']
    											))) {
                                        // quit if insert fails - adjust accordingly
                                        print_r($question);
                                        die('Failed question insert');
        }   
    	$insert_id = $this->db->insert_id();
    	return $insert_id;
    }
    
    public function createQuestion($question){
        if (!$this->db->insert('questions', $question)) {
                                        // quit if insert fails - adjust accordingly
                                        print_r($question);
                                        die('Failed question insert');
                                    }  
        $insert_id = $this->db->insert_id();
    	return $insert_id;
    }
    
    
    public function updateQuestion($question){
        
        $data = array(
                                            'id_questions'=>$questions['id_questions'],
                                			'description' => $questions['description'],
                                			'quiz_id' => $questions['quiz_id'],
                                            'questiontype_id' => 1,
                                            'score' => $questions['score']//
                                			);
         $this->db->where('id_questions', $question['id_questions']);
        $this->db->update('questions', $question);  
    }
    
    
    public function updateSolution($solution){
         $this->db->where('id_questions', $solution->id_solution);
        $this->db->update('solutions', $solution);  
    }
    
    public function getQuizzes($daycare_id){
    	$query = $this->db->get_where('quizzes', array('daycare_id' => $daycare_id, 'status' => 1));
    	
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
    
    function get_daycare_quiz_count($daycare_id){
        
        $query = $this->db->get_where('quizzes', array('daycare_id' => $daycare_id, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() < 2) {
            return true;
        }else{
            return false;
        }
    }
    
    
    function get_question_count($quiz_id){
        
        $query = $this->db->get_where('questions', array('quiz_id' => $quiz_id, 'status' => 1));
        // si hay resultados
            return $query->num_rows();
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