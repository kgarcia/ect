 <section class="signup-section access-section section">
    <div class="container">
        <div class="row">
            <div class="form-box col-md-offset-2 col-sm-offset-0 xs-offset-0 col-xs-12 col-md-8">     
                <div class="form-box-inner">
                <h2 class="title text-center"><?=$reports_work_per_year_item?></h2>                 
                    <div class="row">
                        <div class="form-container col-xs-12 col-md-12" align="center">
                            <?php $attributes = array('class' => 'form-horizontal'); ?>
                            <?php echo form_open_multipart(base_url().'save_password', $attributes) ?> 
                                </br>
                                <div class="form-group">

 								<?php echo form_error('scholar_year'); ?>
									
 									<label class="sr-only" >Scholar Year</label>
 									<?php echo form_error('scholar_year'); ?>
 									<select class="form-control" name="scholar_year" id="scholar_year">

					                  <option><?=$select_year?></option>

					                  <?php
					                  foreach($scholar_years as $i => $scholar_year)
					                  {
					                    ?>
					                    <option value="<?=$scholar_year->id_scholar_years?>">
					                      <?=$sy_names[$i]?>
					                    </option>
					                    <?php
					                  }
					                  ?>               
					                </select> 

					            </div>

					            <script type="text/javascript">
      
		                         var dt_records = <?php echo json_encode($dt_records); ?>;
		                         var dt_search = <?php echo json_encode($dt_search); ?>;
		                         var dt_showing = <?php echo json_encode($dt_showing); ?>;
		                         var table_to = <?php echo json_encode($table_to); ?>;
		                                        var table_of = <?php echo json_encode($table_of); ?>;
		                                        var table_entries = <?php echo json_encode($table_entries); ?>;
		                                        var table_previous = <?php echo json_encode($table_previous); ?>;
		                                        var table_next = <?php echo json_encode($table_next); ?>;

		                		</script>

					            <div class="row">
				                    <div class="blog-list blog-category-list">
				                        <article>
                            				<div  id="table_workshops" class="col-md-12 col-sm-12">
                            				</div>
				                        </article>
				                    </div>
				                </div>

                                <input type="hidden" name="grabar" value="si"/>
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
      $("#scholar_year").change(function() {
        $("#scholar_year option:selected").each(function() {
          scholar_year = $('#scholar_year').val();
          $.post("<?=base_url();?>employee_workshops/fill_workshops_per_year", {
            scholar_year : scholar_year
          }, function(data) {
            $("#table_workshops").html(data);
          });
        });
      })
    });
</script>

