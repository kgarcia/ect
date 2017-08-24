<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Admin_workshop extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
        $this->load->model('back/Admin_workshop_model');
        //$this->load->model(array('Login_model','backend/Beneficiary_model','backend/Event_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
               
    }

    public function index()

    {    
     if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
        {
            //$id_admin = $this->session->userdata('id_admin');

            $arrWor = $this->Admin_workshop_model->get_workshops();

            //$id_category_arr = $this->Admin_workshop_model->get_id_categories();
            if (is_array($arrWor))
                {
                 foreach($arrWor as $c => $k)
                     {

                          $id_category = $arrWor[$c]->category_id;
                          $rowCat[$c] = $this->Admin_workshop_model->get_category($id_category);

                          $id_vendor = $arrWor[$c]->vendor_id;
                          $rowVen[$c] = $this->Admin_workshop_model->get_vendor($id_vendor);



                     }

                }
            


            $data['category'] = $rowCat;
            $data['vendor'] = $rowVen;
            $data['arrWor'] = $arrWor;
            
           


        $data['active'] = 'Workshop'; 
        $data['title'] = 'Workshops';
        $this->load->view('back/webadmin/header_view', $data);
        $this->load->view('back/webadmin/admin_workshop_list_view', $data); 
        $this->load->view('back/footer_view', $data);
     }
    


    }
 function add_new()
    {

        if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
        {
            $data['title'] = 'New Workshop';    
            $data['active'] = 'workshop';
            $data['option'] = 'no';
            $data['legend'] = 'New Workshop'; 
            $data['button'] = 'Create';
            $data['action'] = 'user-section/admin-workshop/create_workshop/';

            $data['categories'] = $this->Admin_workshop_model->get_categories();
               $data['vendors'] = $this->Admin_workshop_model->get_vendors();
           
            $this->load->view('back/webadmin/header_view', $data);
            $this->load->view('back/webadmin/admin_workshop_view', $data);
            $this->load->view('back/footer_view', $data); 
        }
        else {
            redirect(base_url().'home');
        }

    }
function create_workshop()
    {   
    if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
    {

        //echo "probando";
        if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
        {
            
            
            //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
                    $this->form_validation->set_rules('cat',"Category",'required|callback_check_default2');
                     $this->form_validation->set_rules('vendor',"Vendor",'required|callback_check_default4');
            $this->form_validation->set_rules('name','Name','required|trim|max_length[250]');
             $this->form_validation->set_rules('hours','Hours','trim|is_natural_no_zero|max_length[11]');
              $this->form_validation->set_rules('topic','Topic','required|trim|max_length[250]');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');




                  $this->form_validation->set_message('check_default2', 'Please select a Category');
                  $this->form_validation->set_message('check_default4', 'Please select a Vendor');
          
          
            if($this->form_validation->run()==FALSE)
            {
                $this->add_new();
            }else{
                
                $name = $this->input->post('name');
                $vendor = $this->input->post('vendor');
                $category = $this->input->post('cat');
                $hours = $this->input->post('hours');
                $topic = $this->input->post('topic');

                
                //$id_agency = $this->session->userdata('id_agency');
                
                


                                        
                //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
                $id_workshop = $this->Admin_workshop_model->new_workshop($category,  $vendor,$name,$hours,$topic);

                //$this->Agency_vendor_model->new_agency_vendor($id_agency,$id_vendor);
                
                if ( $id_workshop != Null) {

                    echo "<script> if (confirm('Do you want to continue?')){
                        window.location='".base_url()."user-section/admin-workshop/add-new"."'
                    } else {
                        window.location='".base_url()."user-section/admin-workshop"."'
                    }</script>";

                    
                }
                //redirect(base_url().'admin-daycare/add_new');

                
        }
    }
        
      
      } 
    }

 function edit($id_workshop)
    {
        if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
        {
           



            $data['title'] = 'Edit Workshop';    
            $data['active'] = 'workshop';
            $data['option'] = 'yes';
            $data['legend'] = 'Edit Workshop'; 
            $data['button'] = 'Save';
            $data['action'] = 'user-section/admin-workshop/update_workshop/';
            $data['workshop'] = $this->Admin_workshop_model->get_workshop($id_workshop);

            $data['categories'] = $this->Admin_workshop_model->get_categories();
            $data['vendors'] = $this->Admin_workshop_model->get_vendors();

            $row_cat = $this->Admin_workshop_model->get_category($data['workshop']->category_id);
            $row_ven = $this->Admin_workshop_model->get_vendor($data['workshop']->vendor_id);

            $data['category'] = $row_cat->description;
             $data['vendor'] = $row_ven->name;
           
            $this->load->view('back/webadmin/header_view', $data);
            $this->load->view('back/webadmin/admin_workshop_view', $data);
            $this->load->view('back/footer_view', $data); 
        }
    }

function update_workshop()
{
if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'webadmin')
{


   if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
        {
           $id_workshop = $this->input->post('id_workshop');
            //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
                    $this->form_validation->set_rules('cat',"Category",'required|callback_check_default2');
                    $this->form_validation->set_rules('vendor',"Vendor",'required|callback_check_default4');
            $this->form_validation->set_rules('name','Name','required|trim|max_length[250]');
             $this->form_validation->set_rules('hours','Hours','trim|is_natural_no_zero|max_length[11]');
              $this->form_validation->set_rules('topic','Topic','required|trim|max_length[250]');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');




                  $this->form_validation->set_message('check_default2', 'Please select a Category');
          $this->form_validation->set_message('check_default4', 'Please select a Vendor');
          
            if($this->form_validation->run()==FALSE)
            {
                $this->edit($id_workshop);
            }else{
                
                
                $name = $this->input->post('name');
                $category = $this->input->post('cat');
                $vendor = $this->input->post('vendor');
                $hours = $this->input->post('hours');
                $topic = $this->input->post('topic');

                
                //$id_agency = $this->session->userdata('id_agency');
                

                $this->Admin_workshop_model->update_workshop($id_workshop,$category, $vendor,$name,$hours,$topic);
               
                               

                redirect(base_url().'user-section/admin-workshop');
            }
        }








}
}
 function check_default2($post_string)
    {
      return $post_string == '-1' ? FALSE : TRUE;
    }



 function check_default4($post_string)
    {
      return $post_string == '-1' ? FALSE : TRUE;
    }


}