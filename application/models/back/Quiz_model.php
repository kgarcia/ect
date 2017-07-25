<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quiz_model extends CI_Model
{
	public function construct()
	{
		parent::__construct();
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

}