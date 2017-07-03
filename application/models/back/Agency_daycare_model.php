<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Agency_daycare_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }


function get_daycares($id_agency){
        
        $query = $this->db->get_where('daycares', array('agency_id' => $id_agency, 'status' => '1'));
        // si hay resultados
        if ($query->num_rows() > 0) {
           
            return $query->result();
        }
    }


function get_courses_grades($id_school,$id_grade){
        
        $query = $this->db->get_where('courses', array('id_school' => $id_school,'id_grade' => $id_grade, 'status' => '1'));
        // si hay resultados
        if ($query->num_rows() > 0) {
           
            return $query->result();
        }
}
function get_daycare($id_daycare){
        
        $query = $this->db->get_where('daycares', array('id_daycares' =>$id_daycare, 'status' => '1'));
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

function update_daycare($id_daycare,$name,$phone,$address,$children,$owner){

         $data = array(
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'children_quantity' => $children,
            'owner' => $owner
            
        );

            $this->db->where('id_daycares', $id_daycare);
            return  $this->db->update('daycares', $data);


 }
 

}