<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Admin_vendor extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
        $this->load->model('back/Admin_vendor_model');
        //$this->load->model(array('Login_model','backend/Beneficiary_model','backend/Event_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
               
    }

    public function index()

    {    
     if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
        {
            //$id_agency = $this->session->userdata('id_agency');

            $vendors = $this->Admin_vendor_model->get_vendors();



            $data['vendor'] =  $vendors;
            
           


        $data['active'] = 'vendor'; 
        $data['title'] = 'Vendor';
        $this->load->view('back/webadmin/header_view', $data);
        $this->load->view('back/webadmin/admin_vendor_list_view', $data); 
        $this->load->view('back/footer_view', $data);
     }
    


    }
 function add_new()
    {

        if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
        {
            $data['title'] = 'New Vendor';    
            $data['active'] = 'vendor';
            $data['option'] = 'no';
            $data['legend'] = 'New Vendor'; 
            $data['button'] = 'Create';
            $data['action'] = 'user-section/admin-vendor/create_vendor/'; 
           
            $this->load->view('back/webadmin/header_view', $data);
            $this->load->view('back/webadmin/admin_vendor_view', $data);
            $this->load->view('back/footer_view', $data); 
        }
        else {
            redirect(base_url().'home');
        }

    }
function create_vendor()
    {   
    if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
    {

        //echo "probando";
        if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
        {
            
            
            //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
                                    
            $this->form_validation->set_rules('name','Name','required|trim|max_length[250]');
             $this->form_validation->set_rules('phone','Phone Number','required|trim|max_length[45]');
              $this->form_validation->set_rules('address','Address','required|trim|max_length[250]');
                $this->form_validation->set_rules('birthdate','Date of birth','required|trim|max_length[45]');
                  $this->form_validation->set_rules('gender',"Gender",'required|callback_check_default2');
                   $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');




                  $this->form_validation->set_message('check_default2', 'Please select a Gender');
          
          
            if($this->form_validation->run()==FALSE)
            {
                $this->add_new();
            }else{
                
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $birthdate = $this->input->post('birthdate');

                $date = new DateTime($birthdate);
                $bdate =$date->format('Y-m-d');

                $gender = $this->input->post('gender');
                $email = $this->input->post('email');
                //$id_agency = $this->session->userdata('id_agency');
                
                


                                        
                //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
                //$id_user = $this->Admin_vendor_model->new_user($email,$pw,$id_rol);
                $id_vendor = $this->Admin_vendor_model->new_vendor($name,$phone,$address,$bdate,$gender,$email);

                //$this->Admin_vendor_model->new_agency_vendor($id_agency,$id_vendor);
                
                if (  $id_vendor != Null) {

                    echo "<script> if (confirm('Do you want to continue?')){
                        window.location='".base_url()."user-section/admin-vendor/add-new"."'
                    } else {
                        window.location='".base_url()."user-section/admin-vendor"."'
                    }</script>";

                    
                }
                //redirect(base_url().'admin-daycare/add_new');

                
        }
    }
        
      
      } 
    }

 function edit($id_vendor)
    {
        if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
        {
            $data['title'] = 'Edit Vendor';    
            $data['active'] = 'vendor';
            $data['legend'] = 'Edit Vendor';
            $data['vendor'] = $this->Admin_vendor_model->get_vendor($id_vendor);
             $date = new DateTime($data['vendor']->birthdate);
                $bdate =$date->format('m/d/Y');
            $data['bdate'] = $bdate;
            $data['button'] = 'Save';
            $data['option'] = 'yes';
            $data['action'] = 'user-section/admin-vendor/update_vendor/';

             $this->load->view('back/webadmin/header_view', $data);
            $this->load->view('back/webadmin/admin_vendor_view', $data);
            $this->load->view('back/footer_view', $data); 
        }
    }

function update_vendor()
{
if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
{


   if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
        {
           $id_vendor = $this->input->post('id_vendor');
            //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
                                    
              $this->form_validation->set_rules('name','Name','required|trim|max_length[250]');
             $this->form_validation->set_rules('phone','Phone Number','required|trim|max_length[45]');
              $this->form_validation->set_rules('address','Address','required|trim|max_length[250]');
                $this->form_validation->set_rules('birthdate','Date of birth','required|trim|max_length[45]');
                  $this->form_validation->set_rules('gender',"Gender",'required|callback_check_default2');
                  $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');




                  $this->form_validation->set_message('check_default2', 'Please select a Gender');
          
          
            if($this->form_validation->run()==FALSE)
            {
                $this->edit($id_vendor);
            }else{
                
                
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $birthdate = $this->input->post('birthdate');


                $date = new DateTime($birthdate);
                $bdate =$date->format('Y-m-d');

                $gender = $this->input->post('gender');
                  $email = $this->input->post('email');
                

                $this->Admin_vendor_model->update_vendor($id_vendor,$name,$phone,$address,$bdate,$gender,$email);
               
                               

                redirect(base_url().'user-section/admin-vendor');
            }
        }








}
}
 function check_default2($post_string)
    {
      return $post_string == '-1' ? FALSE : TRUE;
    }


}