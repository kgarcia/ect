<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Daycare_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }


    
    function get_daycare($id_daycare){
        
        $query = $this->db->get_where('daycares', array('id_daycares' =>$id_daycare, 'status' => '1'));
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
									  

    function update_daycare($id_daycare,$name,$phone,$address, $children)
    {
       $data = array(
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'children_quantity' => $children
        );
        $this->db->where('id_daycares', $id_daycare);
        $this->db->update('daycares', $data);     
    }

    function update_daycare_picture($id_daycare,$profile_picture)
    {
       $data = array(
            'profile_picture' => $profile_picture
            
        );
        $this->db->where('id_daycares', $id_daycare);
        $this->db->update('daycares', $data);    
    }
	  
    												
												  
    

																	
	 
					 
												 
			
		  
														
												  
	 

}