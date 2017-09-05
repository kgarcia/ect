<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
        $this->load->model('back/Home_model');
        //$this->load->model(array('Login_model','backend/Beneficiary_model','backend/Event_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
        $this->load->model('back/employee_model');

        $this->lang->load('employeeheader',$this->session->userdata('lang') ); 
        $this->lang->load('employeefooter',$this->session->userdata('lang') );        
    }

    public function index()

    {    
     if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
        {

        $data['active'] = 'home'; 
        $data['title'] = 'Webadmin';
        //$this->load->view('header_view', $data);
        $this->load->view('back/webadmin/header_view', $data);
        $this->load->view('back/webadmin/home_view', $data); 
        $this->load->view('back/footer_view', $data); 
        
     }elseif($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
        {

        $data['active'] = 'home'; 
        $data['title'] = 'Agency';
        $this->load->view('back/agency/header_view', $data);
        $this->load->view('back/agency/home_view', $data);
        $this->load->view('back/footer_view', $data); 
        

     }elseif($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'administrator')
        {
	$data['title'] = 'Employee List';    
        $data['active'] = 'Employee_List';
        $data['employees'] = $this->employee_model->getEmployees();
        
        $this->load->view('back/daycare/header_view_k', $data);
        $this->load->view('back/daycare/employee_list', $data);
        $this->load->view('back/footer_view', $data); 
     }elseif($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'vendor')
        {

        $data['active'] = 'home'; 
        $data['title'] = 'Child Care';
        //$this->load->view('header_view', $data);
        $this->load->view('back/agency/home_view', $data);
        //$this->load->view('footer_view', $data);  
     }elseif($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'employee')
        {

        $data['employee_label'] = $this->lang->line('employee_label');
        $data['home_item'] = $this->lang->line('home_item');
        $data['workshops_item'] = $this->lang->line('workshops_item');
        $data['workshops_completed_item'] = $this->lang->line('workshops_completed_item');
        $data['workshops_all_item'] = $this->lang->line('workshops_all_item');
        $data['quiz_item'] = $this->lang->line('quiz_item');
        $data['reports_item'] = $this->lang->line('reports_item');
        $data['reports_work_per_year_item'] = $this->lang->line('reports_work_per_year_item');
        $data['profile_item'] = $this->lang->line('profile_item');
        $data['change_password_item'] = $this->lang->line('change_password_item');
        $data['up_cert_item'] = $this->lang->line('up_cert_item');
         $data['signoff_item'] = $this->lang->line('signoff_item');
         $data['stay_footer'] = $this->lang->line('stay_footer');
         $data['enteremail_footer'] = $this->lang->line('enteremail_footer');
         $data['subscribe_footer'] = $this->lang->line('subscribe_footer');
         $data['copyright_footer'] = $this->lang->line('copyright_footer');
         $data['aboutus_footer'] = $this->lang->line('aboutus_footer');
         $data['product_footer'] = $this->lang->line('product_footer');
         $data['others_footer'] = $this->lang->line('others_footer');
         $data = array(
                        'employee_label'     =>         $data['employee_label'],
                        'home_item'     =>         $data['home_item'],
                        'workshops_item'        =>        $data['workshops_item'],
                        'workshops_completed_item'        =>        $data['workshops_completed_item'],
                        'workshops_all_item'         =>         $data['workshops_all_item'],
                        'quiz_item' =>  $data['quiz_item'],
                        'reports_item' =>  $data['reports_item'],
                        'reports_work_per_year_item' =>       $data['reports_work_per_year_item'],
                        'profile_item'     =>         $data['profile_item'],
                        'change_password_item'     =>         $data['change_password_item'],
                        'up_cert_item'     =>         $data['up_cert_item'],
                        'signoff_item'        =>         $data['signoff_item'],
                        'stay_footer'        =>        $data['stay_footer'],
                        'enteremail_footer'         =>         $data['enteremail_footer'],
                        'subscribe_footer' =>  $data['subscribe_footer'] ,
                        'copyright_footer' =>  $data['copyright_footer'],
                        'aboutus_footer' =>       $data['aboutus_footer'] ,
                        'product_footer' =>  $data['product_footer'] ,
                        'copyright_footer' =>  $data['copyright_footer'],
                        'others_footer' =>       $data['others_footer'] 
                        );        
                        $this->session->set_userdata($data);




        /*$lang['reports_certifications_item']
        $lang['profile_item']
        $lang['up_cert_item']
        $lang['signoff_item']
        $lang['home_item']
        $lang['workshops_item']
        $lang['workshops_completed_item']
        $lang['workshops_all_item']
        $lang['quiz_item']
        $lang['reports_item']*/

        $data['active'] = 'home'; 
        $data['title'] = 'Child Care';
        $this->load->view('back/employee/header_view', $data);
        $this->load->view('back/employee/home_view', $data);
        $this->load->view('back/footer_view', $data);  
     }else {
            redirect(base_url().'login');
     }
    


    }

}