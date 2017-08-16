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
					                        'gender'=>$data['gender'],
					                        'status'=>1
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

    public function showEmployee($id){
        $this->db->where('id_employees', $id);
        $query = $this->db->get('employees');
        if($query->num_rows()>0) {
            return $query;}
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
    
     
    function get_employee_by_user_id($id){
        $query = $this->db->get_where('employees', array('user_id' => $id, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
            return $query->row();
        }
    } 
    
    public function getWorkshops($id){
        $this->db->where('employee_id', $id);
        $query = $this->db->get('employee_workshops');
        if($query->num_rows()>0) 
            return $query;
        else
            return false;
    }
    
    
    function get_daycare($id_employees){
        $query = $this->db->get_where('employees', array('id_employees' => $id_employees, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
            $querydc = $this->db->get_where('daycares', array('id_daycares' => $query->row()->daycare_id, 'status' => 1));
            return $querydc->row();
        }
    } 

}