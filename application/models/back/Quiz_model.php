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

}