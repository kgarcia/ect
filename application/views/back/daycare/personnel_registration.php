 <?php
    $email = array('type' => 'email','name' => 'email','id' => 'email', 'placeholder' => "E-mail", 'class' => 'form-control login-email');
    $password = array('name' => 'password', 'id' => 'password', 'type'=>'password', 'placeholder' => 'Enter your password', 'class' => 'form-control login-password');
    $submit = array('name' => 'submit', 'value' => 'Log In', 'title' => 'Log In', 'type' => 'submit',  'class' => 'btn btn-block btn-cta-primary');
    $reset = array('name' => 'reset', 'value' => 'Cancel', 'title' => 'clear', 'class' => 'btn btn-lg btn-login btn-block');
    $submit2 = array('name' => 'submit', 'value' => 'Register', 'title' => 'Sign in', 'class' => 'btn btn-main featured');
    $reset2 = array('name' => 'reset', 'value' => 'Cancel', 'title' => 'clear', 'class' => 'btn btn-main featured');

    $name = array('type' => 'text','name' => 'name','id' => 'name', 'placeholder' => 'Name', 'class' => 'form-control login-email');
    $address = array('type' => 'text','name' => 'address','id' => 'address', 'placeholder' => 'Address', 'class' => 'form-control login-email');
    $job = array('type' => 'text','name' => 'job','id' => 'job', 'placeholder' => 'Job', 'class' => 'form-control login-email');
    $phone = array('type' => 'text','name' => 'phone','id' => 'phone', 'placeholder' => 'Phone', 'class' => 'form-control login-email');
    $birthdate = array('type' => 'date','name' => 'birthdate','id' => 'birthdate', 'placeholder' => 'Birthdate', 'class' => 'form-control login-email');
    $gender = array('type' => 'text','name' => 'gender','id' => 'gender', 'placeholder' => 'Gender', 'class' => 'form-control login-email');
    $position = array('type' => 'text','name' => 'position','id' => 'position', 'placeholder' => 'Position', 'class' => 'form-control login-email');
    $hired = array('type' => 'date','name' => 'hired','id' => 'hired', 'placeholder' => 'hired', 'class' => 'form-control login-email');
    $responsability = array('type' => 'date','name' => 'responsability','id' => 'responsability', 'placeholder' => 'responsability', 'class' => 'form-control login-email');

    $toForm = array('class' => 'login-form');
    $toForm2 = array('class' => 'subscription-form mailchimp');
    $submit3 = array('name' => 'submit', 'value' => 'Submit Now', 'title' => 'Submit Now', 'class' => 'btn btn-main featured');

    //$registrarse = array('name' => 'button', 'value' => 'Registrarse', 'title' => 'Registrarse')
    ?>
        <!-- ******Signup Section****** --> 
        <section class="signup-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                            <h2 class="title text-center">Employee Registration</h2>                 
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-12" align="center">
                                    <?=form_open(base_url().'daycare/create_employee', $toForm)?>
                                        <div class="form-group">
                                            <?=form_error('name')?>
                                            <label class="sr-only" for="name">Name</label>
                                            <?=form_input($name)?>
                                        </div>
                                        	<div class="form-group">

 									<label class="sr-only" >Category</label>
 									<?php echo form_error('role'); ?>
 									<select class="form-control" name="rol" id="rol">

					                  <option>Select a Role</option>

					                  
					                    <option value="3">Director</option>
					                    <option value="5">Employee</option>
					                                 
					                </select> 

					            </div>
                                        <div class="form-group">
                                            <?=form_error('email')?>
                                            <label class="sr-only" for="email">Email</label>
                                            <?=form_input($email)?>
                                        </div>
                                        <div class="form-group">
                                            <?=form_error('address')?>
                                            <label class="sr-only" for="address">Address</label>
                                            <?=form_input($address)?>
                                        </div>
                                        <div class="form-group">
                                            <?=form_error('address')?>
                                            <label class="sr-only" for="address">Address</label>
                                            <?=form_input($job)?>
                                        </div>
                                        <div class="form-group">
                                            <?=form_error('phone')?>
                                            <label class="sr-only" for="phone">phone</label>
                                            <?=form_input($phone)?>
                                        </div>
                                        <div class="form-group">
                                            <?=form_error('position')?>
                                            <label class="sr-only" for="Gender">Gender</label>
                                           <select name="gender" class="form-control login-email">
                                            <option value="Male" selected="selected">Male</option>
                                            <option value="Female">Female</option>
                                            <!-----Displaying fetched cities in options using foreach loop 
                                            <?/*php foreach($employee_types as $type):?>
                                            <option value="<?//php echo $type->id_employee_types ?>"><?php echo $type->name?></option>
                                            <?//php endforeach;*/?>---->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <?=form_error('birthdate')?>
                                            <label class="sr-only" for="birthdate">Birthdate</label>
                                            <span class="pull-left">Birthdate:</span>
                                            <?=form_input($birthdate)?>
                                        </div>                                        
                                        
                                        <div class="form-group">
                                            <?=form_error('hired')?>
                                            <label class="sr-only" for="hired">Hire Date</label>
                                            <span class="pull-left">Hire date:</span>
                                            <?=form_input($hired)?>
                                        </div>
                                        <div class="form-group">
                                            <?=form_error('responsability')?>
                                            <label class="sr-only" for="responsability">Responsability date</label>
                                            <span class="pull-left">Responsability Date:</span>
                                            <?=form_input($responsability)?>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-block btn-cta-primary">Save</button>  
                                    <?=form_close()?>
                                </div><!--//form-container-->
                            </div><!--//row-->
                        </div><!--//form-box-inner-->
                    </div><!--//form-box-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//signup-section-->
   