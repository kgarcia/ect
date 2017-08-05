<!-- ******Features Section****** -->       
        <section class="features-tabbed section">
            <div class="container"><br>
                <h2 class="page-title text-center"><i class="fa fa-archive"></i> Courses to be done</h2><br><br>
                <div class="row">
                    <div class="blog-list blog-category-list">
                        <article>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr class="active">
                                        <th>Date</th>
                                        <th>Course</th> 
                                        <th>Institution</th>
                                        <th>Credit hours</th>
                                        <th>To Register</th>
                                    </tr>
                                    
                                    <?php
                                    if (is_array($courses)) {
                                      foreach($courses as $course)
                                      {
                                        ?>

                                    <tr>
                                        <td></td>
                                        <td><a href="" data-toggle="modal" data-target=".bs-example-modal-lg"><?=$course->name?></a></td> 
                                        <td></td>
                                        <td><?=$course->hours?></td>
                                        <td>
                                        <a href="<?=base_url().'employee_courses/enroll/'.$course->id_workshops?>" class="btn btn-success btn-lg" onclick="if(confirma() == false) return false;"> 
                                                Enroll</i>
                                            </a>
                                        </td>
                                    </tr>

                                    <?php
                                      }
                                  }
                                      ?>
                                                                                   
                                    
                                </table>
                            </div>
                            <div class="pagination-container text-center">
                                <ul class="pagination">
                                    <li class="disabled"><a href="#">&laquo;</a></li>
                                    <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul><!--//pagination-->
                            </div><!--//pagination-container-->
                        </article>                  
                    </div><!--//blog-list--> 
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//features-tabbed-->       
    </div><!--//wrapper-->

    <script type="text/javascript">
        function confirma(){
            return window.confirm("Are you sure you want to enroll?");
          }
    </script>