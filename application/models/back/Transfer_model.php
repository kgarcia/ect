<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transfer_model extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}


	function get_other_daycares($id_daycare){

		$query = $this->db->get_where('daycares', array('id_daycares <>' => $id_daycare, 'status' => '1'));
        // si hay resultados
		if ($query->num_rows() > 0) {

			return $query->result();
		}
	}

	function new_transfer_request($id_employee,$id_old_daycare,$id_new_daycare)
    {
       $data = array(
            'employee_id' => $id_employee,
       		'daycare_id' => $id_old_daycare,
            'new_daycare_id' => $id_new_daycare            
        );
        return $this->db->insert('transfer_requests', $data);    
    }

}