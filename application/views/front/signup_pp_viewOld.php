  <div class="headline-bg contact-headline-bg">
        </div><!--//headline-bg-->
<section class="signup-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                            <h2 class="title text-center">Subscription</h2>  
                            <p class="intro text-center">Please Click "Subscribe" Button to Proceed to the Payment</p>               
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-12" align="center">
                                 <!--<form class="signup-form"> -->
                                 <?php $attributes = array('class' => 'signup-form','target' => '_blank'); ?>
                                 <?php echo form_open_multipart($action, $attributes) ?>
                                        
                                        

                                        <!-- Identify your business so that you can collect the payments. -->
                                                    <input type="hidden" name="business" value="eli7diaz@gmail.com">

                                                    <!-- Specify a Subscribe button. -->
                                                    <input type="hidden" name="cmd" value="_xclick-subscriptions">
                                                    
                                                    

                                                    <!-- Set the terms of the regular subscription. -->
                                                    <!--<input type="hidden" name="currency_code" value="USD">-->

                                                    <?php if (($children >= 2) and ($children <= 9)) {

                                                          $amount = 5 * $children;

                                                          $description = '5$ per employee Plan';

                                                      ?>




                                                    <input type="hidden" name="item_name" value="DayCare with <?=$children?> employees ">
                                                    <input type="hidden" name="on0" value="Plan">
                                                    <input type="hidden" name="os0" value="5$ per employee (Monthly)">


                                                    <!--<input type="hidden" name="amount" value="1.00">-->
                                                    <input type="hidden" name="item_number" value="DIG Weekly">

                          
                                                    <input type="hidden" name="a3" value="<?=$amount?>.00">
                                                    <input type="hidden" name="p3" value="1">
                                                    <input type="hidden" name="t3" value="M">

                                                      
                                                    <?php }elseif (($children >= 10) and ($children <= 19)) {



                                                    $amount = 10 * $children;

                                                    $description = '10$ per employee Plan';
                                                     ?>
                                                    <input type="hidden" name="item_name" value="DayCare with <?=$children?> employees ">
                                                    <input type="hidden" name="on0" value="Plan">
                                                    <input type="hidden" name="os0" value="10$ per employee (Monthly)">


                                                    <!--<input type="hidden" name="amount" value="1.00">-->
                                                    <input type="hidden" name="item_number" value="DIG Weekly">

                                                    <input type="hidden" name="a3" value="<?=$amount?>.00">
                                                    <input type="hidden" name="p3" value="1">
                                                    <input type="hidden" name="t3" value="M">

                                                    <?php }elseif (($children >= 20) and ($children <= 35)) { 



                                                      $amount = 17 * $children;

                                                       $description = '17$ per employee Plan';




                                                      ?>

                                                    <input type="hidden" name="item_name" value="DayCare with <?=$children?> employees ">
                                                    <input type="hidden" name="on0" value="Plan">
                                                    <input type="hidden" name="os0" value="17$ per employee (Monthly)">


                                                    <!--<input type="hidden" name="amount" value="1.00">-->
                                                    <input type="hidden" name="item_number" value="DIG Weekly">

                                                    <input type="hidden" name="a3" value="<?=$amount?>.00">
                                                    <input type="hidden" name="p3" value="1">
                                                    <input type="hidden" name="t3" value="M">

                                                    <?php }elseif ($type == 3) { 

                                                        $amount = 9;

                                                       $description = '9$ solo employee Plan';

                                                      ?>

                                                    <input type="hidden" name="item_name" value="Employee ">


                                                    <!--<input type="hidden" name="amount" value="1.00">-->
                                                    <input type="hidden" name="item_number" value="DIG Weekly">

                                                    <input type="hidden" name="a3" value="9.00">
                                                    <input type="hidden" name="p3" value="1">
                                                    <input type="hidden" name="t3" value="M">

                                                    <?php }

                                                     ?>

                                                   



                                                    <!-- Set recurring payments until canceled. -->
                                                    <input type="hidden" name="src" value="1">

                                                    <!-- Provide a drop-down menu option field. -->
                                                    <!--<input type="hidden" name="on0" value="Plan">Plan <br />
                                                    <select name="os0">
                                                    <option value="Select Plan">Select Plan</option>
                                                    <option value="DayCare with 2 - 9 employees">DayCare with 2 - 9 employees </option>
                                                    <option value="DayCare with 10 - 19 employees">DayCare with 10 - 19 employees </option>
                                                    <option value ="DayCare with 20 - 35 employees">DayCare with 20 - 35 employees </option>
                                                    <option value ="Employee">Employee  </option>

                                                    </select> <br /><br />-->



                                                    <!-- Display the payment button. -->
                                                    <input id="check" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                           <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

                                           <!--<input type="image" name="submit"
                                        src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_subscribe_113x26.png"
                                        alt="Subscribe">
                                        <img alt="" width="1" height="1"
                                        src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >-->


                                          <!-- <input type="hidden" name="cmd" value="_s-xclick">
                                           <input type="hidden" name="hosted_button_id" value="NYZ26APQA9EC8">
                                           <input id="check" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                           <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">-->

                                          




                                  <?php echo form_close();?>

                         <?php $date = new DateTime();
        $date = $date->format('Y-m-d h:i:s');




        //Incrementando 1 mes
        $mod_dateold = strtotime($date."+ 1 month");
        $mod_date = date("Y-m-d h:i:s",$mod_dateold); ?>
                                                   
                                           <?=$this->session->set_userdata('a_name', $name);?>
                                           
                                           <?=$this->session->set_userdata('a_phone', $phone);?>
                                          
                                            <?=$this->session->set_userdata('a_address', $address);?>
                                           
                                           <?=$this->session->set_userdata('a_director', $director);?>

                                            <?=$this->session->set_userdata('a_children', $children);?>

                                             <?=$this->session->set_userdata('a_owner', $owner);?>

                                          <?=$this->session->set_userdata('a_email', $email);?>

                                           <?=$this->session->set_userdata('a_type', $type);?>

                                             <?=$this->session->set_userdata('a_birthdate', $birthdate);?>
                                               <?=$this->session->set_userdata('a_gender', $gender);?>
                                               <?=$this->session->set_userdata('a_price', $price);?>
                                               <?=$this->session->set_userdata('a_amount', $amount);?>
                                               <?=$this->session->set_userdata('a_ends', $mod_date);
                                               ?>
                                               <?=$this->session->set_userdata('a_description', $description
                                                );?>

                                  <br><br><br><div class="row">
                                  <!--<div class="form-container col-xs-6 col-md-6" align="center">
                                    <a href="<?=base_url().'signup/create_pp_subscription'?>"><button id="sub" class="btn btn-block btn-cta-primary" disabled>Finish</button></a>
                                  </div>-->
                                  <div class="form-container col-xs-12 col-md-12" align="center">
                                    <a class="btn btn-block btn-cta-primary" href="#" onclick="window.history.back();">Cancel</a>
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