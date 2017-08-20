<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_workshop_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }


function get_workshops(){
        
        $query = $this->db->get_where('workshops', array('status' => '1'));
        // si hay resultados
        if ($query->num_rows() > 0) {
           
            return $query->result();
        }
    }

    function get_categories(){
        
        $query = $this->db->get_where('categories', array( 'status' => '1'));
        // si hay resultados
        if ($query->num_rows() > 0) {
           
            return $query->result();
        }
    }


function get_id_categories(){
        
        $query = $this->db->get_where('categories', array('status' => '1'));
        // si hay resultados
        if ($query->num_rows() > 0) {
           
            return $query->result();
        }
}
function get_category($id_category){
        
        $query = $this->db->get_where('categories', array('id_categories' =>$id_category, 'status' => '1'));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    }
function get_workshop($id_workshop){
        
        $query = $this->db->get_where('workshops', array('id_workshops' =>$id_workshop, 'status' => '1'));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
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

function new_workshop($category,$name,$hours,$topic)
    {
       $data = array(
            'category_id' => $category,
            'name' => $name,
            'hours' => $hours,
            'topic' => $topic

        );
        
        $this->db->insert('workshops', $data);
        return $this->db->insert_id();   
    }
function new_administrator($id_daycare,$id_user,$type_emp,$dirname)
    {
       $data = array(
            'daycare_id' => $id_daycare,
            'user_id' => $id_user,
            'type_employee_id' => $type_emp,
            'name' => $dirname

        );
        
        $this->db->insert('employees', $data);
        return $this->db->insert_id();   
    }

function update_workshop($id_workshop,$category,$name,$hours,$topic){

         $data = array(
            'category_id' => $category,
            'name' => $name,
            'hours' => $hours,
            'topic' => $topic
            
        );

            $this->db->where('id_workshops', $id_workshop);
            return  $this->db->update('workshops', $data);


 }
 

}