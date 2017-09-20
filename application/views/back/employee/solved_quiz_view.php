 <section class="signup-section access-section section">
 	<div class="container">
 		<div class="row">
 			<div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
 				<div class="form-box-inner">
 				<h2 class="title text-center">Pre-service Quiz</h2>                 
 					<div class="row">
 						<div class="form-container col-xs-12 col-md-12">
 								</br>
 								<?php
				                  foreach($questions as $q => $question)
				                  {
				                    ?>
 								<div class="form-group">

 									
									<?php
					                  switch($question->questiontype_id)
					                  {

					                  	case 1:

					                  		if (is_array($answers[$question->id_questions])){

						                  		if ($question->score == $answers[$question->id_questions][0]->score) {
						                  		?>

						                  			<div class="alert alert-success col-xs-12 col-md-12">
						                  				<div class="col-xs-10 col-md-10"><?=$quiz_correct_answer?></div>
						                  				<div class="col-xs-2 col-md-2">
						                  					<b><?= $answers[$question->id_questions][0]->score."/".$question->score ?></b>
						                  				</div>
						                  			</div>

						                  		<?php } else { ?>

						                  			<div class="alert alert-danger col-xs-12 col-md-12">		<div class="col-xs-10 col-md-10"><?=$quiz_wrong_answer?></div>
						                  				<div class="col-xs-2 col-md-2">
						                  					<b><?= $answers[$question->id_questions][0]->score."/".$question->score ?></b>
						                  				</div>
						                  			</div>

						                  		<?php }
						                  		} else { ?>

						                  		<div class="alert alert-danger col-xs-12 col-md-12">		<div class="col-xs-10 col-md-10"><?=$quiz_wrong_answer?></div>
						                  				<div class="col-xs-2 col-md-2">
						                  					<b><?= "0/".$question->score ?></b>
						                  				</div>
						                  			</div>

						                  		<?php } ?>

	 									<b><?=$question->description." (".$question->score." pts.) "?></b><br><br>
	 									<input type="hidden" name="<?php echo "quest_".$q; ?>" value="<?php echo $question->id_questions; ?>"/>

	 									<?php

						                  foreach($solutions[$question->id_questions] as $sols)
						                  {
						                  	if (is_array($answers_options[$question->id_questions])) {
						                    ?>

						                    <input type="checkbox" name=<?="ans_".$question->id_questions?> value=<?=$sols->id_solutions?> <?php if (in_array($sols->id_solutions, $answers_options[$question->id_questions])){echo('checked="checked"');}?> disabled> <?=$sols->description?><br>

						                    <?php
						                	} else { ?>

						                	<input type="checkbox" name=<?="ans_".$question->id_questions?> value=<?=$sols->id_solutions?> disabled> <?=$sols->description?><br>

						                	<?php }

						                  }

						                  break;

						                case 2:

						                  if ($quiz_reviewed == 0) {
					                  		?>

					                  			<div class="alert alert-warning"><?=$quiz_not_graded?></div>

					                  		<?php } else { ?>

					                  			<div class="alert alert-success col-xs-12 col-md-12">
					                  				<div class="col-xs-10 col-md-10"><?=$quiz_graded?></div>
					                  				<div class="col-xs-2 col-md-2">
					                  					<b><?= $answers[$question->id_questions][0]->score."/".$question->score ?></b>
					                  				</div>
					                  			</div>

					                  		<?php } ?>

		 									<b><?=$question->description." (".$question->score." pts.) "?></b><br><br>
		 									<input type="hidden" name="<?php echo "quest_".$q; ?>" value="<?php echo $question->id_questions; ?>"/>

						                  <textarea id=<?=$question->id_questions?> name=<?="ans_".$question->id_questions?> rows="4" style="width:100%" disabled><?php echo $answers[$question->id_questions][0]->answer_text;?>
						                  </textarea>

						                   <?php						                

						                  break;

						                }						            
						                  ?> 

 								</div>

 								 <?php
					                }						            
					             ?> 

 								</br>
 						</div><!--//form-container-->
 					</div><!--//row-->
 				</div><!--//form-box-inner-->
 			</div><!--//form-box-->
 		</div><!--//row-->
 	</div><!--//container-->
 </section><!--//signup-section-->

