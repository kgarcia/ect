 <div class="headline-bg contact-headline-bg">
        </div><!--//headline-bg-->
<section class="signup-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                            <h2 class="title text-center">Sign up now</h2>  
                            <div class="text-center"><spam class="intro text-center">It only takes 5 minutes! <br> <br>Are You?<br></spam></div> 
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-12" align="center">
                                 <!--<form class="signup-form"> -->
                                 <?php $attributes = array('class' => 'signup-form'); ?>
                                 <?php echo form_open_multipart(base_url().'signup/create_subscription', $attributes) ?>
                                 <div class="form-group">
                                <!-- <div class="form-group">
                                 <label class="radio-inline input-lg">
                                      <input type="radio" name="inlineRadioOptions" id="age1" value="1"> Agency
                                    </label>-->
                                    <label class="radio-inline input-lg">
                                      <input type="radio" name="inlineRadioOptions" id="day2" value="2"> Daycare
                                    </label>
                                    <label class="radio-inline input-lg">
                                      <input type="radio" name="inlineRadioOptions" id="emp3" value="3"> Employee
                                        </label> 
                                    </div> <br><br>

                                   <div id="sub"> <?php echo form_error('name'); ?>
                                                    <?php echo form_error('address'); ?>
                                                    <?php echo form_error('director'); ?>
                                                    <?php echo form_error('phone'); ?>
                                                    <?php echo form_error('email'); ?>
                                                    <?php echo form_error('children'); ?>
                                                    <?php echo form_error('owner'); ?>
                                                    <?php echo form_error('birthdate'); ?>
                                                    <?php echo form_error('gender'); ?>
                                                    


                                                 <?php 
                                                    if ( form_error('name') || form_error('address') || form_error('director') ||   form_error('phone') ||  form_error('email') ||  form_error('children') ||  form_error('owner') || form_error('birthdate')  || form_error('gender') ) 
                                                { ?>
                                                       
                                                       <div class="alert alert-info">Please Select an option again</div>
                                               <?php } 
                                                ?>
                                                    
                                   </div>
                                  
                                        <!--<div class="form-group">
                                            <?php echo form_error('name'); ?>
                                            <label class="sr-only" >Name of the Agency</label>
                                            <input type="text" name="name" class="form-control login-email" placeholder="Name of the Agency" value="<?=set_value('name')?>">
                                        </div>
                                        <div class="form-group">
                                        <?php echo form_error('address'); ?>
                                            <label class="sr-only" >Address</label>
                                            <input type="text" name="address" class="form-control login-email" placeholder="Address" value="<?=set_value('address')?>">
                                        </div>

                                        <div class="form-group">
                                        <?php echo form_error('director'); ?>
                                            <label class="sr-only" >Name of Director</label>
                                            <input type="text" name="director" class="form-control login-email" placeholder="Name of Director" value="<?=set_value('director')?>">
                                        </div>
                                        <div class="form-group">
                                         <?php echo form_error('phone'); ?>
                                            <label class="sr-only" >Phone Number</label>
                                            <input type="text" name="phone" class="form-control login-email" placeholder="Phone Number" value="<?=set_value('phone')?>">
                                        </div>
                                        <div class="form-group">
                                        <?php echo form_error('email'); ?>
                                            <label class="sr-only" for="signup-email">Your email</label>
                                            <input id="signup-email" name="email" type="email" class="form-control " placeholder="Your email" value="<?=set_value('email')?>">
                                        </div>
                                        <input type="hidden" name="grabar" value="si"/>
                                        <button type="submit" class="btn btn-block btn-cta-primary">Sign up</button>
                                        <p class="note">By signing up, you agree to our terms of services and privacy policy.</p>
                                        <p class="lead">Already have an account? <a class="login-link" id="login-link" href="<?=base_url().'login'?>">Log in</a></p>-->  
                                    </form>
                                </div><!--//form-container-->
                            </div><!--//row-->
                        </div><!--//form-box-inner-->
                    </div><!--//form-box-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//signup-section-->
    </div><!--//upper-wrapper-->

    <script language="JavaScript" type="text/javascript">
                                                  
     $(document).ready(function() { 

      //$.ajaxPrefilter(function(options, originalOptions, jqXHR ) {
       //options.async = true; 

     //});

         $("#age1").click(function() {
                  age = $('#age1').val();
                  $.post("<?=base_url();?>signup/fill_sub", {
                   type : age
                  }, function(data) {
                    $("#sub").html(data);
                    // console.log(data);
                  }); 
              });

         $("#day2").click(function() {
                day = $('#day2').val();
                  $.post("<?=base_url();?>signup/fill_sub", {
                   type : day
                  }, function(data) {
                    
                    $("#sub").html(data);
                    // console.log(data);
                  }); 
              });

         $("#emp3").click(function() {
               emp  = $('#emp3').val();
                  $.post("<?=base_url();?>signup/fill_sub", {
                   type : emp
                  }, function(data) {
                    
                    $("#sub").html(data);
                    // console.log(data);
                  }); 
              });

         


                                         


     });
</script>