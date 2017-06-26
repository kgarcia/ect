<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Agency_daycare extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
        $this->load->model('back/Agency_daycare_model');
        //$this->load->model(array('Login_model','backend/Beneficiary_model','backend/Event_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
               
    }

    public function index()

    {    
     if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
        {

        $data['active'] = 'daycare'; 
        $data['title'] = 'Daycare';
        $this->load->view('back/header_view', $data);
        $this->load->view('back/agency/agency_daycare_list_view', $data); 
        $this->load->view('back/footer_view', $data);
     }
    


    }
 function add_new()
    {

        if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
        {
            $data['title'] = 'New Daycare';    
            $data['active'] = 'agency';
            $data['option'] = 'no';
            $data['button'] = 'Create';
            $data['action'] = 'user-section/agency-daycare/create_daycare/'; 
            //$id_school = $this->session->userdata('id_school');
             
           
           /* $id_grades = $this->Clas_model->get_grades($id_teacher);
                         if (is_array($id_grades))
                          { 
                            foreach($id_grades as $f => $key)
                            {

                                $grade[$f] = $this->Clas_model->get_grade($id_grades[$f]->id_grade);

                            }
                          }*/

            //$data['grades'] = $grade;
            //$data['programs'] = $this->Course_model->get_programs($id_school);
            //$data['departments'] = $this->Course_model->get_departments($id_school);
            $this->load->view('back/header_view', $data);
            $this->load->view('back/agency/agency_daycare_view', $data);
            $this->load->view('back/footer_view', $data); 
        }
        else {
            redirect(base_url().'home');
        }

    }
function create_daycare()
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
                $this->form_validation->set_rules('children','Children Quantity','trim|is_natural_no_zero|max_length[11]');
                 $this->form_validation->set_rules('owner','Owner','required|trim|max_length[45]');
                  $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[users.email]');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
          
          
            if($this->form_validation->run()==FALSE)
            {
                $this->add_new();
            }else{
                
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $children = $this->input->post('children');
                $owner = $this->input->post('owner');
                $email = $this->input->post('email');
                $id_agency = $this->session->userdata('id_agency');
                $password ='1234567';
                $pw = md5($password); $id_rol = 2;

                                        
                //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
                $id_user = $this->Agency_daycare_model->new_user($email,$pw,$id_rol);
                $id_daycare = $this->Agency_daycare_model->new_daycare($id_agency,$name,$phone,$address,$children,$owner);
                $id_administrator = $this->Agency_daycare_model->new_administrator($id_daycare,$id_user);
                
                if ($id_daycare != Null) {

                    echo "<script> if (confirm('Do you want to continue?')){
                        window.location='".base_url()."user-section/agency-daycare/add_new"."'
                    } else {
                        window.location='".base_url()."user-section/agency-daycare"."'
                    }</script>";

                    
                }
                //redirect(base_url().'agency-daycare/add_new');

                
        }
    }
        
      
      } 
    }

}