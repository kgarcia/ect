<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employee_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }

    public function createEmployee($data){
    	$this->db->insert('employees', array('name'=>$data['name'], 
    										//'address'=>$data['address'],
    										'address' =>$data['address'],
					                        'daycare_id' => $data['daycare_id'],
					                        'type_employee_id' => $data['type_employee_id'],
					                        'user_id'=>$data['user_id'],
					                        'phone'=>$data['phone'],
					                        'birthdate'=>$data['birthdate'],
					                        'gender'=>$data['gender']
    											));
    }

    public function getEmployees(){
    	$query = $this->db->get('employees');
    	echo $query->num_rows();
    	if($query->num_rows()>0) 
    		return $query;
    	else
    		return false;

    }
    
    public function get_daycare_employees($daycare_id){
    	$query = $this->db->get_where('employees', array('daycare_id' => $daycare_id, 'status' => 1));
    	echo $query->num_rows();
    	if($query->num_rows()>0) 
    		return $query;
    	else
    		return false;

    }

    function get_employee($id_employees){
        
        $query = $this->db->get_where('employees', array('id_employees' => $id_employees, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    }
    
    function get_employee_by_user_id($id_employees){
        
        $query = $this->db->get_where('employees', array('user_id' => $id_employees, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    }

    function get_user($id_user){
        
        $query = $this->db->get_where('users', array('id_user' => $id_user, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    }

    public function showEmployee($id){
        $this->db->where('id_employees', $id);
        $query = $this->db->get('employees');
        if($query->num_rows()>0) 
            return $query;
        else
            return false;
    }
    
    public function getWorkshops($id){
        $this->db->where('employee_id', $id);
        $query = $this->db->get('employee_workshops');
        if($query->num_rows()>0) 
            return $query;
        else
            return false;
    }

    function update_employee($id_employees,$name,$phone,$address)
    {
       $data = array(
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            
        );
        $this->db->where('id_employees', $id_employees);
        $this->db->update('employees', $data);    
    }

    function update_employee_picture($id_employees,$profile_picture)
    {
       $data = array(
            'profile_picture' => $profile_picture
            
        );
        $this->db->where('id_employees', $id_employees);
        $this->db->update('employees', $data);    
    }

    function update_password($id_user,$password)
    {
       $data = array(
            'password' => $password
            
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('users', $data);    
    }

}