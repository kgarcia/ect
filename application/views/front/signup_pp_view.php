  <div class="headline-bg contact-headline-bg">
        </div><!--//headline-bg-->
<section class="signup-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                            <h2 class="title text-center">Last Steps</h2>  
                            <p class="intro text-center">Follow the Steps Below Carefully</p>               
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-12" align="center">
                                 <!--<form class="signup-form"> -->
                                 <?php $attributes = array('class' => 'signup-form','target' => '_blank'); ?>
                                 <?php echo form_open_multipart($action, $attributes) ?>
                                        
                                        <div align="left">
                                        <ol>
                                        <li>Please Click "Subscribe" Button to Proceed to the Payment</li>
                                        <li>Then Click "Finish" Button to Complete your Registration</li>
                                        </ol>
                                        </div><br><br>
                                                               <input type="hidden" name="cmd" value="_s-xclick">
                                           <input type="hidden" name="hosted_button_id" value="NYZ26APQA9EC8">
                                           <input id="check" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                           <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

                                          




                                  <?php echo form_close();?>

                         
                                           
                                           <?=$this->session->set_userdata('a_name', $name);?>
                                           
                                           <?=$this->session->set_userdata('a_phone', $phone);?>
                                          
                                            <?=$this->session->set_userdata('a_address', $address);?>
                                           
                                           <?=$this->session->set_userdata('a_director', $director);?>

                                          <?=$this->session->set_userdata('a_email', $email);?>
                                  <br><br><br><div class="row">
                                  <div class="form-container col-xs-6 col-md-6" align="center">
                                    <a href="<?=base_url().'signup/create_pp_subscription'?>"><button id="sub" class="btn btn-block btn-cta-primary" disabled>Finish</button></a>
                                  </div>
                                  <div class="form-container col-xs-6 col-md-6" align="center">
                                    <a class="btn btn-block btn-cta-primary" href="#" onclick="window.history.back();">Back</a>
                                  </div>
                                </div>
                                <script language="JavaScript" type="text/javascript">
                                  $(function() {
                                    $("#check").on("click",function(e) {
                                     $("#sub").prop("disabled",false); // NOT a toggle



                                    });
                                  });
                                </script>


                                      
                          
                                </div><!--//form-container-->
                            </div><!--//row-->
                        </div><!--//form-box-inner-->
                    </div><!--//form-box-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//signup-section-->
    </div><!--//upper-wrapper-->