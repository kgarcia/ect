<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model(array('front/Signup_model'));
        $this->load->library(array('form_validation','encryption2'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
       
        //$this->load->helper('server_root');
        //$this->removeCache();
    }
    function index()
    {

        $data['title'] = 'Sign Up';    
        $data['active'] = 'signup';

        $this->load->view('front/header_view', $data);
        //$this->load->view('front/nav_view', $data);
        $this->load->view('front/signup_view', $data);
        $this->load->view('front/footer_view', $data); 
        

    }

    function fill_sub()
    {
       $type = $this->input->post('type');

       if ( $type == 1) {

        echo '<div class="form-group">'.
              form_error("name").'
            <label class="sr-only" >Name of the Agency</label>
            <input type="text" name="name" class="form-control login-email" placeholder="Name of the Agency" value="'.set_value("name").'">
        </div>
        <div class="form-group">'.
       form_error("address").'
            <label class="sr-only" >Address</label>
            <input type="text" name="address" class="form-control login-email" placeholder="Address" value="'.set_value("address").'">
        </div>

        <div class="form-group">'.
        form_error("director").'
            <label class="sr-only" >Name of Director</label>
            <input type="text" name="director" class="form-control login-email" placeholder="Name of Director" value="'.set_value("director").'">
        </div>
        <div class="form-group">'.
        form_error("phone").'
            <label class="sr-only" >Phone Number</label>
            <input type="text" name="phone" class="form-control login-email txtboxToFilter" placeholder="Phone Number" value="'.set_value("phone").'">
        </div>
        <div class="form-group">'.
        form_error("email").'
            <label class="sr-only" for="signup-email">Your email</label>
            <input id="signup-email" name="email" type="email" class="form-control " placeholder="Your email" value="'.set_value("email").'">
        </div>
        <input type="hidden" name="grabar" value="si"/>
        <input type="hidden" name="ty" value="'.$type.'"/>
        <button type="submit" class="btn btn-block btn-cta-primary">Sign up</button>
        <p class="note">By signing up, you agree to our terms of services and privacy policy.</p>
        <p class="lead">Already have an account? <a class="login-link" id="login-link" href="'.base_url().'login'.'">Log in</a></p>
         <script language="JavaScript" type="text/javascript">

        
                 $(".txtboxToFilter").keydown(function (e) {
                                              // Allow: backspace, delete, tab, escape, :, enter and .
                                              if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110,187,189, 190, 58]) !== -1 ||
                                                   // Allow: Ctrl+A, Command+A
                                                  (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
                                                   // Allow: home, end, left, right, down, up
                                                  (e.keyCode >= 35 && e.keyCode <= 40)) {
                                                       
                                                       return;
                                              }
                                              // Ensure that it is a number and stop the keypress
                                              if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                                  e.preventDefault();
                                              }
                                          });

                




            </script>';




           
       }elseif ($type == 2) {

        echo '<div class="form-group">'.
              form_error("name").'
            <label class="sr-only" >Name of the Daycare</label>
            <input type="text" name="name" class="form-control login-email" placeholder="Name of the Daycare" value="'.set_value("name").'">
        </div>
        <div class="form-group">'.
       form_error("address").'
            <label class="sr-only" >Address</label>
            <input type="text" name="address" class="form-control login-email" placeholder="Address" value="'.set_value("address").'">
        </div>

        <div class="form-group">'.
        form_error("dirname").'
            <label class="sr-only" >Name of Director</label>
            <input type="text" name="dirname" class="form-control login-email" placeholder="Name of Director" value="'.set_value("dirname").'">
        </div>
        <div class="form-group">'.
        form_error("phone").'
            <label class="sr-only" >Phone Number</label>
            <input type="text" name="phone" class="form-control login-email txtboxToFilter" placeholder="Phone Number" value="'.set_value("phone").'">
        </div>
        <div class="form-group">'.
        form_error("children").'
            <label class="sr-only" >Number of Employees</label>
            <input type="number" name="children" min="2" class="form-control login-email " placeholder="Number of Employees" value="'.set_value("children").'">
        </div>

        <div class="form-group">'.
        form_error("owner").'
            <label class="sr-only" >Owner</label>
            <input type="text" name="owner" class="form-control login-email" placeholder="Owner" value="'.set_value("owner").'">
        </div>
        <div class="form-group">'.
        form_error("email").'
            <label class="sr-only" for="signup-email">Your email</label>
            <input id="signup-email" name="email" type="email" class="form-control " placeholder="Your email" value="'.set_value("email").'">
        </div>
        <input type="hidden" name="grabar" value="si"/>
             <input type="hidden" name="ty" value="'.$type.'"/>
        <button type="submit" class="btn btn-block btn-cta-primary">Sign up</button>
        <p class="note">By signing up, you agree to our terms of services and privacy policy.</p>
        <p class="lead">Already have an account? <a class="login-link" id="login-link" href="'.base_url().'login'.'">Log in</a></p>

        <script language="JavaScript" type="text/javascript">

        
                 $(".txtboxToFilter").keydown(function (e) {
                                              // Allow: backspace, delete, tab, escape, :, enter and .
                                              if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110,187,189, 190, 58]) !== -1 ||
                                                   // Allow: Ctrl+A, Command+A
                                                  (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
                                                   // Allow: home, end, left, right, down, up
                                                  (e.keyCode >= 35 && e.keyCode <= 40)) {
                                                       
                                                       return;
                                              }
                                              // Ensure that it is a number and stop the keypress
                                              if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                                  e.preventDefault();
                                              }
                                          });

                




            </script>

        ';



           
       }elseif ($type == 3) {




        echo '
         <div class="form-group">'.
              form_error("name").'
            <label class="sr-only" >Name</label>
            <input type="text" name="name" class="form-control login-email" placeholder="Name" value="'.set_value("name").'">
        </div>
        <div class="form-group">'.
       form_error("address").'
            <label class="sr-only" >Address</label>
            <input type="text" name="address" class="form-control login-email" placeholder="Address" value="'.set_value("address").'">
        </div>

        <div class="form-group">'.
        form_error("birthdate").'
            <label class="sr-only" >Date of birth</label>
            <input id="datepicker" type="text" name="birthdate" class="form-control login-email" placeholder="Date of birth" value="'.set_value("birthdate").'">
        </div>

        <div class="form-group">'.
        form_error("phone").'
            <label class="sr-only" >Phone Number</label>
            <input type="text" name="phone" class="form-control login-email txtboxToFilter" placeholder="Phone Number" value="'.set_value("phone").'">
        </div>

        <div class="form-group">'.

        form_error("gender").'

         <select class="form-control" name="gender" id="gender">
            <option value="-1">
               Select Gender
            </option> 
             <option value="1">
                Male
                </option>  
            <option value="0">
                Female
            </option> 
         </select>
         </div>

        <div class="form-group">'.
        form_error("email").'
            <label class="sr-only" for="signup-email">Your email</label>
            <input id="signup-email" name="email" type="email" class="form-control " placeholder="Your email" value="'.set_value("email").'">
        </div>
        <input type="hidden" name="grabar" value="si"/>
             <input type="hidden" name="ty" value="'.$type.'"/>
        <button type="submit" class="btn btn-block btn-cta-primary">Sign up</button>
        <p class="note">By signing up, you agree to our terms of services and privacy policy.</p>
        <p class="lead">Already have an account? <a class="login-link" id="login-link" href="'.base_url().'login'.'">Log in</a></p>

        <script language="JavaScript" type="text/javascript">

        
                 $(".txtboxToFilter").keydown(function (e) {
                                              // Allow: backspace, delete, tab, escape, :, enter and .
                                              if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110,187,189, 190, 58]) !== -1 ||
                                                   // Allow: Ctrl+A, Command+A
                                                  (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
                                                   // Allow: home, end, left, right, down, up
                                                  (e.keyCode >= 35 && e.keyCode <= 40)) {
                                                       
                                                       return;
                                              }
                                              // Ensure that it is a number and stop the keypress
                                              if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                                  e.preventDefault();
                                              }
                                          });

                            $("#datepicker").datepicker({
                                dateFormat: "mm/dd/yy",
                                maxDate:  "01/31/1997"
                            });

       

                




            </script>

        ';
          

       }

    }

    function create_subscription()

    {

        if(isset($_POST['grabar']) and $_POST['grabar'] == 'si' and $_POST['ty'] == 1)
        {

            //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
                                    
            $this->form_validation->set_rules('name','Name','required|trim|max_length[250]');
             $this->form_validation->set_rules('phone','Phone Number','required|trim|max_length[45]');
              $this->form_validation->set_rules('address','Address','required|trim|max_length[250]');
                $this->form_validation->set_rules('director','Director','required|trim|max_length[250]');
                 
                  $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[users.email]');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

          
          
            if($this->form_validation->run()==FALSE)
            {
                $this->index();
            }else{
                
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $director = $this->input->post('director');
                $email = $this->input->post('email');
                $password = substr( md5(microtime()), 1, 4);
                $pw = md5($password); $id_rol = 2;
                


                                        
                //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
                //$id_user = $this->Signup_model->new_user($email,$pw,$id_rol);
                //$id_agency = $this->Signup_model->new_agency($name,$phone,$address,$director,$id_user);

                
                //redirect(base_url().'signup');
                 $data['title'] = 'Sign Up';    
                    $data['name'] = $name;
                    $data['phone'] = $phone;
                     $data['address'] = $address;
                      $data['director'] = $director;
                       $data['email'] = $email;
                       $data['type'] = $this->input->post('ty');
                       //$data['action'] = 'signup/create_daycare/';
                



                    $this->load->view('front/header_view', $data);
                    //$this->load->view('front/nav_view', $data);
                    $this->load->view('front/signup_pp_view', $data);
                    $this->load->view('front/footer_view', $data); 

                
        }

              // Tipo Daycare
        }elseif (isset($_POST['grabar']) and $_POST['grabar'] == 'si' and $_POST['ty'] == 2) {

             //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
                                    
            $this->form_validation->set_rules('name','Name','required|trim|max_length[250]');
             $this->form_validation->set_rules('phone','Phone Number','required|trim|max_length[45]');
              $this->form_validation->set_rules('address','Address','required|trim|max_length[250]');
                $this->form_validation->set_rules('dirname','Director','required|trim|max_length[250]');
                $this->form_validation->set_rules('children','Number of Children','required|trim|is_natural_no_zero');
                $this->form_validation->set_rules('owner','Owner','required|trim|max_length[250]');
                //$this->form_validation->set_rules('price',"Price",'required|callback_check_default3');
                 
                  $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[users.email]');
                  //$this->form_validation->set_message('check_default3', 'Please select a Plan'); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

          
          
            if($this->form_validation->run()==FALSE)
            {
                $this->index();
            }else{
                
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $director = $this->input->post('dirname');
                $children = $this->input->post('children');
                $owner = $this->input->post('owner');
                $email = $this->input->post('email');
                //$price = $this->input->post('price');
                $password = substr( md5(microtime()), 1, 4);
                $pw = md5($password);
                 $id_rol = 3;
                $type_emp = 1;

                if (($children >= 10) and ($children <= 19)) {

                                                          $amount = 10 * $children;

                                                          $description = '10$ per employee Plan';
                }elseif (($children >= 20) and ($children <= 35)) {



                                                    $amount = 9 * $children;

                                                    $description = '9$ per employee Plan';
                }elseif ($children >= 36) { 



                                                      $amount = 8 * $children;

                                                       $description = '8$ per employee Plan';
                }

                                                        

                $date = new DateTime();
        $date = $date->format('Y-m-d h:i:s');

        //Incrementando 1 mes
        $mod_dateold = strtotime($date."+ 1 month");
        $date_end = date("Y-m-d h:i:s",$mod_dateold);

                


                                        
                //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
                //$id_user = $this->Signup_model->new_user($email,$pw,$id_rol);
                //$id_agency = $this->Signup_model->new_agency($name,$phone,$address,$director,$id_user);

                
                //redirect(base_url().'signup');
                 $data['title'] = 'Sign Up';    
                    $data['name'] = $name;
                    $data['phone'] = $phone;
                     $data['address'] = $address;
                      $data['director'] = $director;
                       $data['children'] = $children;
                        $data['owner'] = $owner;
                       $data['email'] = $email;
                       $data['price'] = $price;
                       $data['type'] = $this->input->post('ty');

                       $this->session->set_userdata('a_type', $data['type']);
                       //$data['action'] = 'https://payflowlink.paypal.com';
                    
                    $id = $this->Signup_model->new_temp_day($email,$password,$id_rol,$name,$phone,$address,$children,$owner,$type_emp,$director,$description,$date_end,$amount);

                    


                    //$this->encrypt->decode(6, 'Test@123')
                    //$id_link = urlencode($id);
                    $this->load->library("email");

                              $configGmail = array(
                                  'protocol' => 'mail',
                                  'mailtype' => 'html',
                                  'charset' => 'utf-8',
                                  'newline' => "\r\n"
                              );  

                              $this->email->initialize($configGmail);
                             

                              $this->email->from('eli7diaz@gmail.com');
                              $this->email->to($email); 
                              //$this->email->cc('another@another-example.com'); 
                              //$this->email->bcc('them@their-example.com'); 
                              //$psswd = substr( md5(microtime()), 1, 4);
                          
                              $this->email->subject('Verification Email from stafftrainingcompliance.com');
                              $this->email->message('<div>
                                            <h2    style="text-align:center;">
                                            Hi there '.$name.'. Please click the link below to verify your registration.

                                            </h2>
                                            <hr>
                                            <br>
                                            <a style="font-size:17px;" href="'.base_url().'signup/create_pp_subscription_day/'.$this->encryption2->encode($id).'">Click here</a><br> <br>
                                            
                                            
                                          </div>');  

                              $this->email->send();

                  



                    $this->load->view('front/header_view', $data); 
                    //$this->load->view('front/nav_view', $data);
                    $this->load->view('front/verify_email_view', $data);
                    $this->load->view('front/footer_view', $data); 



                
        }




         // Tipo empleado
        }elseif (isset($_POST['grabar']) and $_POST['grabar'] == 'si' and $_POST['ty'] == 3) {


                //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
                                    
            $this->form_validation->set_rules('name','Name','required|trim|max_length[250]');
             $this->form_validation->set_rules('phone','Phone Number','required|trim|max_length[45]');
              $this->form_validation->set_rules('address','Address','required|trim|max_length[250]');
                $this->form_validation->set_rules('birthdate','Date of birth','required|trim|max_length[45]');
                  $this->form_validation->set_rules('gender',"Gender",'required|callback_check_default2');
                 //   $this->form_validation->set_rules('price',"Price",'required|callback_check_default3'); 

                 
                  $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[users.email]');
     //   $this->form_validation->set_message('check_default3', 'Please select a Plan'); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->form_validation->set_message('check_default2', 'Please select a Gender');
          
          
            if($this->form_validation->run()==FALSE)
            {
                $this->index();
            }else{

                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $birthdate = $this->input->post('birthdate');
                $gender = $this->input->post('gender');
                $email = $this->input->post('email');
            //    $price = $this->input->post('price');


$password = substr( md5(microtime()), 1, 4);
                $pw = md5($password);
                $type_emp = 2;
$id_rol = 5;

$date = new DateTime();
        $date = $date->format('Y-m-d h:i:s');

        //Incrementando 1 mes
        $mod_dateold = strtotime($date."+ 1 month");
        $date_end = date("Y-m-d h:i:s",$mod_dateold);

                $amount = 7.99;

                                              $description = '7.99$ solo employee Plan';
                $date = new DateTime($birthdate);
                $bdate =$date->format('Y-m-d');


                
                 $data['title'] = 'Sign Up';    
                    $data['name'] = $name;
                    $data['phone'] = $phone;
                     $data['address'] = $address;
                      $data['birthdate'] = $bdate;
                       $data['gender'] = $gender;
                       $data['email'] = $email;
                        $data['price'] = $price;

                       $data['type'] = $this->input->post('ty');
                       //$data['action'] = 'https://payflowlink.paypal.com';
                $this->session->set_userdata('a_type', $data['type']);
                       //$data['action'] = 'https://payflowlink.paypal.com';
                    
                    $id = $this->Signup_model->new_temp_emp($email,$password,$id_rol,$name,$phone,$address,$bdate,$gender,$type_emp,$description,$date_end,$amount);

                    //$id_link = urlencode($id);
                        $this->load->library("email");

                              $configGmail = array(
                                  'protocol' => 'mail',
                                  'mailtype' => 'html',
                                  'charset' => 'utf-8',
                                  'newline' => "\r\n"
                              );  

                              $this->email->initialize($configGmail);
                             

                              $this->email->from('eli7diaz@gmail.com');
                              $this->email->to($email); 
                              //$this->email->cc('another@another-example.com'); 
                              //$this->email->bcc('them@their-example.com'); 
                              //$psswd = substr( md5(microtime()), 1, 4);
                          
                              $this->email->subject('Verification Email');
                              $this->email->message('<div>
                                            <h2    style="text-align:center;">
                                            Hi there '.$name.'. Please click the link below to verify your registration.

                                            </h2>
                                            <hr>
                                            <br>
                                            <a style="font-size:17px;" href="'.base_url().'signup/create_pp_subscription_emp/'.$this->encryption2->encode($id).'">Click here</a><br> <br>
                                            
                                            
                                          </div>');  

                            $this->email->send();


                    $this->load->view('front/header_view', $data);
                    //$this->load->view('front/nav_view', $data);
                    $this->load->view('front/verify_email_view', $data);
                    $this->load->view('front/footer_view', $data); 

                
        }


            
         
        }

    }

     function create_pp_subscription_day($id_link)

    {
     

            //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
      
      //$id_sub = urldecode($id);
      //
      //
     $id = $this->encryption2->decode($id_link);

      $row = $this->Signup_model->get_temp_day($id); 

      if ($row->status == 1) {
        
      

      

              // inspect IPN validation result and act accordingly
                        

                      $pw = md5($row->password);

                                                
                        //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
                        $id_user = $this->Signup_model->new_user($row->email,$pw,$row->id_rol);
                        $id_daycare = $this->Signup_model->new_daycare($row->name,$row->phone,$row->address,$row->children,$row->owner);
                        $id_administrator = $this->Signup_model->new_administrator($id_daycare,$id_user,$row->type_emp,$row->dirname);
                        $id_subscription = $this->Signup_model->new_subscription($id_administrator,$id_daycare,$row->description,$row->date_end,$row->price);
                        $this->Signup_model->update_sub_day($id);
                         if ($id_daycare != Null) {

                              $this->load->library("email");

                              
                              $configGmail2 = array(
                                  'protocol' => 'mail',
                                  'mailtype' => 'html',
                                  'charset' => 'utf-8',
                                  'newline' => "\r\n"
                              );  

                              $this->email->initialize($configGmail2);
                             

                              $this->email->from('eli7diaz@gmail.com');
                              $this->email->to('eli7diaz@gmail.com'); 
                              //$this->email->cc('another@another-example.com'); 
                              //$this->email->bcc('them@their-example.com'); 
                              //$psswd = substr( md5(microtime()), 1, 4);
                          
                              $this->email->subject('User Data Registration from STC');
                              $this->email->message('<div>
                                            <h2    style="text-align:center;">
                                            User Data Registration
                                            </h2>
                                            <hr>
                                            <br>
                                             <span style="font-size:17px;">Institution:&nbsp;&nbsp;'.$row->name.'</span><br> <br>
                                            <span style="font-size:17px;">User Id:&nbsp;&nbsp;'.$id_user.'</span><br> <br>
                                            <span style="font-size:17px;">User Email:&nbsp;&nbsp;'.$row->email.'</span><br> <br>
                                             <span style="font-size:17px;">Staff members:&nbsp;&nbsp;'.$row->children.'</span><br> <br>
                                            <span style="font-size:17px;">Amount:&nbsp;&nbsp;'.$row->price.' $ Monthly</span><br> <br>
                                            
                                            
                                          </div>');
                              $this->email->send();

                              $this->email->clear();
                             

                              $this->email->from('eli7diaz@gmail.com');
                              $this->email->to($row->email); 
                              //$this->email->cc('another@another-example.com'); 
                              //$this->email->bcc('them@their-example.com'); 
                              $psswd = substr( md5(microtime()), 1, 4);
                          
                              $this->email->subject('User Credentials');
                              $this->email->message('<div>
                                            <h2    style="text-align:center;">
                                            Welcome '.$row->name.'.Your account has been created. Once you complete the payment you can use this information to Log In stafftrainingcompliance.com
                                            </h2>
                                            <hr>
                                            <br>
                                            <span style="font-size:17px;">Email:&nbsp;&nbsp;'.$row->email.'</span><br> <br>
                                            <span style="font-size:17px;">Password:&nbsp;&nbsp;'.$row->password.'</span><br><br><br>
                                            <span style="font-size:14px;">Once you get into the application you can change your password</span><br>
                                          </div>');  

                    if ($this->email->send()) {
                        // This becomes triggered when sending
                        echo '<script type="text/javascript">'; 
                                echo 'alert("Successful Registration, Check Your E-mail To See the information (This may take a few minutes).");'; 
                                echo 'window.location.href = "'.base_url().'";';
                                echo '</script>';
                    }else{
                        echo '<script type="text/javascript">'; 
                                echo 'alert("Successful Registration, Your Log In Information E-mail Could not be sent, Please Contact Us.");'; 
                                echo 'window.location.href = "'.base_url().'contact";';
                                echo '</script>';
                    }
                                                    
                        



                  }

          }else {

            echo '<script type="text/javascript">'; 
                                echo 'alert("This link was already used");'; 
                                echo 'window.location.href = "'.base_url().'";';
                                echo '</script>';
          
          }
        

    }

     function create_pp_subscription_emp($id_link)

    {
     

            //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
      
      $id = $this->encryption2->decode($id_link);
      $row = $this->Signup_model->get_temp_emp($id);

              
           
      if ($row->status == 1) {       
                 



                    
                    $id_daycare = null;
                    

                   
                      $pw = md5($row->password);
                                            
                    //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
                    $id_user = $this->Signup_model->new_user($row->email,$pw,$row->id_rol);
                    $id_employee = $this->Signup_model->new_employee($id_user,$row->type_emp,$row->name,$row->phone,$row->address,$row->birthdate,$row->gender);
                    $id_subscription = $this->Signup_model->new_subscription($id_employee,$id_daycare,$row->description,$row->date_end,$row->price);



                 if ($id_employee != Null) {

                        $this->load->library("email");


                              
                              $configGmail2 = array(
                                  'protocol' => 'mail',
                                  'mailtype' => 'html',
                                  'charset' => 'utf-8',
                                  'newline' => "\r\n"
                              );  

                              $this->email->initialize($configGmail2);
                             

                              $this->email->from('eli7diaz@gmail.com');
                              $this->email->to('eli7diaz@gmail.com'); 
                              //$this->email->cc('another@another-example.com'); 
                              //$this->email->bcc('them@their-example.com'); 
                              //$psswd = substr( md5(microtime()), 1, 4);
                          
                              $this->email->subject('User Data Registration from STC');
                              $this->email->message('<div>
                                            <h2    style="text-align:center;">
                                            User Data Registration
                                            </h2>
                                            <hr>
                                            <br>
                                             <span style="font-size:17px;">Staff member (solo employee):&nbsp;&nbsp;'.$row->name.'</span><br> <br>
                                            <span style="font-size:17px;">User Id:&nbsp;&nbsp;'.$id_user.'</span><br> <br>
                                            <span style="font-size:17px;">User Email:&nbsp;&nbsp;'.$row->email.'</span><br> <br>
                                            <span style="font-size:17px;">Amount:&nbsp;&nbsp;'.$row->price.' $ Monthly</span><br> <br>
                                            
                                            
                                          </div>');
                              $this->email->send();  

                              $this->email->clear();
                             

                              $this->email->from('eli7diaz@gmail.com');
                              $this->email->to($row->email); 
                              //$this->email->cc('another@another-example.com'); 
                              //$this->email->bcc('them@their-example.com'); 
                              //$psswd = substr( md5(microtime()), 1, 4);
                          
                              $this->email->subject('User Credentials');
                              $this->email->message('<div>
                                            <h2    style="text-align:center;">
                                            Welcome '.$row->name.'.Your account has been created. Once you complete the payment you can use this information to Log In stafftrainingcompliance.com
                                            </h2>
                                            <hr>
                                            <br>
                                            <span style="font-size:17px;">Email:&nbsp;&nbsp;'.$row->email.'</span><br> <br>
                                            <span style="font-size:17px;">Password:&nbsp;&nbsp;'.$row->password.'</span><br><br><br>
                                            <span style="font-size:14px;">Once you get into the application you can change your password</span><br>
                                          </div>');  

                    if ($this->email->send()) {
                        // This becomes triggered when sending
                        echo '<script type="text/javascript">'; 
                                echo 'alert("Successful Registration, Check Your E-mail To See the information (This may take a few minutes).");'; 
                                echo 'window.location.href = "'.base_url().'";';
                                echo '</script>';
                    }else{
                        echo '<script type="text/javascript">'; 
                                echo 'alert("Successful Registration, Your Log In Information E-mail Could not be sent, Please Contact Us.");'; 
                                echo 'window.location.href = "'.base_url().'contact";';
                                echo '</script>';
                    }
                          
                                            
                }
 }else {

            echo '<script type="text/javascript">'; 
                                echo 'alert("This link was already used");'; 
                                echo 'window.location.href = "'.base_url().'";';
                                echo '</script>';
          
          }


                    
                  



               

                
                
            
                

                
        


        

    }

    function check_default2($post_string)
    {
      return $post_string == '-1' ? FALSE : TRUE;
    }

    function check_default3($post_string)
    {
      return $post_string == '-1' ? FALSE : TRUE;
    }




}