<section class="features-tabbed section">
            <div class="container">
                <h2 class="page-title text-center"><i class="fa fa-archive"></i> All Workshops </h2><br><br>
            
                <div class="row">
                    <div class="blog-list blog-category-list">
                        <div id="dvData" class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Workshop</th> 
                                    <th>Institution</th>
                                    <th>Certificate</th>
                                    <th>Credit hours</th>
                                    <th>Missing hours</th>
                                    <th>Estatus</th>
                                </tr>

                                <?php
                                    if (is_array($workshops)) {
                                      foreach($workshops as $i => $workshop)
                                      {
                                        ?>

                                        <tr>
                                            <td><a class="" href="" data-toggle="modal" data-target="#myModal"><?=$workshop->name?></a></td> 
                                            <td><?=$vendors[$i]->name?></td>
                                            <td>
                                            <a href="<?php echo site_url("employee_workshops/completed_workshops"); ?>" rel="modal:open" class="btn btn-success btn-lg">Upload</a>
                                            </td>
                                            <td><?=$workshop->hours?></td>
                                            
                                            <?php if ($completed_hours_cat[$workshop->category_id] >= $required_hours_cat[$workshop->category_id]) { ?>

                                                <td class="success">0</td>
                                                <td class="success">Completed</td>

                                            <?php
                                              } else if (($completed_hours_cat[$workshop->category_id] < $required_hours_cat[$workshop->category_id]) && 
                                                ($completed_hours_cat[$workshop->category_id] > 0)) { 
                                            ?>

                                                <td class="warning"><?=$required_hours_cat[$workshop->category_id] - $completed_hours_cat[$workshop->category_id] ?> </td>
                                                <td class="warning">In Process</td>

                                            <?php
                                              } else { 
                                            ?>

                                                <td class="danger"><?= $required_hours_cat[$workshop->category_id] ?></td>
                                                <td class="danger">Pending</td>

                                            <?php
                                              } 
                                            ?>

                                        </tr>

                                <?php
                                      }
                                  }
                                ?>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>
