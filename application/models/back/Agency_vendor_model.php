<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agency_vendor_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }


function get_vendors($id_agency){
        
        $query = $this->db->get_where('vendors', array('agency_id' => $id_agency, 'status' => '1'));
        // si hay resultados
        if ($query->num_rows() > 0) {
           
            return $query->result();
        }
    }
function get_id_vendors($id_agency){
        
        $query = $this->db->get_where('agency_vendor', array('agency_id' => $id_agency, 'status' => '1'));
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
function get_vendor($id_vendor){
        
        $query = $this->db->get_where('vendors', array('id_vendor' => $id_vendor, 'status' => '1'));
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

function new_vendor($name,$phone,$address,$birthdate,$gender,$id_user)
    {
       $data = array(
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'birthdate' => $birthdate,
            'gender' => $gender,
            'user_id' => $id_user

        );
        
        $this->db->insert('vendors', $data);
        return $this->db->insert_id();   
    }
function new_agency_vendor($id_agency,$id_vendor)
    {
       $data = array(
            'agency_id' => $id_agency,
            'vendor_id' => $id_vendor

        );
        
        
        return $this->db->insert('agency_vendor', $data);  
    }

function update_vendor($id_vendor,$name,$phone,$address,$birthdate,$gender){

         $data = array(
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'birthdate' => $birthdate,
            'gender' => $gender
            
        );

            $this->db->where('id_vendor', $id_vendor);
            return  $this->db->update('vendors', $data);


 }
 

}