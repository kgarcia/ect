        <section class="signup-section access-section section">
            <div class="container">
                <div class="row">
                    <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                        <div class="form-box-inner">
                            <h2 class="title text-center">Daycare Registration</h2>                 
                            <div class="row">
                                <div class="form-container col-xs-12 col-md-12" align="center">
                                
                                <?php $attributes = array('class' => 'signup-form'); ?>
                                <?php echo form_open_multipart(base_url().$action, $attributes) 
                                ?>
                                        <div class="form-group">
                                            <label class="sr-only" >Name</label>
                                            <?=form_error('name')?>
                                            <input type="text" class="form-control login-email" name="name" value="<?=is_null($daycare) ? set_value('name') : $daycare->name?>" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Phone Number</label>
                                            <?=form_error('phone')?>
                                            <input type="text" class="form-control" name="phone" value="<?=is_null($daycare) ? set_value('phone') : $daycare->phone?>" class="form-control login-email" placeholder="Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Address</label>
                                            <?=form_error('address')?>
                                            <input type="text" name="address" value="<?=is_null($daycare) ? set_value('address') : $daycare->address?>" class="form-control login-email" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Children quantity</label>

                                            <?=form_error('children')?>
                                            <input type="number" name="children" value="<?=is_null($daycare) ? set_value('children') : $daycare->children_quantity?>" class="form-control login-email" placeholder="Children Quantity">

                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Owner</label>
                                            <?=form_error('owner')?>
                                            <input type="text" name="owner" value="<?=is_null($daycare) ? set_value('owner') : $daycare->owner?>" class="form-control login-email" placeholder="Owner">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="sr-only" for="signup-email">Your email</label>
                                            <?=form_error('email')?>
                                            <input id="signup-email" type="email" name="email" value="<?=is_null($daycare) ? set_value('email') : $email?>" class="form-control login-email" placeholder="e-mail">
                                        </div><!--//form-group-->

                                        <input type="hidden" name="grabar" value="si"/>   
                                        <input type="hidden" name="id_course" value="<?=$daycare->id_daycares?>"/>
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