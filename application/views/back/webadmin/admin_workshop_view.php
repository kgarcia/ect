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
                                                    <label class="sr-only">Vendor</label>
                                                    <?=form_error('vendor')?>
                                                    <select class="form-control" name="vendor" id="vendor">

                                                      <?php if (!$workshop) {?>
                                                          <option value="-1">
                                                                Select Vendor
                                                          </option>
                                                     <?php }else{?>

                                                         <option value="<?=$workshop->vendor_id?>">
                                                         <?=$vendor?>
                                                        </option>
                                                    
                                                    <?php } ?>
                                                    <?php
                                                    if (is_array($vendors))
                                                    
                                                     { 
                                                        foreach($vendors as $filaca)
                                                        {
                                                          if ($filaca->id_vendor != $workshop->vendor_id) {
                                                                
                                                              
                                                            
                                                        ?>
                                                            <option value="<?=$filaca->id_vendor?>">
                                                              <?=$filaca->name?>
                                                            </option>
                                                        <?php
                                                                }
                                                              }

                                                          }
                                                      
                                                        ?>   
                                                        
                                                    </select>
                                                  
                                       </div>
                                		<div class="form-group">
							                        <label class="sr-only">Category</label>
                                            		<?=form_error('cat')?>
                                            		<select class="form-control" name="cat" id="cat">

							                          <?php if (!$workshop) {?>
							                              <option value="-1">
							                                    Select Category
							                              </option>
							                         <?php }else{?>

							                             <option value="<?=$workshop->category_id?>">
							                             <?=$category?>
							                            </option>
							                        
							                        <?php } ?>
							                        <?php
							                        if (is_array($categories))
							                        
							                         { 
							                            foreach($categories as $filaca)
							                            {
							                              if ($filaca->id_categories != $workshop->category_id) {
							                                    
							                                  
							                                
							                            ?>
							                                <option value="<?=$filaca->id_categories?>">
							                                  <?=$filaca->description?>
							                                </option>
							                            <?php
							                                    }
							                                  }

							                              }
							                          
							                            ?>   
							                            
							                        </select>
							                      
							           </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Name</label>
                                            <?=form_error('name')?>
                                            <input type="text" class="form-control login-email" name="name" value="<?=is_null($workshop) ? set_value('name') : $workshop->name?>" placeholder="Name">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="sr-only" >Hours</label>

                                            <?=form_error('hours')?>
                                            <input type="number" name="hours" value="<?=is_null($workshop) ? set_value('hours') : $workshop->hours?>" class="form-control login-email" placeholder="Hours">

                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Topic</label>
                                            <?=form_error('topic')?>
                                          
											<textarea id="topic" rows="5" name="topic"  class="form-control" placeholder="Topic"><?=is_null($workshop) ? set_value('topic') : $workshop->topic?></textarea>

                                        </div>
				                                     
                                        
                                        

                                        <input type="hidden" name="grabar" value="si"/>   
                                        <input type="hidden" name="id_workshop" value="<?=$workshop->id_workshops?>"/>
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