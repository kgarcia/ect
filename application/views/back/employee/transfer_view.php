 <section class="signup-section access-section section">
 	<div class="container">
 		<div class="row">
 			<div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
 				<div class="form-box-inner">
 				<h2 class="title text-center">Transfer Request</h2>                 
 					<div class="row">
 						<div class="form-container col-xs-12 col-md-12" align="center">
 							<?php $attributes = array('class' => 'form-horizontal'); ?>
          					<?php echo form_open_multipart(base_url().'employee/transfer/request_transfer', $attributes) ?> 
 								</br>
 								<div class="form-group">
 									<label class="sr-only" > New Daycare</label>
 									<?php echo form_error('daycare'); ?>
 									<select name="daycare" id="daycare">

					                  <option>Select a daycare</option>

					                  <?php
					                  foreach($daycares as $daycare)
					                  {
					                    ?>
					                    <option value="<?=$daycare -> id_daycares?>">
					                      <?=$daycare -> name?>
					                    </option>
					                    <?php
					                  }
					                  ?>               
					                </select> 

 								</div>

 								<input type="hidden" name="grabar" value="si"/>

 								</br>
 								<button type="submit" class="btn btn-block btn-cta-primary">Send</button>  
 							<?php echo form_close() ?>
 						</div><!--//form-container-->
 					</div><!--//row-->
 				</div><!--//form-box-inner-->
 			</div><!--//form-box-->
 		</div><!--//row-->
 	</div><!--//container-->
 </section><!--//signup-section-->

