<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
*/
class Login_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function login_user($email,$password)
    {
        //$this->db->cache_off();
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $this->db->where('status','1');
        $query = $this->db->get('users');
        if($query->num_rows() == 1)
        {
        	//$this->session->set_flashdata('usuario_incorrecto',$password);
            return $query->row();
        }else{
            $this->session->set_flashdata('incorrect_user','<div class="alert alert-danger">Incorrect data, please try again<div>');
            //$this->session->set_flashdata('usuario_incorrecto',$password);
            redirect(base_url().'login','refresh');
        }
    }
    
    public function get_user_rol($id_rol){
       
    	$this->db->where('id_role',$id_rol);
    	$query = $this->db->get('roles');
    
    	
    	if ($query->num_rows() == 1) {
    		
    		return $query->row();
    }
    }
     public function get_age($id_user){
       
        $this->db->where('user_id',$id_user);
        $query = $this->db->get('agencies');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }

       public function get_emp($id_user){
       
        $this->db->where('user_id',$id_user);
        $query = $this->db->get('employees');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }
    public function get_ven($id_user){
       
        $this->db->where('user_id',$id_user);
        $query = $this->db->get('vendors');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }

    public function get_section($id_section){
       
        $this->db->where('id_section',$id_section);
        $query = $this->db->get('sections');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }
     public function get_school($id_school){
       
        $this->db->where('id_school',$id_school);
        $query = $this->db->get('schools');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }
     public function get_adm($id_user){
       
        $this->db->where('user_id',$id_user);
        $query = $this->db->get('employees');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }
     public function get_web($id_user){
       
        $this->db->where('user_id',$id_user);
        $query = $this->db->get('administrators');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }
    

    
}