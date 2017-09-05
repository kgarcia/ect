<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Workshop_model extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}


	function get_employee($id_employees){
        
        $query = $this->db->get_where('employees', array('id_employees' => $id_employees, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    } 

    function get_employee_rules($years_diff, $type_employee_id){

		$query = $this->db->get_where('rules', array('min_years <=' => $years_diff, 'max_years >=' => $years_diff, 'type_employee_id' => $type_employee_id, 'status' => '1'));

        // si hay resultados
		if ($query->num_rows() > 0) {

			return $query->result();
		}
	}

	function get_actual_scholar_year(){

        $today = date( 'Y-m-d H:i:s' );  

        $query = $this->db->get_where('scholar_years', array('start <=' => $today, 'finish >=' => $today, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    
    }

    function get_employee_scholar_year_enrollments($employee_id, $scholar_year_id){

		$query = $this->db->get_where('enrollment', array('employee_id' => $employee_id, 'scholar_year_id' => $scholar_year_id, 'status' => '1'));

        // si hay resultados
		if ($query->num_rows() > 0) {

			return $query->result();
		}
	}

	function get_category_workshops($category_id){

		$query = $this->db->get_where('workshops', array('category_id' => $category_id, 'status' => '1'));

        // si hay resultados
		if ($query->num_rows() > 0) {

			return $query->result();
		}
	}

	function get_workshop_enrollments($workshop_id){

		$query = $this->db->get_where('workshops', array('category_id' => $category_id, 'status' => '1'));

        // si hay resultados
		if ($query->num_rows() > 0) {

			return $query->result();
		}
	}

	function get_employee_certifications($employee_id){

		$query = $this->db->get_where('certifications', array('id_employee' => $employee_id, 'status' => '1'));

        // si hay resultados
		if ($query->num_rows() > 0) {

			return $query->result();
		}
	}

	function get_workshop($id_workshops){
        
        $query = $this->db->get_where('workshops', array('id_workshops' => $id_workshops, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    }

    function get_vendor($id_vendor){
        
        $query = $this->db->get_where('vendors', array('id_vendor' => $id_vendor, 'status' => 1));
        // si hay resultados
        if ($query->num_rows() == 1) {
           
            return $query->row();
        }
    }

    function get_employee_schyear_workshop_enrolls($employee_id, $workshop_id, $scholar_year_id){

		$query = $this->db->get_where('enrollment', array('employee_id' => $employee_id, 'workshop_id' => $workshop_id, 'scholar_year_id' => $scholar_year_id, 'status' => '1'));

        // si hay resultados
		if ($query->num_rows() > 0) {

			return $query->result();
		}
	}

	function get_employee_workshop_enrolls($employee_id, $workshop_id){

		$query = $this->db->get_where('enrollment', array('employee_id' => $employee_id, 'workshop_id' => $workshop_id, 'status' => '1'));

        // si hay resultados
		if ($query->num_rows() > 0) {

			return $query->result();
		}
	}

	function create_enrollment($workshop_id,$employee_id)
    {
       $data = array(
            'workshop_id' => $workshop_id,
       		'employee_id' => $employee_id
        );
       $this->db->insert('enrollment', $data);
       return $this->db->insert_id();    
    }

    function create_enrollment_scholar_year($workshop_id,$employee_id,$scholar_year_id)
    {
       $data = array(
            'workshop_id' => $workshop_id,
       		'employee_id' => $employee_id,
       		'scholar_year_id' => $scholar_year_id
        );
       $this->db->insert('enrollment', $data);
       return $this->db->insert_id();    
    }

    function create_certification($id_workshop,$id_employee,$path)
    {
       $data = array(
            'id_workshop' => $id_workshop,
       		'id_employee' => $id_employee,
       		'path' => $path
        );
       $this->db->insert('certifications', $data);
       return $this->db->insert_id();    
    }

    function get_all_categories(){

    $query = $this->db->get_where('categories', array( 'status' => '1'));

        // si hay resultados
    if ($query->num_rows() > 0) {

      return $query->result();
    }
  }
  
  function get_rules_by_type_employee($type_employee_id){

		$query = $this->db->select_sum('hours')->get_where('rules', array('type_employee_id' => $type_employee_id,  'status' => '1'));

 $this->db->select_sum('hours');
    $this->db->from('rules');
    $this->db->where('(type_employee_id = '.$type_employee_id.') ');
    $query = $this->db->get();
        // si hay resultados
		if ($query->num_rows() > 0) {

			return $query->result()->hours;
		}
	}	

}