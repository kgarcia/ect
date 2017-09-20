 <section class="signup-section access-section section">
 	<div class="container">
 		<div class="row">
 			<div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
 				<div class="form-box-inner">
 				<h2 class="title text-center">Upload Certificate</h2>                 
 					<div class="row">
 						<div class="form-container col-xs-12 col-md-12">
 							<?php $attributes = array('class' => 'form-horizontal'); ?>
          					<?php echo form_open_multipart(base_url().'certification/save', $attributes) ?> 
 								</br>

 								<div class="form-group">

 								<?php echo form_error('category'); ?>
									
 									<label class="sr-only" >Category</label>
 									<?php echo form_error('category'); ?>
 									<select class="form-control" name="category" id="category">

					                  <option>Select a category</option>

					                  <?php
					                  foreach($categories as $category)
					                  {
					                    ?>
					                    <option value="<?=$category -> id_categories?>">
					                      <?=$category -> description?>
					                    </option>
					                    <?php
					                  }
					                  ?>               
					                </select> 

					            </div>

					             <div class="form-group">

					                <label class="sr-only" >Workshop</label>
 									<?php echo form_error('workshop'); ?>
 									<select class="form-control" name="workshop" id="workshop">

					                               
					                </select> 

					             </div>

					             <div class="form-group text-center">

									<br>
									<label class="sr-only" >Certificate in PDF or image file</label>
 									<?php echo form_error('certification'); ?>
					                <input type="file" id="certification" name="certification" accept="image/jpeg,image/gif,image/png,application/pdf" style="display: inline-block;">
                                     <p class="help-block">Only Image and PDF File Import.</p>
                                     <br>

					             </div>

						                   

 								<input type="hidden" name="grabar" value="si"/>
 								<input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>"/>

 								</br>
 								<button type="submit" class="btn btn-block btn-cta-primary">Save</button>  
 							<?php echo form_close() ?>
 						</div><!--//form-container-->
 					</div><!--//row-->
 				</div><!--//form-box-inner-->
 			</div><!--//form-box-->
 		</div><!--//row-->
 	</div><!--//container-->
 </section><!--//signup-section-->

<script type="text/javascript">
    $(document).ready(function() {
      $("#category").change(function() {
        $("#category option:selected").each(function() {
          category = $('#category').val();
          $.post("<?=base_url();?>employee_workshops/fill_workshops", {
            category : category
          }, function(data) {
            $("#workshop").html(data);
          });
        });
      })
    });
</script>


