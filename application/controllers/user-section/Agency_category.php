<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Agency_category extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
        $this->load->model('back/Agency_category_model');
        //$this->load->model(array('Login_model','backend/Beneficiary_model','backend/Event_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
               
    }

    public function index()

    {    
     if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
        {
            $id_agency = $this->session->userdata('id_agency');

            $categories = $this->Agency_category_model->get_categories($id_agency);

            $data['arrCat'] = $categories;
            
           


        $data['active'] = 'Category'; 
        $data['title'] = 'Categories';
        $this->load->view('back/header_view', $data);
        $this->load->view('back/agency/agency_category_list_view', $data); 
        $this->load->view('back/footer_view', $data);
     }
    


    }
 function add_new()
    {

        if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
        {
            $data['title'] = 'New Vendor';    
            $data['active'] = 'vendor';
            $data['option'] = 'no';
            $data['legend'] = 'New Vendor'; 
            $data['button'] = 'Create';
            $data['action'] = 'user-section/agency-vendor/create_vendor/'; 
           
            $this->load->view('back/header_view', $data);
            $this->load->view('back/agency/agency_vendor_view', $data);
            $this->load->view('back/footer_view', $data); 
        }
        else {
            redirect(base_url().'home');
        }

    }
function create_vendor()
    {   
    if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
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
                  $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[users.email]');

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
                $id_agency = $this->session->userdata('id_agency');
                $password ='1234567';
                $pw = md5($password); $id_rol = 4;
                


                                        
                //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
                $id_user = $this->Agency_vendor_model->new_user($email,$pw,$id_rol);
                $id_vendor = $this->Agency_vendor_model->new_vendor($name,$phone,$address,$bdate,$gender,$id_user);

                //$this->Agency_vendor_model->new_agency_vendor($id_agency,$id_vendor);
                
                if ($this->Agency_vendor_model->new_agency_vendor($id_agency,$id_vendor) != Null) {

                    echo "<script> if (confirm('Do you want to continue?')){
                        window.location='".base_url()."user-section/agency-vendor/add-new"."'
                    } else {
                        window.location='".base_url()."user-section/agency-vendor"."'
                    }</script>";

                    
                }
                //redirect(base_url().'agency-daycare/add_new');

                
        }
    }
        
      
      } 
    }

 function edit($id_vendor)
    {
        if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
        {
            $data['title'] = 'Edit Vendor';    
            $data['active'] = 'vendor';
            $data['legend'] = 'Edit Vendor';
            $data['vendor'] = $this->Agency_vendor_model->get_vendor($id_vendor);
             $date = new DateTime($data['vendor']->birthdate);
                $bdate =$date->format('m/d/Y');
            $data['bdate'] = $bdate;
            $data['button'] = 'Save';
            $data['option'] = 'yes';
            $data['action'] = 'user-section/agency-vendor/update_vendor/';

             $this->load->view('back/header_view', $data);
            $this->load->view('back/agency/agency_vendor_view', $data);
            $this->load->view('back/footer_view', $data); 
        }
    }

function update_vendor()
{
if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
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
                

                $this->Agency_vendor_model->update_vendor($id_vendor,$name,$phone,$address,$bdate,$gender);
               
                               

                redirect(base_url().'user-section/agency-vendor');
            }
        }








}
}
 function check_default2($post_string)
    {
      return $post_string == '-1' ? FALSE : TRUE;
    }


}