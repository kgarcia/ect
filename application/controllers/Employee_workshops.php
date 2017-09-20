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

        $this->lang->load('employeeheader',$this->session->userdata('lang') ); 
        $this->lang->load('employeeworkshopscom',$this->session->userdata('lang') );
        $this->lang->load('employeeworkshopsall',$this->session->userdata('lang') );
        $this->lang->load('employeeworkshopsup',$this->session->userdata('lang') );
        $this->lang->load('employeefooter',$this->session->userdata('lang') ); 
        $this->lang->load('datatables',$this->session->userdata('lang') );
               
    }

public function completed_workshops()

    {    
         if($this->session->userdata('roles') == TRUE && 
            ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {

            $id_employee = $this->session->userdata('id_employee');
            $employee = $this->Workshop_model->get_employee($id_employee);

            $certifications = $this->Workshop_model->get_employee_certifications($id_employee);

            if( is_array($certifications)){
                foreach ($certifications as $i => $certification) {

                    $workshops[$i] = $this->Workshop_model->get_workshop($certification->id_workshop);
                    $vendor_id = $workshops[$i]->vendor_id;
                    $vendors[$i] = $this->Workshop_model->get_vendor($vendor_id);

                }
            }


            

            //var_dump($data['workshops']);


            //Header & Footer Languages Variables
            
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


            //LAnguage variables
            

            $data['header_wc'] = $this->lang->line('header_wc');
            $data['table_workshop'] = $this->lang->line('table_workshop');
            $data['table_institution'] = $this->lang->line('table_institution');
            $data['table_hours'] = $this->lang->line('table_hours');
            $data['table_certificates'] = $this->lang->line('table_certificates');
             $data['table_view'] = $this->lang->line('table_view');

             //Datatables language variables
             
             $data['dt_records'] = $this->lang->line('dt_records');
            $data['dt_search'] = $this->lang->line('dt_search');
            $data['dt_showing'] = $this->lang->line('dt_showing');
            $data['table_to'] = $this->lang->line('table_to');
            $data['table_of'] = $this->lang->line('table_of');
             $data['table_entries'] = $this->lang->line('table_entries');
          
             $data['table_previous'] = $this->lang->line('table_previous');
                $data['table_next'] = $this->lang->line('table_next');

            //////////////////

             $data['active'] = 'home'; //TODO 
            $data['workshops'] = $workshops;
            $data['certifications'] = $certifications;
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
            ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
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

            //Header & Footer Languages Variables
            
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


            //LAnguage variables
            

            $data['header_wc'] = $this->lang->line('header_wc');
            $data['table_workshop'] = $this->lang->line('table_workshop');
            $data['table_institution'] = $this->lang->line('table_institution');
            $data['table_hours'] = $this->lang->line('table_hours');
            $data['table_certificates'] = $this->lang->line('table_certificates');
             $data['table_up'] = $this->lang->line('table_up');
             $data['table_missing'] = $this->lang->line('table_missing');
              $data['table_status'] = $this->lang->line('table_status');
              $data['table_upload'] = $this->lang->line('table_upload');
                $data['table_only'] = $this->lang->line('table_only');
                 $data['completed'] = $this->lang->line('completed');
                  $data['process'] = $this->lang->line('process');
                   $data['pending'] = $this->lang->line('pending');

             //Datatables language variables
             
             $data['dt_records'] = $this->lang->line('dt_records');
            $data['dt_search'] = $this->lang->line('dt_search');
            $data['dt_showing'] = $this->lang->line('dt_showing');
            $data['table_to'] = $this->lang->line('table_to');
            $data['table_of'] = $this->lang->line('table_of');
             $data['table_entries'] = $this->lang->line('table_entries');
          
             $data['table_previous'] = $this->lang->line('table_previous');
                $data['table_next'] = $this->lang->line('table_next');

            //////////////////

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
            ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {
             $config['upload_path']   = './uploads/'; 
             $config['allowed_types'] = 'gif|jpg|png|pdf';  
             $this->load->library('upload', $config);
                
             if ( $this->upload->do_upload('certificate')) {
                $data = $this->upload->data();
                $path = "uploads/".$data["file_name"];
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

    public function upload_single(){

        if($this->session->userdata('roles') == TRUE && 
            ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {


             //Header & Footer Languages Variables
            
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


            //LAnguage variables
            

            $data['header_up'] = $this->lang->line('header_up');
            $data['select_year'] = $this->lang->line('select_year');
            $data['select_category'] = $this->lang->line('select_category');
            //$data['select_workshop'] = $this->lang->line('select_workshop');
            $this->session->set_userdata('select_workshop',$this->lang->line('select_workshop'));
            $data['save_up'] = $this->lang->line('save_up');
             $data['only_up'] = $this->lang->line('only_up');

            $categories = $this->Workshop_model->get_all_categories();
            $data['categories'] = $categories;  
            $scholar_years = $this->Workshop_model->get_all_scholar_years();
            if (is_array($scholar_years)){
                foreach ($scholar_years as $i => $scholar_year) {
                    $start = new DateTime($scholar_year->start);
                    $pretty_start = $start->format('M d, Y');
                    $finish = new DateTime($scholar_year->finish);
                    $pretty_finish = $finish->format('M d, Y');
                    $sy_names[$i] = $pretty_start." - ".$pretty_finish;
                }
            }

            
            

            
            $data['scholar_years'] = $scholar_years;   
            $data['sy_names'] = $sy_names;     

            $this->load->view('back/employee/header_view', $data);
            $this->load->view('back/employee/upload_certification', $data);
            $this->load->view('back/footer_view', $data); 

        } 
        else 
        {
            redirect(base_url().'login');
        } 
    }

    public function fill_workshops()
    {

        if($this->session->userdata('roles') == TRUE && 
            ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {

            if($this->input->post('category') && $this->input->post('category')>0)
            {
                $category_id = $this->input->post('category');
                $category_workshops = $this->Workshop_model->get_category_workshops($category_id);

                echo "<option>". $this->session->userdata('select_workshop') ."</option>";

                foreach($category_workshops as $workshop)
                {
                    echo '<option value="'.$workshop->id_workshops.'">'.$workshop->name.'</option>';
                }
            }
        } 
        else 
        {
            redirect(base_url().'login');
        }
    }

    public function upload_single_certificate() { 
        if($this->session->userdata('roles') == TRUE && 
            ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {
             $config['upload_path']   = './uploads/'; 
             $config['allowed_types'] = 'gif|jpg|png|pdf';  
             $this->load->library('upload', $config);
                
             if ( $this->upload->do_upload('certification')) {
                $data = $this->upload->data();
                $path = "uploads/".$data["file_name"];
                $id_workshop = $this->input->post('workshop');
                $id_scholar_years = $this->input->post('scholar_year');
                $id_employee = $this->session->userdata('id_employee');
                $employee = $this->Workshop_model->get_employee($id_employee);
                $daycare_id = $employee->daycare_id;
                $actual_scholar_year = $this->Workshop_model->get_actual_scholar_year();

                $this->Workshop_model->create_enrollment_scholar_year($id_workshop,$id_employee,$id_scholar_years);
                           
                $this->Workshop_model->create_certification($id_workshop,$id_employee,$path);

                echo "<script>javascript:alert('The certificate has been uploaded successfully');
                window.location='".base_url()."workshops/completed'
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

    public function workshops_per_year()

    {    
         if($this->session->userdata('roles') == TRUE && 
            ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {

            //Header & Footer Languages Variables
            
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


            //LAnguage variables
            

            $data['select_year'] = $this->lang->line('select_year');

             //Datatables language variables
             
            $data['dt_records'] = $this->lang->line('dt_records');
            $data['dt_search'] = $this->lang->line('dt_search');
            $data['dt_showing'] = $this->lang->line('dt_showing');
            $data['table_to'] = $this->lang->line('table_to');
            $data['table_of'] = $this->lang->line('table_of');
            $data['table_entries'] = $this->lang->line('table_entries');
          
            $data['table_previous'] = $this->lang->line('table_previous');
            $data['table_next'] = $this->lang->line('table_next');

            //////////////////

            $data['active'] = 'home';

            $id_employee = $this->session->userdata('id_employee');
            $employee = $this->Workshop_model->get_employee($id_employee);

            $scholar_years = $this->Workshop_model->get_all_scholar_years();
            
            if (is_array($scholar_years)){
                foreach ($scholar_years as $i => $scholar_year) {
                    $start = new DateTime($scholar_year->start);
                    $pretty_start = $start->format('M d, Y');
                    $finish = new DateTime($scholar_year->finish);
                    $pretty_finish = $finish->format('M d, Y');
                    $sy_names[$i] = $pretty_start." - ".$pretty_finish;
                }
            }
            
            $data['scholar_years'] = $scholar_years;   
            $data['sy_names'] = $sy_names;    

            $this->load->view('back/employee/header_view', $data);
            $this->load->view('back/employee/workshops_per_year', $data);
            $this->load->view('back/footer_view', $data);  
         }
         else 
         {
            redirect(base_url().'login');
         }  
    }

    public function fill_workshops_per_year()
    {

        if($this->session->userdata('roles') == TRUE && 
            ($this->session->userdata('roles') == 'employee' || $this->session->userdata('roles') == 'administrator'))
        {

            if($this->input->post('scholar_year') && $this->input->post('scholar_year')>0)
            {
                $scholar_year_id = $this->input->post('scholar_year');
                $id_employee = $this->session->userdata('id_employee');
                $employee = $this->Workshop_model->get_employee($id_employee);

                $certifications = $this->Workshop_model->get_employee_certifications($id_employee);
                $enrollments = $this->Workshop_model->get_employee_enrollments($id_employee);

                $k = 0;
                if( is_array($certifications)){
                    foreach ($certifications as $i => $certification) {

                        if ($enrollments[$i]->scholar_year_id == $scholar_year_id){

                            $workshops[$k] = $this->Workshop_model->get_workshop($certification->id_workshop);
                            $vendor_id = $workshops[$k]->vendor_id;
                            $vendors[$k] = $this->Workshop_model->get_vendor($vendor_id);
                            $k++;

                        }
                    }


                }

                if (is_array($workshops)){

                    echo '<table class="table table-bordered table-hover" id="table_completed_workshops">
                                <thead>
                                    <tr class="active">
                                        <th>'.$this->lang->line('table_workshop').'</th> 
                                        <th>'.$this->lang->line('table_institution').'</th> 
                                        <th width="160">'.$this->lang->line('table_hours').'</th>
                                        <th width="160">'.$this->lang->line('table_certificates').'</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>';

                                if (is_array($workshops)) {
                                    foreach($workshops as $i => $workshop)
                                    {

                                    echo '<tr>
                                        <td><a>'.$workshop->name.'</a></td> 
                                        <td>'.$vendors[$i]->name.'</td>
                                        <td>'.$workshop->hours.'</td>
                                        <td>
                                         <a class="btn btn-success btn-lg" href="'.base_url().$certifications[$i]->path.'" download> '.$this->lang->line('table_view').' </a>
                                        </td>
                                    </tr>';

                                   
                                    }
                                }                                       
                                   
                                echo '</tbody> 
                                </table>';

                } else {

                    echo '<div class="alert alert-danger col-xs-12 col-md-12">'.$this->lang->line('message_no_workshops_scholar_year').'</div>';
                }

            }
        } 
        else 
        {
            redirect(base_url().'login');
        }
    }

}

