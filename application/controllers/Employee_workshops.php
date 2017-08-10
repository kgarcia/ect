<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Employee_workshops extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE));
        $this->load->model('back/Workshop_model');
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
               
    }

    public function completed_workshops()

    {    
         if($this->session->userdata('roles') == TRUE && 
            $this->session->userdata('roles') == 'employee')
        {

            $id_employee = $this->session->userdata('id_employee');
            $employee = $this->Workshop_model->get_employee($id_employee);

            $enrolls = $this->Workshop_model->get_employee_enrolls($id_employee);

            if( is_array($enrolls)){
                foreach ($enrolls as $i => $enroll) {

                    $workshops[$i] = $this->Workshop_model->get_workshop($enroll->workshop_id);
                    $vendor_id = $workshops[$i]->vendor_id;
                    $vendors[$i] = $this->Workshop_model->get_vendor($vendor_id);

                }
            }


            $data['active'] = 'home'; //TODO 
            $data['workshops'] = $workshops;
            $data['vendors'] = $vendors;
            $this->load->view('back/employee/header_view', $data);
            $this->load->view('back/employee/completed_workshops', $data);
            $this->load->view('back/footer_view', $data);  
         }
         else 
         {
            redirect(base_url().'login');
         }  
    }

public function all_workshops()

    {    
         if($this->session->userdata('roles') == TRUE && 
            $this->session->userdata('roles') == 'employee')
        {

            $id_employee = $this->session->userdata('id_employee');
            $employee = $this->Workshop_model->get_employee($id_employee);
            $daycare_id = $employee->daycare_id;

            $date_of_hired = new DateTime($employee->date_of_hired);
            $today = new DateTime( date( 'Y-m-d H:i:s' ) );
            $diff = $today->diff($date_of_hired);
            $years_diff = $diff->y;

            $rules = $this->Workshop_model->get_employee_rules($years_diff, $employee->type_employee_id);

            $actual_scholar_year = $this->Workshop_model->get_actual_scholar_year();

            $ind = 0;

            if (is_array($rules)){

                foreach ($rules as $i => $rule) {

                    $category_workshops = $this->Workshop_model->get_category_workshops($rule->category_id);

                    $hours = 0;

                    if (is_array($category_workshops)){
                        foreach ($category_workshops as $j => $category_workshop) {

                            $workshops[$ind] = $category_workshop;
                            $vendor_id = $workshops[$ind]->vendor_id;
                            $vendors[$ind] = $this->Workshop_model->get_vendor($vendor_id);
                            $ind++;

                            if (is_null($actual_scholar_year)){
                                $workshop_enrolls = $this->Workshop_model->get_employee_workshop_enrolls($id_employee, $category_workshop->id_workshops, $actual_scholar_year->id_scholar_years);
                            } else {
                                $workshop_enrolls = $this->Workshop_model->get_employee_schyear_workshop_enrolls($id_employee, $category_workshop->id_workshops, $actual_scholar_year->id_scholar_years);
                            }

                            if (is_array($workshop_enrolls)){
                                foreach ($workshop_enrolls as $k => $workshop_enroll) {
                                    
                                    $hours = $hours + $category_workshop->hours;

                                }
                            }

                        }

                    }

                    $completed_hours_cat[$rule->category_id] = $hours;
                    $required_hours_cat[$rule->category_id] = $rule->hours;
                    
                }

            }

            $data['active'] = 'home'; //TODO 
            $data['workshops'] = $workshops;
            $data['vendors'] = $vendors;
            $data['completed_hours_cat'] = $completed_hours_cat;
            $data['required_hours_cat'] = $required_hours_cat;
            $this->load->view('back/employee/header_view', $data);
            $this->load->view('back/employee/all_workshops', $data);
            $this->load->view('back/footer_view', $data);  
        }
         else 
         {
            redirect(base_url().'login');
         }  
    }

    public function upload_certificate() { 
        if($this->session->userdata('roles') == TRUE && 
            $this->session->userdata('roles') == 'employee')
        {
             $config['upload_path']   = './uploads/'; 
             $config['allowed_types'] = 'gif|jpg|png|pdf';  
             $this->load->library('upload', $config);
                
             if ( $this->upload->do_upload('certificate')) {
                $data = $this->upload->data();
                $path = $data["full_path"];
                $id_workshop = $this->input->post('workshopId');
                $id_employee = $this->session->userdata('id_employee');
                $employee = $this->Workshop_model->get_employee($id_employee);
                $daycare_id = $employee->daycare_id;
                $actual_scholar_year = $this->Workshop_model->get_actual_scholar_year();

                if (is_null($actual_scholar_year)){
                    $this->Workshop_model->create_enrollment($id_workshop,$id_employee);
                } else {
                    $this->Workshop_model->create_enrollment_scholar_year($id_workshop,$id_employee,$actual_scholar_year->id_scholar_years);
                }             
                $this->Workshop_model->create_certification($id_workshop,$id_employee,$path);

                echo "<script>javascript:alert('The certificate has been uploaded successfully');
                window.location='".base_url()."workshops/all'
                </script>";

             }    
             else { 
                redirect(base_url().'login');
             } 
        } 
        else 
        {
            redirect(base_url().'login');
        } 
    }
}