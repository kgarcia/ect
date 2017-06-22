 <?php
    $email = array('type' => 'email','name' => 'email','id' => 'email', 'placeholder' => 'Enter your e-mail', 'class' => 'form-control login-email');
    $password = array('name' => 'password', 'id' => 'password', 'type'=>'password', 'placeholder' => 'Enter your password', 'class' => 'form-control login-password');
    $submit = array('name' => 'submit', 'value' => 'Log In', 'title' => 'Log In', 'type' => 'submit',  'class' => 'btn btn-block btn-cta-primary');
    $reset = array('name' => 'reset', 'value' => 'Cancel', 'title' => 'clear', 'class' => 'btn btn-lg btn-login btn-block');
    $submit2 = array('name' => 'submit', 'value' => 'Register', 'title' => 'Sign in', 'class' => 'btn btn-main featured');
    $reset2 = array('name' => 'reset', 'value' => 'Cancel', 'title' => 'clear', 'class' => 'btn btn-main featured');
    $toForm = array('class' => 'login-form');
    $toForm2 = array('class' => 'subscription-form mailchimp');
    $submit3 = array('name' => 'submit', 'value' => 'Submit Now', 'title' => 'Submit Now', 'class' => 'btn btn-main featured');

    //$registrarse = array('name' => 'button', 'value' => 'Registrarse', 'title' => 'Registrarse')
    ?>

<div class="headline-bg contact-headline-bg">
        </div><!--//headline-bg-->
<section class="login-section access-section section">
            <div class="container">
                <div class="row">
                
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8" align="center">     
                        <div class="form-box-inner">
                            <h2 class="title text-center">Log in to Child Care</h2>                 
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-12" align="center" >
                                    <?=form_open(base_url().'login/singin', $toForm)?>              
                                        <div class="form-group email">
                                            <?=form_error('email')?>
                                            <label class="sr-only" for="email">Email</label>
                                            
                                            <?=form_input($email)?>
                                        </div><!--//form-group-->
                                        <div class="form-group password">
                                            <?=form_error('password')?>
                                            <label class="sr-only" for="login-password">Password</label>
                                            
                                            <?=form_password($password)?> 
                                            <!--<p class="forgot-password"><a href="reset-password.html">Forgot password?</a></p>-->
                                        </div><!--//form-group  onclick="validate()"-->
                                        <?=form_hidden('token',$token)?><br>
                                        <?=form_submit($submit)?>
                                        <!--<button type="submit" class="btn btn-block btn-cta-primary" >Log in</button>-->
                                        <!--<div class="checkbox remember">
                                            <label>
                                                <input type="checkbox"> Remember me
                                            </label>
                                        </div><!--//checkbox-->
                                         <p class="lead">Don't have a Child Care account yet? <br /><a class="signup-link" href="<?=base_url().'signup'?>">Create your account now</a></p>  
                                    <?=form_close()?>

                                    <?php
      if($this->session->flashdata('incorrect_user'))
        {
       ?>
       <p><?=$this->session->flashdata('incorrect_user')?></p>
       <?php
        }
       ?>
                                </div><!--//form-container-->
                            </div><!--//row-->
                        </div><!--//form-box-inner-->
                    </div><!--//form-box-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//contact-section-->