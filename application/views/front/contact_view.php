 <?php

 $toForm2 = array('class' => 'contact-form', 'id' => 'contact-form');
 $submit3 = array('name' => 'submit', 'value' => 'Send Message', 'title' => 'Send Message', 'class' => 'btn btn-block btn-cta btn-cta-primary', 'type' => 'submit');

 ?>
 <div class="headline-bg contact-headline-bg">
        </div><!--//headline-bg-->

        
        <!-- ******Contact Section****** --> 
        <section class="contact-section section section-on-bg">
            <div class="container">
                <h2 class="title text-center">Contact Us</h2>
                <p class="intro text-center">We would love to hear from you. Because your opinion is important to us.</p> 
                <?=form_open_multipart(base_url().'contact/request', $toForm2)?>                   
                    <div class="row text-center">
                        <div class="contact-form-inner col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">
                            <div class="row">                                                           
                                
                                <div class="form-group col-xs-12 col-sm-6">
                                <?php echo form_error('nameCon'); ?>
                                    <label class="sr-only" for="nameCon">Your name</label>
                                    <input type="text" class="form-control" value = "<?php echo set_value('nameCon'); ?>" id="nameCon" name="nameCon" placeholder="Your name" minlength="2" required>
                                </div> 
  



                                <div class="form-group col-xs-12 col-sm-6">
                                <?php echo form_error('emailCon'); ?>
                                    <label class="sr-only" for="emailCon">Email address</label>
                                    <input type="email" class="form-control" value="<?php echo set_value('emailCon'); ?>" id="emailCon" name="emailCon" placeholder="Your email address" required>
                                </div>


                                <div class="form-group col-xs-12">
                                <?php echo form_error('messageCon'); ?>
                                    <label class="sr-only" for="messageCon">Your message</label>
                                    <textarea class="form-control" id="messageCon" name="messageCon" placeholder="Enter your message" rows="12" required><?php echo set_value('messageCon');?></textarea>
                                </div>


                                 <div class="form-group col-xs-12">
                                 <input type="hidden" name="grabar" value="si"/>
                                    <?=form_submit($submit3)?>
                                </div>    

                            </div><!--//row-->
                        </div>
                    </div><!--//row-->

                    <div id="form-messages"></div>
                <?=form_close()?>
            </div><!--//container-->
        </section><!--//contact-section-->      
        
        
        <!-- ******Other Contact Section****** --> 
        <section class="contact-other-section section">
            <div class="container text-center">
                <h2 class="title">Other ways to reach us</h2>
                <p class="intro">You can also get in touch by the following means. </p>
                <div class="row">
                    <ul class="other-info list-unstyled col-md-6 col-sm-10 col-xs-12 col-md-offset-3 col-sm-offset-1 xs-offset-0" >
                        <li><i class="fa fa-envelope-o"></i><a href="#">Daycare@daycare.com</a></li>
                        <li><i class="fa fa-twitter"></i><a href="https://twitter.com/3rdwave_media" target="_blank">@Day_Care</a></li>
                        <li><i class="fa fa-phone"></i><a href="tel:+0800123456">0800 123 456</a></li>
                        <li><i class="fa fa-map-marker"></i>Queen Square <br /> 56 College Green Road<br />BS1 XR18<br />Bristol<br />UK</li>
                    </ul>
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//contact-other-section-->

    