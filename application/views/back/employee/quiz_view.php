 <section class="signup-section access-section section">
 	<div class="container">
 		<div class="row">
 			<div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
 				<div class="form-box-inner">
 				<h2 class="title text-center">Pre-service Quiz</h2>                 
 					<div class="row">
 						<div class="form-container col-xs-12 col-md-12">
 							<?php $attributes = array('class' => 'form-horizontal'); ?>
          					<?php echo form_open_multipart(base_url().'employee/transfer/request_transfer', $attributes) ?> 
 								</br>
 								<?php
				                  foreach($questions as $question)
				                  {
				                    ?>
 								<div class="form-group">
 									<b><?=$question->description?></b><br><br>
 									<?php echo form_error('question'); ?>
									<?php
					                  switch($question->questiontype_id)
					                  {

					                  	case 1:

						                  foreach($solutions[$question->id_questions] as $sols)
						                  {
						                    ?>
						                    <input type="radio" name=<?=$question->id_questions?> value=<?=$sols->id_solutions?>> <?=$sols->description?><br>
						                    <?php
						                  }

						                  break;

						                case 2:
						                  ?> 

						                  <input type="radio" name=<?=$question->id_questions?> value="yes"> YES <br>  
						                  <input type="radio" name=<?=$question->id_questions?> value="no"> NO <br> 

						                   <?php						                

						                  break;

						                case 3:
						                  ?> 

						                  <textarea id=<?=$question->id_questions?> name=<?=$question->id_questions?> rows="4" style="width:100%"></textarea>

						                   <?php						                

						                  break;

						                }						            
						                  ?> 

 								</div>

 								 <?php
					                }						            
					             ?> 

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

