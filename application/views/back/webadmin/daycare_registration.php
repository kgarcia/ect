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
<section class="signup-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                            <h2 class="title text-center">Sign up now</h2>  
                            <p class="intro text-center">It only takes 3 minutes!</p>               
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-12" align="center">
                                    <form class="signup-form"> 
                                        <div class="form-group">
                                            <label class="sr-only" >Name of the Centre</label>
                                            <input type="text" name="" class="form-control login-email" placeholder="Name of the Centre">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Address</label>
                                            <input type="text" name="" class="form-control login-email" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Number of Children</label>
                                            <input type="text" name="" class="form-control login-email" placeholder="Number of Children">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Date of Registration</label>
                                            <input type="text" name="" class="form-control login-email" placeholder="Date of Registration">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Listing of Certifications</label>
                                            <input type="text" name="" class="form-control login-email" placeholder="Listing of Certifications">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Number of Employee</label>
                                            <input type="text" name="" class="form-control login-email" placeholder="Number of Employee">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Owner</label>
                                            <input type="text" name="" class="form-control login-email" placeholder="Owner">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Name of Director</label>
                                            <input type="text" name="" class="form-control login-email" placeholder="Name of Director">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Phone Numbers</label>
                                            <input type="text" name="" class="form-control login-email" placeholder="Phone Numbers">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="signup-email">Your email</label>
                                            <?=form_input($email)?>
                                        </div><!--//form-group-->
                                        <div class="form-group">
                                                
                                            <input id="signup-password" type="password" class="form-control " placeholder="autogenerada">
                                        </div><!--//form-group-->
                                        <button type="submit" class="btn btn-block btn-cta-primary">Sign up</button>
                                        <p class="note">By signing up, you agree to our terms of services and privacy policy.</p>
                                        <p class="lead">Already have an account? <a class="login-link" id="login-link" href="login.html">Log in</a></p>  
                                    <?=form_close()?>
                                </div><!--//form-container-->
                            </div><!--//row-->
                        </div><!--//form-box-inner-->
                    </div><!--//form-box-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//signup-section-->
    </div><!--//upper-wrapper-->