<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daycare extends CI_Controller {
	public function __construct(){
		parent::__construct();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        //$this->load->model(array('Period_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
        //$this->load->helper('server_root');
        //$this->removeCache();
        $this->load->model('back/daycare_model');
        $this->load->model('back/employee_model');
        $this->load->model('back/quiz_model');
        $this->load->model('back/Workshop_model');
        $this->load->model('front/Signup_model');
	    
           
	}

	function personnel_registration(){
    if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'administrator')
        {
        $data['title'] = 'Personnel Registration';    
        $data['active'] = 'Personnel_Registration';
        $employee_id = $this->session->userdata('id_employee');
        $employee = $this->employee_model->get_employee($employee_id);
        $data['cancreatequiz'] = $this->quiz_model->get_daycare_quiz_count($employee->daycare_id);
        $this->load->view('back/daycare/header_view_k', $data);
        //$this->load->view('front/nav_view', $data);
        $this->load->view('back/daycare/personnel_registration', $data);
        $this->load->view('back/footer_view', $data); 
        }
         else 
         {
            redirect(base_url().'login');
         }       
	} 
	
	function create_employee(){
	     if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'administrator')
        {
	    $employee_id = $this->session->userdata('id_employee');
        $employee = $this->employee_model->get_employee($employee_id);
        $email = $this->input->post('email');
        $id_rol = $this->input->post('rol');
        if($id_rol==3){
            $type_employee_id = 1;
        }else{
            $type_employee_id = 2;
        }
        $password ='1234567';
        $pw = md5($password);
        $newuser_id = $this->Signup_model->new_user($email,$pw,$id_rol);
		$data = array(
			'name' => $this->input->post('name'),
			'address' =>$this->input->post('address'),// $this->input->post('address'),
                        'daycare_id' => $employee->daycare_id,
                        'user_id'=> $newuser_id,
                        'type_employee_id'=>$type_employee_id,
                        'job'=>$this->input->post('job'),
                        'phone'=>$this->input->post('phone'),
                        'birthdate'=>$this->input->post('birthdate'),
                        'gender'=>$this->input->post('gender'),
                        'date_of_hired'=>$this->input->post('hired'),
                        'date_of_responsability'=>$this->input->post('responsability'),
			);
                $this->employee_model->createEmployee($data);
                   
                    
                $this->employee_list(); 
        }
	}
	
	function mailTest(){
	     /* Correo **************************/
                    $name = 'john';//$this->input->post('name');               
                    $message = 'hello world';
                    $email = $this->input->post('kevin93ps@gmail.com');
                       $this->load->library("email");

                    $configGmail = array(
                       'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.gmail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'kevin93ps@gmail.com',
                        'smtp_pass' => 'Adgn16..',
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'newline' => "\r\n"
                    );  

                    $this->email->initialize($configGmail);
                   

                    $this->email->from('kevin93ps@gmail.com');
                    $this->email->to($email); 
                    $this->email->subject('Contact message from ect.com');
                    $this->email->message('<div>
                                            <h2    style="text-align:center;">
                                            Contact Message
                                            </h2>
                                            <hr>
                                            <br>
                                            <span style="font-size:14px;">Name:&nbsp;&nbsp;'.$name.'</span><br>
                                            <span style="font-size:14px;">Email:&nbsp;&nbsp;'.$email.'</span><br> <br>
                                            <span style="font-size:14px;">Message:&nbsp;&nbsp;'.$message.'</span><br>
                                          </div>');  

                    $this->email->send();
                    //echo $this->email->print_debugger();

                var_dump($this->email->print_debugger());
                
	}

	function employee_list(){
	 if($this->session->userdata('roles') == TRUE && $this->session->userdata('roles') == 'administrator')
        {
		$data['title'] = 'Employee List';    
        $data['active'] = 'Employee_List';
        
         $employee_id = $this->session->userdata('id_employee');
        $employee = $this->employee_model->get_employee($employee_id);
        $data['employees'] = $this->employee_model->get_daycare_employees($employee->daycare_id);
        $data['cancreatequiz'] = $this->quiz_model->get_daycare_quiz_count($employee->daycare_id);
        $this->load->view('back/daycare/header_view_k', $data);
        $this->load->view('back/daycare/employee_list', $data);
        $this->load->view('back/footer_view', $data); 
        }
         else 
         {
            redirect(base_url().'login');
         }  
	}
	
	function show_employee(){
		 $data['title'] = 'Employee Workshops';    
        $data['active'] = 'Employee_List';
        #$data['employees'] = $this->employee_model->getEmployees();
        $data['segmento'] = $this->uri->segment(3);
        $this->load->view('back/daycare/header_view_k', $data);
        if($data['segmento']){
            $data['employee'] = $this->employee_model->showEmployee($data['segmento']);
            $data['workshops'] = $this->employee_model->getWorkshops($data['segmento']);
            $this->load->view('back/daycare/show_employee', $data);
        }
        else{
            $this->load->view('back/daycare/show_employee', $data);
        }
        $this->load->view('back/footer_view', $data); 
        
	}
	 public function employee_workshops()

    {    
         if($this->session->userdata('roles') == TRUE && 
            $this->session->userdata('roles') == 'administrator')
        {
            $data['title'] = 'Employee Workshops';    
            $data['active'] = 'Employee_List';
            #$data['employees'] = $this->employee_model->getEmployees();
            $data['segmento'] = $this->uri->segment(3);
            
            $id_employee = $this->uri->segment(3);
            $employee = $this->Workshop_model->get_employee($id_employee);
        $data['cancreatequiz'] = $this->quiz_model->get_daycare_quiz_count($employee->daycare_id);
           
            $certifications = $this->Workshop_model->get_employee_certifications($id_employee);

            if( is_array($certifications)){
                foreach ($certifications as $i => $certification) {


                    $workshops[$i] = $this->Workshop_model->get_workshop($certification->id_workshop);
                    $vendor_id = $workshops[$i]->vendor_id;
                    $vendors[$i] = $this->Workshop_model->get_vendor($vendor_id);

                }
            }


            $data['active'] = 'home'; //TODO 
            $data['workshops'] = $workshops;
            $data['vendors'] = $vendors;
            
            $emp = $this->employee_model->get_employee($data['segmento']);
            $data['employee'] = $emp;
            $data['certifications'] = $certifications;
            $this->load->view('back/daycare/header_view_k', $data);
            $this->load->view('back/daycare/employee_workshops', $data);
            $this->load->view('back/footer_view', $data);  
         }
         else 
         {
            redirect(base_url().'login');
         }  
    }
    
    function quiz_registration(){
        if($this->session->userdata('roles') == TRUE && 
            $this->session->userdata('roles') == 'administrator')
        {
        $data['title'] = 'Quiz Registration';    
        $data['active'] = 'Quiz_Registration';
        $employee_id = $this->session->userdata('id_employee');
        $employee = $this->employee_model->get_employee($employee_id);
        $quizzes = $this->quiz_model->getQuizzes($employee->daycare_id);
        $data['idioma']=3;
        if($quizzes){
        foreach($quizzes->result() as $quiz){
            echo 'qt'.$quiz->quiztype_id.'pq';
            if ($quiz->quiztype_id==1){
                $data['idioma']=2;
            }elseif($quiz->quiztype_id==2){
                $data['idioma']=1;
            }
        }
        }
        $this->load->view('back/daycare/header_view_k', $data);
        $this->load->view('back/daycare/quiz_registration', $data);
        $this->load->view('back/footer_view', $data); 
        }
         else 
         {
            redirect(base_url().'login');
         }  
	} 
    
    function create_quiz(){
         if($this->session->userdata('roles') == TRUE && 
            $this->session->userdata('roles') == 'administrator')
        {
            $id_employee = $this->session->userdata('id_user');
            $employee = $this->employee_model->get_employee_by_user_id($id_employee);
                            $quiz = array(
                    			'description' => $this->input->post('description'),
                    			'daycare_id' =>$employee->daycare_id,
                                            'quiztype_id' => $this->input->post('quizztype_id'),
                                            'duration' => '10:00:00'//
                    			);
                    			$quizid = $this->quiz_model->createQuiz($quiz);

                             if ($this->input->post('question')) { // returns false if no property 
                                $questions = $this->input->post('question', true);
                                $count = $this->input->post('count', true);// questions count
                                $score = $this->input->post('score', true);
                                $opciones = array();
                                $correctas = array();
                                for ($x = 0; $x <= $count; $x++) {
                                    $var = 'optio'.$x.'n';
                                    $corr = 'correc'.$x.'t';
                                    ${"options$x"} = $this->input->post($var, true);
                                    ${"correct$x"} = $this->input->post($corr, true);
                                    array_push($opciones,${"options$x"});
                                    array_push($correctas,${"correct$x"});

                                } 
                                 // echo '<pre>las opciones';
                                    ////print_r($opciones);
                                   // print_r($correctas);
                                    //echo '<br>las score';
                                    ////print_r($score);
                                //echo '<br>Qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq';
                                $preg = 0;
                                foreach ($questions as $i => $a) { // need index to match other properties
                                    //echo '<br>quest';
                                    //echo $a;
                                    //echo '<br>score';
                                    //echo $score[$i];
                                    $preg++;
                                    $question = array(
                                			'description' => $a,
                                			'quiz_id' => $quizid,
                                            'questiontype_id' => 1,
                                            'score' => $score[$i]//
                                			);
                                    $questionid = $this->quiz_model->createQuestion($question);
                                    
                                        //echo '<br>OOOOOOOOOOOOOOOOoooooooooooooooooooooopppp';
                                        $optin = $i+1;
                                        $u = 1;
                                    foreach (${"options$optin"} as $in => $op) {
                                        //echo '<br>quest';
                                        //echo $count;
                                        //print_r($correctas[$preg]);
                                        //echo 'val'.in_array($u, $correctas[$preg]).'<br>';
                                        if (in_array($u, $correctas[$preg])) {
                                            $bool = 1;
                                        }
                                        else{
                                            $bool = 0;
                                        };
                                        $option = array(
                                			'description' => $op,
                                			'question_id' => $questionid,
                                            'correct' => $bool
                                			);
                                			//echo'<br>solution: ';
                                			//print_r($option);
                            			if (!$this->db->insert('solutions', $option)) {
                                            // quit if insert fails - adjust accordingly
                                            //print_r($question);
                                            die('Failed question insert');
                                        }
                                        $u++;
                                    }
                                    
                                }
                            
                                // don't redirect inside the loop
                                redirect(base_url().'daycare/quiz_list');
                                //echo '</pre>';   
                            } else{
                                ////echo 'No Data';
                            }
        }
         else 
         {
            redirect(base_url().'login');
         }            
	}
	
	function quiz_list(){
	      if($this->session->userdata('roles') == TRUE && 
            $this->session->userdata('roles') == 'administrator')
        {
		$data['title'] = 'Quizzes List';    
        $data['active'] = 'quiz_List';
        $employee_id = $this->session->userdata('id_employee');
        $employee = $this->employee_model->get_employee($employee_id);
        
        $data['quizzes'] = $this->quiz_model->getQuizzes($employee->daycare_id);
        $data['cancreatequiz'] = $this->quiz_model->get_daycare_quiz_count($employee->daycare_id);
        $this->load->view('back/daycare/header_view_k', $data);
        $this->load->view('back/daycare/quiz_list', $data);
        $this->load->view('back/footer_view', $data); 
        }
         else 
         {
            redirect(base_url().'login');
         }
	}
	
	    function quiz_registration2(){
        if($this->session->userdata('roles') == TRUE && 
            $this->session->userdata('roles') == 'administrator')
        {
        $data['title'] = 'Quiz Registration';    
        $data['active'] = 'Quiz_Registration';
        $employee_id = $this->session->userdata('id_employee');
        $employee = $this->employee_model->get_employee($employee_id);
        $quizzes = $this->quiz_model->getQuizzes($employee->daycare_id);
        $data['idioma']=3;
        if($quizzes){
        foreach($quizzes->result() as $quiz){
            echo 'qt'.$quiz->quiztype_id.'pq';
            if ($quiz->quiztype_id==1){
                $data['idioma']=2;
            }elseif($quiz->quiztype_id==2){
                $data['idioma']=1;
            }
        }
        }
        $this->load->view('back/daycare/header_view_k', $data);
        $this->load->view('back/daycare/quiz_registration', $data);
        $this->load->view('back/footer_view', $data); 
        }
         else 
         {
            redirect(base_url().'login');
         }  
	} 
    
    function edit_quiz(){
         if($this->session->userdata('roles') == TRUE && 
            $this->session->userdata('roles') == 'administrator')
        {
            $id_employee = $this->session->userdata('id_user');
            $employee = $this->employee_model->get_employee_by_user_id($id_employee);
                            $quiz = array(
                                'id_quizzes' => $this->input->post('quiz_id'),
                			    'description' => $this->input->post('description'),
                    			'daycare_id' =>$employee->daycare_id,
                                'quiztype_id' => $this->input->post('quizztype_id'),
                                'duration' => '10:00:00'//
                    			);
                    			$quizid =$this->input->post('quiz_id');
                    			$this->quiz_model->edit_quiz($quiz);
            
                             if ($this->input->post('question')) { // returns false if no property 
                                $questions = $this->input->post('question', true);
                                $count = $this->input->post('count', true);// questions count
                                $questionsid = $this->input->post('question_id', true);
                                $score = $this->input->post('score', true);
                                $opciones = array();
                                $correctas = array();
                                for ($x = 0; $x <= $count; $x++) {
                                    $var = 'optio'.$x.'n';
                                    $corr = 'correc'.$x.'t';
                                    ${"options$x"} = $this->input->post($var, true);
                                    ${"correct$x"} = $this->input->post($corr, true);
                                    array_push($opciones,${"options$x"});
                                    array_push($correctas,${"correct$x"});

                                } 
                                 // echo '<pre>las opciones';
                                    ////print_r($opciones);
                                   // print_r($correctas);
                                    //echo '<br>las score';
                                    ////print_r($score);
                                //echo '<br>Qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq';
                                $preg = 0;
                                foreach ($questions as $i => $a) { // need index to match other properties
                                    //echo '<br>quest';
                                    //echo $a;
                                    //echo '<br>score';
                                    //echo $score[$i];
                                    $preg++;
                                    $dataq = array(
                                            'id_questions'=>$questionsid[$i],
                                			'description' => $a,
                                			'quiz_id' => $quizid,
                                            'questiontype_id' => 1,
                                            'score' => $score[$i]//
                                			);
                                			
                                    $this->quiz_model->updateQuestion($dataq);
                                    
                                        //echo '<br>OOOOOOOOOOOOOOOOoooooooooooooooooooooopppp';
                                        $optin = $i+1;
                                        $u = 1;
                                    foreach (${"options$optin"} as $in => $op) {
                                        //echo '<br>quest';
                                        //echo $count;
                                        //print_r($correctas[$preg]);
                                        //echo 'val'.in_array($u, $correctas[$preg]).'<br>';
                                        if (in_array($u, $correctas[$preg])) {
                                            $bool = 1;
                                        }
                                        else{
                                            $bool = 0;
                                        };
                                        $option = array(
                                            'id_solutions' => ${"solutio$optin"."n[$u]"},
                                			'description' => $op,
                                			'question_id' => $questionid,
                                            'correct' => $bool
                                			);
                                			//echo'<br>solution: ';
                                			//print_r($option);
                            			$this->quiz_model->updateSolution($option);
                                        $u++;
                                    }
                                    
                                }
                            
                                // don't redirect inside the loop
                                redirect(base_url().'daycare/quiz_list');
                                //echo '</pre>';   
                            } else{
                                ////echo 'No Data';
                            }
        }
         else 
         {
            redirect(base_url().'login');
         }            
	}

	
	function profile()
    {

        if($this->session->userdata('roles') == TRUE && 
            ($this->session->userdata('roles') == 'administrator'))
        {


            $employee_id = $this->session->userdata('id_employee');
            $employee = $this->employee_model->get_employee($employee_id);
            $user_id = $employee->user_id;
            $user = $this->employee_model->get_user($user_id);
            $daycare = $this->daycare_model->get_daycare($employee->daycare_id);
            $data['employee'] = $employee;
            $data['user'] = $user;
            $data['daycare'] = $daycare;
           
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
                    $children = $this->input->post('children'); 
                    $daycare_id = $this->input->post('daycare_id');

                    $this->daycare_model->update_daycare($daycare_id, $name, $phone, $address, $children);

                    $config['upload_path']   = './daycare_pics/'; 
                    $config['allowed_types'] = 'gif|jpg|png';  
                    $this->load->library('upload', $config);
                        
                    if ( $this->upload->do_upload('profile_picture')) {
                        
                        $data = $this->upload->data();
                        $path = "daycare_pics/".$data["file_name"];
                        $this->daycare_model->update_daycare_picture($daycare_id, $path);

                    }

                    redirect(base_url().'daycare/profile');
                }
            }


        }
    }

	
	function quiz_edit(){
	    if($this->session->userdata('roles') == TRUE && ( $this->session->userdata('roles') == 'administrator'))
        {
            $id_employee = $this->session->userdata('id_user');
            $employee = $this->employee_model->get_employee_by_user_id($id_employee);
            $data['segmento'] = $this->uri->segment(3);
            $id_quiz = $this->uri->segment(3);
            $quiz = $this->quiz_model->showQuiz($id_quiz)->result();
            $data['quiz'] = $quiz[0];
            $questions = $this->quiz_model->get_quiz_questions($id_quiz);
            
            $this->load->view('back/daycare/header_view_k', $data);
            
            $this->load->view('back/daycare/quiz_edit_up', $data);
            $count = 1;
            foreach($questions as $question) {
                $solutions = $this->quiz_model->get_question_solutions($question->id_questions);
                $this->load->view('/back/daycare/question_partial', array('question' => $question, 'solutions' => $solutions, 'count' => $count));
                $count++;
            }
           $this->load->view('back/daycare/quiz_edit_down', $data);
            $this->load->view('back/footer_view', $data); 
          
        }else 
        {
            redirect(base_url().'login');
        } 

	}
    
}
?>