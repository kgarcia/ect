        <section class="signup-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                            <h2 class="title text-center"><?=$legend?></h2>                 
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-12" align="center">
                                
                                <?php $attributes = array('class' => 'signup-form'); ?>
                                <?php echo form_open_multipart(base_url().$action, $attributes) 
                                ?>
                                        <div class="form-group">
                                            <label class="sr-only" >Name</label>
                                            <?=form_error('name')?>
                                            <input type="text" class="form-control login-email" name="name" value="<?=is_null($vendor) ? set_value('name') : $vendor->name?>" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Phone Number</label>
                                            <?=form_error('phone')?>
                                            <input type="text" class="form-control" name="phone" value="<?=is_null($vendor) ? set_value('phone') : $vendor->phone?>" class="form-control login-email" placeholder="Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Address</label>
                                            <?=form_error('address')?>
                                            <input type="text" name="address" value="<?=is_null($vendor) ? set_value('address') : $vendor->address?>" class="form-control login-email" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Date of birth</label>

                                            <?=form_error('birthdate')?>
                                            <input id="datepicker" type ="text"  name="birthdate" value="<?=is_null($vendor) ? set_value('birthdate') : $bdate?>" class="form-control" placeholder="Date of birth">
                                          
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Gender</label>
                                            <?=form_error('gender')?>
                                            <select class="form-control" name="gender" id="gender">
                                                  <?php if (!$vendor) {?>

                                                   <option value="-1">
                                                        Gender
                                                    </option> 

                                                    <?php }else{?>
                                                    <option value="<?=$vendor->gender?>">
                                                     <?php if ($vendor->gender == 0) {
                                                        echo  "Male";
                                                     }elseif ($vendor->gender == 1) {

                                                        echo "Female";
                                                     }

                                                     ?>
                                                    </option>
                                                    
                                                    <?php } ?>

                                                    <?php if ($vendor->gender == null) {?>
                                                    
                                                    <option value="0">
                                                        <?="Male"?>
                                                        </option>  
                                                    <option value="1">
                                                        <?="Female"?>
                                                    </option>

                                                
                                                    <?php }elseif ($vendor->gender == 0) { ?>
                                                      
                                                        <option value="1">
                                                        <?="Male"?>
                                                        </option>                   
                                                        
                                                    <?php }elseif ($vendor->gender == 1) { ?>
                                                      
                                                    <option value="0">
                                                        <?="Female"?>
                                                        </option>  
                                                    <?php } ?>
                                                    
                                                     
                                                            
                                                          
                                                                  
                                                </select>
                                        </div>

                                        <?php if (!$vendor) { ?>

                                        <div class="form-group">
                                            <label class="sr-only" for="signup-email">Your email</label>
                                            <?=form_error('email')?>
                                            <input id="signup-email" type="email" name="email" value="<?=is_null($vendor) ? set_value('email') : $email?>" class="form-control login-email" placeholder="e-mail">
                                        </div><!--//form-group-->
                                        

                                        <?php
                                        }?>
                                        
                                        
                                        

                                        <input type="hidden" name="grabar" value="si"/>   
                                        <input type="hidden" name="id_vendor" value="<?=$vendor->id_vendor?>"/>
                                        <button type="submit" class="btn btn-cta-primary"><?=$button?></button>
                                        <button type="reset" id="res" class="btn btn-cta-primary">Cancel</button>
                                        <a class="btn btn-default" href="#" onclick="window.history.back();">Back</a>
                                        <!--<button type="submit" class="btn btn-block btn-cta-primary">Save</button>  -->
                                    </form>
                                </div><!--//form-container-->
                            </div><!--//row-->
                        </div><!--//form-box-inner-->
                    </div><!--//form-box-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//signup-section-->

        <script>
        $(document).ready(function() { 
            $('#datepicker').datepicker({
                dateFormat: 'mm/dd/yy',
                maxDate:  '01/31/1997'
            });

        });

        </script>