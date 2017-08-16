
     <section class="features-tabbed section">
            <div class="container">
                <h2 class="page-title text-center"><i class="fa fa-archive"></i> Quiz List</h2><br><br>
            
                <div class="row">
                    <div class="blog-list blog-category-list">
                        <div id="dvData" class="table-responsive">
                            <table class="table table-bordered display" id="my_table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Questions</th>
                                    <th>Max Score</th>
                                </tr>
                                </thead>
                                <tbody>
                        <?php foreach ($quizzes->result() as $quiz) {?>
                                <tr>
                                    
                                    <td><a href="#"><?= $quiz->description ?></a></td>
                                     <td><?php $this->db->where('quiz_id', $quiz->id_quizzes);
                                                $this->db->from('questions');
                                                echo $this->db->count_all_results(); ?></td>
                                                
                                    <td><?php   $this->db->select_sum('score');
                                                $this->db->where('quiz_id', $quiz->id_quizzes);
                                                echo $this->db->get('questions')->result()[0]->score;?></td>
                               </tr>
                            <?php }?><!-- ENDFOREACH -->
                            </tbody>
                            </table>
                        </div>
                        <input class="btn btn-cta btn-cta-primary" type="button" id="btnExport" value=" Export Table data into Excel " />

                    </div>
                </div>
            </div>
        </section>
        
          <script type="text/javascript" src="<?=base_url().'assets/js/main.js'?>"></script>
    
            
      