 <section class="signup-section access-section section">
 	<div class="container">
 		<div class="row">
 			<div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
 				<div class="form-box-inner">
 				<h2 class="title text-center">Pre-service Quiz</h2>                 
 					<div class="row">
 						<div class="form-container col-xs-12 col-md-12">
 							<?php $attributes = array('class' => 'form-horizontal', 
 							'onsubmit' => "return confirm('Are you sure to submit your quiz? Once is submitted you will not be able to change any answer.');"); ?>
          					<?php echo form_open_multipart(base_url().'quiz/send', $attributes) ?> 
 								</br>
 								<?php
				                  foreach($questions as $q => $question)
				                  {
				                    ?>
 								<div class="form-group">

 									<b><?=$question->description." (".$question->score." pts.) "?></b><br><br>
 									<input type="hidden" name="<?php echo "quest_".$q; ?>" value="<?php echo $question->id_questions; ?>"/>
 									<?php echo form_error('question'); ?>
									<?php
					                  switch($question->questiontype_id)
					                  {

					                  	case 1:

						                  foreach($solutions[$question->id_questions] as $sols)
						                  {
						                    ?>
						                    <input type="radio" name=<?="ans_".$question->id_questions?> value=<?=$sols->id_solutions?>> <?=$sols->description?><br>
						                    <?php
						                  }

						                  break;

						                case 2:
						                  ?> 

						                  <textarea id=<?=$question->id_questions?> name=<?="ans_".$question->id_questions?> rows="4" style="width:100%"></textarea>

						                   <?php						                

						                  break;

						                }						            
						                  ?> 

 								</div>

 								 <?php
					                }						            
					             ?> 

 								<input type="hidden" name="grabar" value="si"/>
 								<input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>"/>

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


