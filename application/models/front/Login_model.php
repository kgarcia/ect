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
    public function get_grade($id_grade){
       
        $this->db->where('id_grades',$id_grade);
        $query = $this->db->get('grades');
    
        
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
     public function get_sport($id_sport){
       
        $this->db->where('id_sport',$id_sport);
        $query = $this->db->get('sports');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }
     public function get_benefit($id_benefit){
       
        $this->db->where('id_benefit',$id_benefit);
        $query = $this->db->get('benefits');
    
        
        if ($query->num_rows() == 1) {
            
            return $query->row();
    }
    }

    function get_all_sports(){
        
        $query = $this->db->get_where('sports', array('status' => '1'));
        //$query = $this->db->query('SELECT * FROM sports');

    if ($query->num_rows() > 0) {
        
        return $query->result();
        }
    }

    function new_university($university,$address)
    {
       $data = array(
            'name' => $university,
            'address' => $address
            
        );
        $this->db->insert('universities', $data);  
        return $this->db->insert_id();  
    }

    function new_director($name,$id_university,$id_user)
    {
       $data = array(
            'first_name' => $name,
            'id_university' => $id_university,
            'id_user' => $id_user
            
        );
        $this->db->insert('directors', $data);  
        return $this->db->insert_id();  
    }

    function new_admin($id_university,$id_user)
    {
       $data = array(
            'id_university' => $id_university,
            'id_user' => $id_user
            
        );
        $this->db->insert('administrators', $data);  
        return $this->db->insert_id();  
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

    function new_sport_subscription($id_subscription,$id_sport)
    {
       $data = array(

            'id_subscription' => $id_subscription,
            'id_sport' => $id_sport
            
            
        );
        return $this->db->insert('subscription_sports', $data);   
    }
    function new_sport_university($id_university,$id_sport)
    {
       $data = array(

            'id_university' => $id_university,
            'id_sport' => $id_sport
            
            
        );
        return $this->db->insert('university_sports', $data);   
    }
    function new_benefit($id_university,$description,$tickets_home,$tickets_away)
    {
       $data = array(

            'id_university' => $id_university,
            'description' => $description,
            'tickets_number_home' => $tickets_home,
            'tickets_number_away' => $tickets_away            
            
        );
        return $this->db->insert('benefits', $data);   
    }
    function new_benefit_coach($id_university,$description,$tickets_home,$tickets_away,$is_coach)
    {
       $data = array(

            'id_university' => $id_university,
            'description' => $description,
            'tickets_number_home' => $tickets_home,
            'tickets_number_away' => $tickets_away,
            'is_coach' => $is_coach            
            
        );
        return $this->db->insert('benefits', $data);   
    }
    
}