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
					                        'type_employee_id' => 1,
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

}