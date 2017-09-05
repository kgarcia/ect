<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('back/Employee_model');
        $this->load->model('back/Daycare_model');
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
        //$this->load->helper('server_root');
        //$this->removeCache();
    }
    function profile()
    {

        if($this->session->userdata('roles') == TRUE && 
            ($this->session->userdata('roles') == 'administrator'))
        {


            $employee_id = $this->session->userdata('id_employee');
            $employee = $this->Employee_model->get_employee($employee_id);
            $user_id = $employee->user_id;
            $user = $this->Employee_model->get_user($user_id);
            
            $data['employee'] = $employee;
            $data['user'] = $user;
           
            $this->load->view('back/daycare/header_view_k', $data);
            $this->load->view('back/daycare/profile', $data);
            $this->load->view('back/footer_view', $data);
        }
        else 
        {
            redirect(base_url().'login');
        } 

    }

    function save_daycare()
    {   
        if($this->session->userdata('roles') == TRUE && ( $this->session->userdata('roles') == 'administrator'))
        {

            if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
            {

            $this->form_validation->set_rules('name','Name','required|trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('address','Address','required|trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('phone','Phone','required|trim|xss_clean|max_length[100]');

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

                    $config['upload_path']   = './daycare_pics/'; 
                    $config['allowed_types'] = 'gif|jpg|png';  
                    $this->load->library('upload', $config);
                        
                    if ( $this->upload->do_upload('profile_picture')) {
                        $data = $this->upload->data();
                        $path = "daycare_pics/".$data["file_name"];
                        $this->Daycare_model->update_daycare_picture($employee_id, $path);

                    }

                    redirect(base_url().'profile');
                }
            }


        }
    }


}