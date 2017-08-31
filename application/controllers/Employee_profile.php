<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('back/Employee_model');
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
        //$this->load->helper('server_root');
        //$this->removeCache();
        
        $this->lang->load('employeeheader',$this->session->userdata('lang') ); 
       
        $this->lang->load('employeeprofile',$this->session->userdata('lang') );
        $this->lang->load('employeechangepassw',$this->session->userdata('lang') );
        $this->lang->load('employeefooter',$this->session->userdata('lang') ); 
        $this->lang->load('form_validation',$this->session->userdata('lang') );
    }
    function index()
    {

        if($this->session->userdata('roles') == TRUE && 
            ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {


            $employee_id = $this->session->userdata('id_employee');
            $employee = $this->Employee_model->get_employee($employee_id);
            $user_id = $employee->user_id;
            $user = $this->Employee_model->get_user($user_id);
            $date_of_hired = new DateTime($employee->date_of_hired);
            $hired_date = $date_of_hired->format('M d, Y');


             //Header & Footer Languages Variables
            
            $data['employee_label'] = $this->lang->line('employee_label');
        $data['home_item'] = $this->lang->line('home_item');
        $data['workshops_item'] = $this->lang->line('workshops_item');
        $data['workshops_completed_item'] = $this->lang->line('workshops_completed_item');
        $data['workshops_all_item'] = $this->lang->line('workshops_all_item');
        $data['quiz_item'] = $this->lang->line('quiz_item');
        $data['reports_item'] = $this->lang->line('reports_item');
        $data['reports_certifications_item'] = $this->lang->line('reports_certifications_item');
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
                        'reports_certifications_item' =>       $data['reports_certifications_item'],
                        'profile_item'     =>         $data['profile_item'],
                        'change_password_item' => $data['change_password_item'],
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


            //LAnguage variables
            

            $data['emp_hire'] = $this->lang->line('emp_hire');
            $data['emp_address'] = $this->lang->line('emp_address');
            $data['emp_phone'] = $this->lang->line('emp_phone');
            $data['emp_email'] = $this->lang->line('emp_email');
            $data['emp_edit'] = $this->lang->line('emp_edit');
             $data['emp_save'] = $this->lang->line('emp_save');
             $data['place_name'] = $this->lang->line('place_name');
             $data['place_address'] = $this->lang->line('place_address');
             $data['place_phone'] = $this->lang->line('place_number');
             $data['place_email'] = $this->lang->line('place_email');


            $data['employee'] = $employee;
            $data['user'] = $user;
            $data['hired_date'] = $hired_date;

            if ($this->session->userdata('roles') == 'administrator'){
                        $this->load->view('back/daycare/header_view_k', $data);
            }
            else{
            $this->load->view('back/employee/header_view', $data);
            }
            $this->load->view('back/employee/profile', $data);
            $this->load->view('back/footer_view', $data);
        }
        else 
        {
            redirect(base_url().'login');
        } 

    }

    function save()
    {   
        if($this->session->userdata('roles') == TRUE && ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {

            if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
            {
            $this->config->set_item('language',$this->session->userdata('lang') ); 
            $this->form_validation->set_rules('name',$this->lang->line('place_name'),'required|trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('address',$this->lang->line('place_address'),'required|trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('phone',$this->lang->line('place_number'),'required|trim|xss_clean|max_length[100]');

             $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


                if($this->form_validation->run()==FALSE)
                {
                   $this->index();
                   

                }else{
                    
                    //EN CASO CONTRARIO PROCESAMOS LOS DATOS
                    $name = $this->input->post('name');               
                    $phone = $this->input->post('phone'); 
                    $address = $this->input->post('address'); 
                    $employee_id = $this->session->userdata('id_employee');

                    $this->Employee_model->update_employee($employee_id, $name, $phone, $address);

                    $config['upload_path']   = './profile_pics/'; 
                    $config['allowed_types'] = 'gif|jpg|png';  
                    $this->load->library('upload', $config);
                        
                    if ( $this->upload->do_upload('profile_picture')) {
                        $data = $this->upload->data();
                        $path = "profile_pics/".$data["file_name"];
                        $this->Employee_model->update_employee_picture($employee_id, $path);

                    }

                    redirect(base_url().'profile');
                }
            }


        }
    }

    function change_password()
    {

        if($this->session->userdata('roles') == TRUE && 
            ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {


            $employee_id = $this->session->userdata('id_employee');
            $employee = $this->Employee_model->get_employee($employee_id);
            $user_id = $employee->user_id;
            $user = $this->Employee_model->get_user($user_id);

             //Header & Footer Languages Variables
            
            $data['employee_label'] = $this->lang->line('employee_label');
            $data['home_item'] = $this->lang->line('home_item');
            $data['workshops_item'] = $this->lang->line('workshops_item');
            $data['workshops_completed_item'] = $this->lang->line('workshops_completed_item');
            $data['workshops_all_item'] = $this->lang->line('workshops_all_item');
            $data['quiz_item'] = $this->lang->line('quiz_item');
            $data['reports_item'] = $this->lang->line('reports_item');
            $data['reports_certifications_item'] = $this->lang->line('reports_certifications_item');
            $data['profile_item'] = $this->lang->line('profile_item');
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
                            'reports_certifications_item' =>       $data['reports_certifications_item'],
                            'profile_item'     =>         $data['profile_item'],
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


            //LAnguage variables
            $data['title_change_pwd'] = $this->lang->line('title_change_pwd');
            $data['place_actual_pwd'] = $this->lang->line('place_actual_pwd');
            $data['place_new_pwd'] = $this->lang->line('place_new_pwd');
            $data['place_confirm_new_pwd'] = $this->lang->line('place_confirm_new_pwd');
            $data['emp_save'] = $this->lang->line('emp_save');


            if ($this->session->userdata('roles') == 'administrator'){

                $this->load->view('back/daycare/header_view_k', $data);

            }
            else{

                $this->load->view('back/employee/header_view', $data);

            }
            $this->load->view('back/employee/change_password', $data);
            $this->load->view('back/footer_view', $data);
        }
        else 
        {
            redirect(base_url().'login');
        } 

    }

    public function check_actual_pwd($actual_pwd)
    {
         if($this->session->userdata('roles') == TRUE && ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {
            $employee_id = $this->session->userdata('id_employee');
            $employee = $this->Employee_model->get_employee($employee_id);
            $user_id = $employee->user_id;
            $user = $this->Employee_model->get_user($user_id);

            if ($user->password == md5($actual_pwd)){
                return true;
            } else {
                $this->form_validation->set_message('check_actual_pwd', 
                        $this->lang->line('not_actual_pwd'));
                    return false;
            }
        }

    }

    public function check_pwd_match($confirm_new_pwd)
    {
         if($this->session->userdata('roles') == TRUE && ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {
            $new_pwd = $this->input->post('new_pwd'); 

            if ($new_pwd == $confirm_new_pwd){
                return true;
            } else {
                $this->form_validation->set_message('check_pwd_match', 
                        $this->lang->line('pwd_dont_match'));
                    return false;
            }
        }

    }


    function save_password()
    {   
        if($this->session->userdata('roles') == TRUE && ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {

            if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
            {
            $this->config->set_item('language',$this->session->userdata('lang') ); 
            $this->form_validation->set_rules('actual_pwd',$this->lang->line('place_actual_pwd'),'required|trim|xss_clean|min_length[6]|max_length[20]|callback_check_actual_pwd');
            $this->form_validation->set_rules('new_pwd',$this->lang->line('place_new_pwd'),'required|trim|xss_clean|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('confirm_new_pwd',$this->lang->line('place_confirm_new_pwd'),'required|trim|xss_clean|min_length[6]|max_length[20]|callback_check_pwd_match');

             $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


                if($this->form_validation->run()==FALSE)
                {
                   $this->change_password();

                }else{
                    
                    //EN CASO CONTRARIO PROCESAMOS LOS DATOS
                    $new_pwd = $this->input->post('new_pwd'); 

                    $employee_id = $this->session->userdata('id_employee');
                    $employee = $this->Employee_model->get_employee($employee_id);
                    $user_id = $employee->user_id;              

                    $this->Employee_model->update_password($user_id, md5($new_pwd));

                    echo "<script>javascript:alert('".$this->lang->line('pwd_updated')."');
                    window.location='".base_url()."user-section/home'
                    </script>";

                }
            }


        }
    }



}