<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
*/
class Signup_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
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

       public function get_emp($id_user){
       
        $this->db->where('user_id',$id_user);
        $query = $this->db->get('employees');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }
     public function get_adm($id_user){
       
        $this->db->where('user_id',$id_user);
        $query = $this->db->get('administrators');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }
     public function get_sport($id_sport){
       
        $this->db->where('id_sport',$id_sport);
        $query = $this->db->get('sports');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }


    function new_subscription($id_university,$ends,$sports_quantity,$sub_price)
    {
       $data = array(
            'id_university' => $id_university,
            'end_date' => $ends,
            'sports_quantity' => $sports_quantity,
            'price' => $sub_price
            
        );
        $this->db->insert('subscriptions', $data);  
        return $this->db->insert_id();  
    }

    function new_agency($name,$phone,$address,$director,$id_user)
    {
       $data = array(
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'director' => $director,
            'user_id' => $id_user

        );
        
        $this->db->insert('agencies', $data);
        return $this->db->insert_id();   
    }

    function new_daycare($name,$phone,$address,$children,$owner)
    {
       $data = array(
            
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'children_quantity' => $children,
            'owner' => $owner

        );
        
        $this->db->insert('daycares', $data);
        return $this->db->insert_id();   
    }
function new_administrator($id_daycare,$id_user,$type_emp,$director)
    {
       $data = array(
            'daycare_id' => $id_daycare,
            'user_id' => $id_user,
            'type_employee_id' => $type_emp,
            'name' => $director

        );
        
        $this->db->insert('employees', $data);
        return $this->db->insert_id();   
    }

   function new_employee($id_user,$type_emp,$name,$phone,$address,$birthdate,$gender)
   {

   		$data = array(

            'user_id' => $id_user,
            'type_employee_id' => $type_emp,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'birthdate' => $birthdate,
            'gender' => $gender

        );
        
        $this->db->insert('employees', $data);
        return $this->db->insert_id(); 



   }

    
}