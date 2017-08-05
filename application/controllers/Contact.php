<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        //$this->load->model(array('Period_model'));
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
        //$this->load->helper('server_root');
        //$this->removeCache();
    }
    function index()
    {

        $data['title'] = 'Contact Us';    
        $data['active'] = 'contact';

        $this->load->view('front/header_view', $data);
        //$this->load->view('front/nav_view', $data);
        $this->load->view('front/contact_view', $data);
        $this->load->view('front/footer_view', $data); 
        

    }

    function request()
    {

        if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
        {

             //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
                                    
            $this->form_validation->set_rules('messageCon','Message','required|trim|xss_clean|max_length[450]');
            $this->form_validation->set_rules('nameCon','Name','required|trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('emailCon', 'E-mail', 'required|trim|valid_email|xss_clean');
            //$this->form_validation->set_rules('phoneCon','Phone','required|trim|is_natural');
           
            //$this->form_validation->set_rules('phone','Phone Number','required|trim|xss_clean|is_natural');
           
            //$this->form_validation->set_rules('presidents','End Date','required|trim|xss_clean');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            //$id_university = $this->session->userdata('id_university');
          
            if($this->form_validation->run()==FALSE)
            {
                $this->index('contact');
            }else{
                //EN CASO CONTRARIO PROCESAMOS LOS DATOS
                $name = $this->input->post('nameCon');               
                $message = $this->input->post('messageCon');
                $email = $this->input->post('emailCon');
           


                                  
                //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
            
                //$id_university = $this->Login_model->new_university($university,$address);

                // EMAIL

                //cargamos la libreria email de ci
                    /*$this->load->library("email");
             
                    //configuracion para gmail
                    $configGmail = array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.gmail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'joeluisrr@gmail.com',
                        //eli7diaz@gmail.com
                        'smtp_pass' => 'jlrr18054162',
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'newline' => "\r\n"
                    );    
             
                    //cargamos la configuración para enviar con gmail
                    $this->email->initialize($configGmail);
             
                    $this->email->from($email);
                    $this->email->to('joeluisrr@gmail.com');
                    $this->email->subject('playerpasslist.com');
                    $this->email->message('<div>
                                            <h2    style="text-align:center;">
                                            Contact Message
                                            </h2>
                                            <hr>
                                            <br>
                                            <span style="font-size:14px;">Name:&nbsp;&nbsp;'.$name.'</span><br>
                                            <span style="font-size:14px;">Phone:&nbsp;&nbsp;'.$phone.'</span><br>
                                            <span style="font-size:14px;">Email:&nbsp;&nbsp;'.$email.'</span><br> <br>
                                            <span style="font-size:14px;">Message:&nbsp;&nbsp;'.$message.'</span><br>
                                          </div>');
                    $this->email->send();*/
                    //con esto podemos ver el resultado
                    //var_dump($this->email->print_debugger());

                    $this->load->library("email");

                    $configGmail = array(
                        'protocol' => 'mail',
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'newline' => "\r\n"
                    );  

                    $this->email->initialize($configGmail);
                   

                    $this->email->from($email);
                    $this->email->to('joeluisrr@gmail.com'); 
                    //$this->email->cc('another@another-example.com'); 
                    //$this->email->bcc('them@their-example.com'); 

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

                //var_dump($this->email->print_debugger());
                redirect(base_url().'contact');
            }
       
        }else {echo "Wrong way!!!";}
    

    }






}