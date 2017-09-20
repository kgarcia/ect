 <section class="signup-section access-section section">
    <div class="container">
        <div class="row">
            <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                <div class="form-box-inner">
                <h2 class="title text-center"><?=$title_change_pwd?></h2>                 
                    <div class="row">
                        <div class="form-container col-xs-12 col-md-12" align="center">
                            <?php $attributes = array('class' => 'form-horizontal'); ?>
                            <?php echo form_open_multipart(base_url().'save_password', $attributes) ?> 
                                </br>
                                <div class="form-group">
                                    <label class="sr-only" ><?=$place_actual_pwd?></label>
                                    <?php echo form_error('actual_pwd'); ?>
                                    <input type="password" name="actual_pwd" class="form-control" placeholder="<?=$place_actual_pwd?>">

                                </div>

                                <div class="form-group">
                                    <label class="sr-only" ><?=$place_new_pwd?></label>
                                    <?php echo form_error('new_pwd'); ?>
                                    <input type="password" name="new_pwd" class="form-control" placeholder="<?=$place_new_pwd?>">

                                </div>

                                <div class="form-group">
                                    <label class="sr-only" ><?=$place_confirm_new_pwd?></label>
                                    <?php echo form_error('confirm_new_pwd'); ?>
                                    <input type="password" name="confirm_new_pwd" class="form-control" placeholder="<?=$place_confirm_new_pwd?>">

                                </div>


                                <input type="hidden" name="grabar" value="si"/>

                                </br>
                                <button type="submit" class="btn btn-block btn-cta-primary"><?=$emp_save?></button>  
                            <?php echo form_close() ?>
                        </div><!--//form-container-->
                    </div><!--//row-->
                </div><!--//form-box-inner-->
            </div><!--//form-box-->
        </div><!--//row-->
    </div><!--//container-->
 </section><!--//signup-section-->

