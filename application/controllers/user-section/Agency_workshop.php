<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Agency_workshop extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
        $this->load->model('back/Agency_workshop_model');
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

            $arrWor = $this->Agency_workshop_model->get_workshops($id_agency);

            //$id_category_arr = $this->Agency_workshop_model->get_id_categories();
            if (is_array($arrWor))
                {
                 foreach($arrWor as $c => $k)
                     {

                          $id_category = $arrWor[$c]->category_id;
                          $rowCat[$c] = $this->Agency_workshop_model->get_category($id_category);


                     }

                }
            


            $data['category'] = $rowCat;
            $data['arrWor'] = $arrWor;
            
           


        $data['active'] = 'Workshop'; 
        $data['title'] = 'Workshops';
        $this->load->view('back/agency/header_view', $data);
        $this->load->view('back/agency/agency_workshop_list_view', $data); 
        $this->load->view('back/footer_view', $data);
     }
    


    }
 function add_new()
    {

        if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
        {
            $data['title'] = 'New Workshop';    
            $data['active'] = 'workshop';
            $data['option'] = 'no';
            $data['legend'] = 'New Workshop'; 
            $data['button'] = 'Create';
            $data['action'] = 'user-section/agency-workshop/create_workshop/';

            $data['categories'] = $this->Agency_workshop_model->get_categories();
           
            $this->load->view('back/agency/header_view', $data);
            $this->load->view('back/agency/agency_workshop_view', $data);
            $this->load->view('back/footer_view', $data); 
        }
        else {
            redirect(base_url().'home');
        }

    }
function create_workshop()
    {   
    if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
    {

        //echo "probando";
        if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
        {
            
            
            //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
                    $this->form_validation->set_rules('cat',"Category",'required|callback_check_default2');
            $this->form_validation->set_rules('name','Name','required|trim|max_length[250]');
             $this->form_validation->set_rules('hours','Hours','trim|is_natural_no_zero|max_length[11]');
              $this->form_validation->set_rules('topic','Topic','required|trim|max_length[250]');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');




                  $this->form_validation->set_message('check_default2', 'Please select a Category');
          
          
            if($this->form_validation->run()==FALSE)
            {
                $this->add_new();
            }else{
                
                $name = $this->input->post('name');
                $category = $this->input->post('cat');
                $hours = $this->input->post('hours');
                $topic = $this->input->post('topic');

                
                $id_agency = $this->session->userdata('id_agency');
                
                


                                        
                //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
                $id_workshop = $this->Agency_workshop_model->new_workshop($category,$id_agency,$name,$hours,$topic);

                //$this->Agency_vendor_model->new_agency_vendor($id_agency,$id_vendor);
                
                if ( $id_workshop != Null) {

                    echo "<script> if (confirm('Do you want to continue?')){
                        window.location='".base_url()."user-section/agency-workshop/add-new"."'
                    } else {
                        window.location='".base_url()."user-section/agency-workshop"."'
                    }</script>";

                    
                }
                //redirect(base_url().'agency-daycare/add_new');

                
        }
    }
        
      
      } 
    }

 function edit($id_workshop)
    {
        if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
        {
           



            $data['title'] = 'Edit Workshop';    
            $data['active'] = 'workshop';
            $data['option'] = 'yes';
            $data['legend'] = 'Edit Workshop'; 
            $data['button'] = 'Save';
            $data['action'] = 'user-section/agency-workshop/update_workshop/';
            $data['workshop'] = $this->Agency_workshop_model->get_workshop($id_workshop);

            $data['categories'] = $this->Agency_workshop_model->get_categories();

            $row_cat = $this->Agency_workshop_model->get_category($data['workshop']->category_id);

            $data['category'] = $row_cat->description;
           
            $this->load->view('back/agency/header_view', $data);
            $this->load->view('back/agency/agency_workshop_view', $data);
            $this->load->view('back/footer_view', $data); 
        }
    }

function update_workshop()
{
if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'agency')
{


   if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
        {
           $id_workshop = $this->input->post('id_workshop');
            //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
                    $this->form_validation->set_rules('cat',"Category",'required|callback_check_default2');
            $this->form_validation->set_rules('name','Name','required|trim|max_length[250]');
             $this->form_validation->set_rules('hours','Hours','trim|is_natural_no_zero|max_length[11]');
              $this->form_validation->set_rules('topic','Topic','required|trim|max_length[250]');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');




                  $this->form_validation->set_message('check_default2', 'Please select a Category');
          
          
            if($this->form_validation->run()==FALSE)
            {
                $this->edit($id_workshop);
            }else{
                
                
                $name = $this->input->post('name');
                $category = $this->input->post('cat');
                $hours = $this->input->post('hours');
                $topic = $this->input->post('topic');

                
                $id_agency = $this->session->userdata('id_agency');
                

                $this->Agency_workshop_model->update_workshop($id_workshop,$category,$name,$hours,$topic);
               
                               

                redirect(base_url().'user-section/agency-workshop');
            }
        }








}
}
 function check_default2($post_string)
    {
      return $post_string == '-1' ? FALSE : TRUE;
    }


}