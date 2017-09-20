
<section class="features-tabbed section">
            <div class="container">
                <h2 class="page-title text-center"><i class="fa fa-archive"></i> <?=$header_wc?> </h2><br><br>

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
                    
                        <div class="col-md-12 col-sm-12">
                            <table class="table table-bordered" id="table_all_workshops">
                            <thead>
                                <tr>
                                    <th><?=$table_workshop?></th>  
                                    <th><?=$table_institution?></th>
                                    <th><?=$table_certificates?></th>
                                    <th><?=$table_hours?></th>
                                    <th><?=$table_missing?></th>
                                    <th><?=$table_status?></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    if (is_array($workshops)) {
                                      foreach($workshops as $i => $workshop)
                                      {
                                        ?>

                                        <tr>
                                            <td><a><?=$workshop->name?></a></td> 
                                            <td><?=$vendors[$i]->name?></td>
                                            <td>
                                            <button type="button" class="open-uploadDialog btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" data-id="<?=$workshop->id_workshops?>"><?=$table_up?></button>
                                            </td>
                                            <td><?=$workshop->hours?></td>
                                            
                                            <?php if ($completed_hours_cat[$workshop->category_id] >= $required_hours_cat[$workshop->category_id]) { ?>

                                                <td class="success">0</td>
                                                <td class="success"><?=$completed?></td>

                                            <?php
                                              } else if (($completed_hours_cat[$workshop->category_id] < $required_hours_cat[$workshop->category_id]) && 
                                                ($completed_hours_cat[$workshop->category_id] > 0)) { 
                                            ?>

                                                <td class="warning"><?=$required_hours_cat[$workshop->category_id] - $completed_hours_cat[$workshop->category_id] ?> </td>
                                                <td class="warning"><?=$process?></td>

                                            <?php
                                              } else { 
                                            ?>

                                                <td class="danger"><?= $required_hours_cat[$workshop->category_id] ?></td>
                                                <td class="danger"><?=$pending?></td>

                                            <?php
                                              } 
                                            ?>

                                        </tr>

                                <?php
                                      }
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <div id="myModal" class="modal fade" role="dialog" align="center"> 
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><?=$table_upload?></h4>
                              </div>                              

                              <div class="modal-body"> 
                                  <?php $attributes = array('class' => 'form-horizontal'); ?>
                                  <?php echo form_open_multipart(base_url().'workshops/certificate', $attributes) ?> 

                                     <input type="hidden" name="workshopId" id="workshopId" value="" />
                                     <input type = "file" name = "certificate" accept="image/jpeg,image/gif,image/png,application/pdf" /> 
                                     <p class="help-block"><?=$table_only?></p>
                                     <br /><br /> 
                                     <button type="submit" class="btn btn-block btn-cta-primary"><?=$table_up?></button>
                                  
                                  <?php echo form_close() ?>
                                    
                               </div>

                            </div>

                          </div>
                        </div>

                    </div>
                
            </div>
        </section>

   <script type="text/javascript">

   $(document).ready(function() {
        $(document).on("click", ".open-uploadDialog", function () {
             var workshopId = $(this).data('id');
             $(".modal-body #workshopId").val( workshopId );
         })
    });

    </script>
        
