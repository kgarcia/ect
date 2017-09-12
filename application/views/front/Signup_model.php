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
            'role_id' => $id_rol,
            'status' => 0
            
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

  public function get_temp_day($id){
       
        $this->db->where('id_sub',$id);
        $query = $this->db->get('subscription_temp_day');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }

    public function get_temp_emp($id){
       
        $this->db->where('id_sub',$id);
        $query = $this->db->get('subscription_temp_emp');
    
        
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



    function new_subscription($id_administrator,$id_daycare,$description,$enddate,$price)
    {
       $data = array(


            'employee_id' => $id_administrator,
            'daycare_id' => $id_daycare,
            'description' => $description,
            'date_end' => $enddate,
            'price' => $price
            
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

       function new_temp_day($email,$pw,$id_rol,$name,$phone,$address,$children,$owner,$type_emp,$director,$description,$date_end,$amount)
    {
       $data = array(
            'email' => $email,
            'password' => $pw,
            'id_rol' => $id_rol,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'children' => $children,
            'owner' => $owner,
            'type_emp' => $type_emp,
            'dirname' => $director,
            'description' => $description,
            'date_end' => $date_end,
            'price' => $amount

        );
        
        $this->db->insert('subscription_temp_day', $data);
        return $this->db->insert_id();   
    }

           function new_temp_emp($email,$pw,$id_rol,$name,$phone,$address,$bdate,$gender,$type_emp,$description,$date_end,$amount)
    {
       $data = array(
            'email' => $email,
            'password' => $pw,
            'id_rol' => $id_rol,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'birthdate' => $bdate,
            'gender' => $gender,
            'type_emp' => $type_emp,
            'description' => $description,
            'date_end' => $date_end,
            'price' => $amount

        );
        
        $this->db->insert('subscription_temp_emp', $data);
        return $this->db->insert_id();   
    }

    function update_sub_emp($id){

         $data = array(
            'status' => 0
            
        );

            $this->db->where('id_sub', $id);
            return  $this->db->update('subscription_temp_emp', $data);


 }
    function update_sub_day($id){

         $data = array(
            'status' => 0
            
        );

            $this->db->where('id_sub', $id);
            return  $this->db->update('subscription_temp_day', $data);


 }


    
}