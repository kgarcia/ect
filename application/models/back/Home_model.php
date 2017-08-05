<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }


function get_students($id_school){
        
        $query = $this->db->get_where('students', array('id_school' => $id_school, 'status' => '1'));
        // si hay resultados
        if ($query->num_rows() > 0) {
           
            return $query->result();
        }
    }


function get_student($id_student){
        
        $query = $this->db->get_where('students', array('id_student' => $id_student));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    }

function get_courses_grades($id_school,$id_grade){
        
        $query = $this->db->get_where('courses', array('id_school' => $id_school,'id_grade' => $id_grade, 'status' => '1'));
        // si hay resultados
        if ($query->num_rows() > 0) {
           
            return $query->result();
        }
}
 

}