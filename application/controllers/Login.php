<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model(array('front/Login_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
        //$this->load->helper('server_root');
        //$this->removeCache();
    }
    function index()
    {

        $data['title'] = 'Log In';    
        $data['active'] = 'login';
        //$data['rol'] = $this->session->userdata('jerarquia');
        switch ($this->session->userdata('roles')) {
            case '':
                $data['token'] = $this->token();
                $data['title'] = 'Child Care';
                //$data['sport'] = $this->Login_model->get_all_sports();
                        $this->load->view('front/header_view', $data);
                        //$this->load->view('front/nav_view', $data);
                        $this->load->view('front/login_view', $data);
                        $this->load->view('front/footer_view', $data); 
                break;
            case 'webadmin':
                redirect(base_url().'user-section/home');
                break;   
            case 'agency':
                redirect(base_url().'user-section/home');
                break;
            case 'administrator':
                redirect(base_url().'user-section/home');
                break;
            case 'vendor':
                redirect(base_url().'user-section/home');
                break;
            case 'employee':
                redirect(base_url().'user-section/home');
                break;
            default:        
                
                //$data['token'] = $this->token();
                //$data['sport'] = $this->Login_model->get_all_sports();
                $data['title'] = 'Child Care';
                $this->load->view('front/header_view', $data);
                //$this->load->view('front/nav_view', $data);
                $this->load->view('front/login_view', $data);
                $this->load->view('front/footer_view', $data);  
                break;        
        }
     
        

    }

  public function singin()
    {
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
        {
            $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[150]|xss_clean|md5');
            //
          
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            //$this->form_validation->set_message('valid_email', 'El %s no es válido');
            //lanzamos mensajes de error si es que los hay
           /* $this->form_validation->set_message('min_length', 'El campo debe tener al menos 5 caracteres');
            $this->form_validation->set_message('max_length', 'El campo no puede tener más de 150 caracteres');
            $this->form_validation->set_message('required', 'El campo %s es requerido');*/
            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }else{
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $check_user = $this->Login_model->login_user($email,$password);
                //$usuario_foto=$this->login_model->get_nombre_foto($username);
                $id_rol = $check_user->role_id;
                $id_user = $check_user->id_user;
                
                if ($id_rol == 1) {

                    $row_adm =  $this->Login_model->get_adm($id_user);
                    //$id_school = $row_adm->id_school;
                    //$row_school = $this->Login_model->get_univ($id_school);
                    $row_rol =  $this->Login_model->get_user_rol($id_rol);
                    if($check_user == TRUE)
                    {
                        $data = array(
                        'is_logued_in'     =>         TRUE,
                        'id_user'     =>         $check_user->id_user,
                        'roles'        =>        $row_rol->description,
                        'id_rol'        =>        $row_rol->id_role,
                        'email'         =>         $check_user->email,
                        'id_school' =>       $id_school,
                        'school'  =>         $row_school->name
                        );        
                        $this->session->set_userdata($data);
                        $this->index();
                    }
                }elseif ($id_rol == 2) {

                    $row_age =  $this->Login_model->get_age($id_user);
                    $name = $row_age->name;
                    $row_rol =  $this->Login_model->get_user_rol($id_rol);
                    if($check_user == TRUE)
                    {
                        $data = array(
                        'is_logued_in'     =>         TRUE,
                        'id_user'     =>         $check_user->id_user,
                        'roles'        =>        $row_rol->description,
                        'id_rol'        =>        $row_rol->id_role,
                        'id_agency'     =>        $row_age->id_agencies,
                        'email'         =>         $check_user->email,
                        'name'         =>                  $name
                        );        
                        $this->session->set_userdata($data);
                        $this->index();
                    }
                }elseif ($id_rol == 3) {

                    $row_adm =  $this->Login_model->get_adm($id_user);
                    $name = $row_adm->name;
                    $row_rol =  $this->Login_model->get_user_rol($id_rol);
                    if($check_user == TRUE)
                    {
                        $data = array(
                        'is_logued_in'     =>         TRUE,
                        'id_user'     =>         $check_user->id_user,
                        'roles'        =>        $row_rol->description,
                        'id_rol'        =>        $row_rol->id_role,
                        'email'         =>         $check_user->email,
                        'id_administrator' =>  $row_adm->id_administrators,
                        'name' =>       $name
                        );        
                        $this->session->set_userdata($data);
                        $this->index();
                    }
                    
                }elseif ($id_rol == 4) {
                    $row_ven =  $this->Login_model->get_ven($id_user);
                    $name = $row_ven->name;
                    $row_rol =  $this->Login_model->get_user_rol($id_rol);
                    if($check_user == TRUE)
                    {
                        $data = array(
                        'is_logued_in'     =>         TRUE,
                        'id_user'     =>         $check_user->id_user,
                        'roles'        =>        $row_rol->description,
                        'id_rol'        =>        $row_rol->id_role,
                        'email'         =>         $check_user->email,
                        'id_vendor' =>  $row_ven->id_vendor,
                        'name' =>       $name
                        );        
                        $this->session->set_userdata($data);
                        $this->index();
                    }
                }elseif ($id_rol == 5) {
                    $row_emp =  $this->Login_model->get_emp($id_user);
                    $name = $row_emp->name;
                    $row_rol =  $this->Login_model->get_user_rol($id_rol);
                    if($check_user == TRUE)
                    {
                        $data = array(
                        'is_logued_in'     =>         TRUE,
                        'id_user'     =>         $check_user->id_user,
                        'roles'        =>        $row_rol->description,
                        'id_rol'        =>        $row_rol->id_role,
                        'email'         =>         $check_user->email,
                        'id_employee' =>  $row_emp->id_employees,
                        'id_daycare' =>  $row_emp->daycare_id,
                        'name' =>       $name
                        );        
                        $this->session->set_userdata($data);
                        $this->index();
                    }
                }
               
               
            }

                
            
        }else{
          
            redirect(base_url().'login');
        }
    }
    
    public function token()
    {
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }
    
    public function logout_ci()
    {
        $this->session->sess_destroy();
        redirect(base_url().'login');
        //$this->index();
    }




}