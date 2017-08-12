 <div class="headline-bg contact-headline-bg">
        </div><!--//headline-bg-->
<section class="signup-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                            <h2 class="title text-center">Sign up now</h2>  
                            <div class="text-center"><spam class="intro text-center">It only takes 5 minutes! <br> <br></spam></div> 
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-12" align="center">
                                 <!--<form class="signup-form"> -->
                                 <?php $attributes = array('class' => 'signup-form'); ?>
                                 <?php echo form_open_multipart(base_url().'signup/create_subscription', $attributes) ?>
                                 
                                  
                                      <div class="form-group">
                                          <?php echo form_error('name'); ?> 
                                          <label class="sr-only" >Name of the Daycare</label>
                                          <input type="text" name="name" class="form-control login-email" placeholder="Name of the Daycare" value="<?=set_value('name')?>">
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
                                            <input type="text" name="phone" class=" txtboxToFilter form-control login-email" placeholder="Phone Number" value="<?=set_value('phone')?>">
                                        </div>

                                        <div class="form-group">
                                        <?php echo form_error('children'); ?>
                                            <label class="sr-only" >Number of children</label>
                                            <input type="number" name="children" min="0" class="form-control login-email " placeholder="Number of Children" value="<?=set_value('children')?>">
                                        </div>

                                        <div class="form-group">
                                        <?php echo form_error('owner'); ?>
                                            <label class="sr-only" >Owner</label>
                                            <input type="text" name="owner" class="form-control login-email" placeholder="Owner" value="<?=set_value('owner')?>">
                                        </div>

                                        <div class="form-group">
                                        <?php echo form_error('email'); ?>
                                            <label class="sr-only" for="signup-email">Your email</label>
                                            <input id="signup-email" name="email" type="email" class="form-control " placeholder="Your email" value="<?=set_value('email')?>">
                                        </div>

                                        <input type="hidden" name="grabar" value="si"/>

                                        <button type="submit" class="btn btn-block btn-cta-primary">Sign up</button>
                                        <p class="note">By signing up, you agree to our terms of services and privacy policy.</p>
                                        <p class="lead">Already have an account? <a class="login-link" id="login-link" href="<?=base_url().'login'?>">Log in</a></p>
                                    </form>
                                </div><!--//form-container-->
                            </div><!--//row-->
                        </div><!--//form-box-inner-->
                    </div><!--//form-box-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//signup-section-->
    <!--//upper-wrapper-->

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
