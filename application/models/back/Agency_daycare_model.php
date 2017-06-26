<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Agency_daycare_model extends CI_Model
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

function new_user($email,$pw,$id_rol)
    {
       $data = array(
            'email' => $email,
            'password' => $pw,
            'role_id' => $id_rol
            
        );
        $this->db->insert('users', $data);  
        return $this->db->insert_id();  
    }

function new_daycare($id_agency,$name,$phone,$address,$children,$owner)
    {
       $data = array(
            'agency_id' => $id_agency,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'children_quantity' => $children,
            'owner' => $owner

        );
        
        $this->db->insert('daycares', $data);
        return $this->db->insert_id();   
    }
function new_administrator($id_daycare,$id_user)
    {
       $data = array(
            'daycare_id' => $id_daycare,
            'user_id' => $id_user

        );
        
        $this->db->insert('administrators', $data);
        return $this->db->insert_id();   
    }
 

}