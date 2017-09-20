     <section class="features-tabbed section">
            <div class="container">
                <h2 class="page-title text-center"><i class="fa fa-archive"></i> Staff List</h2><br><br>
            
                <div class="row">
                    <div class="blog-list blog-category-list">
                        <div id="dvData" class="table-responsive">
                            <table class="table table-bordered display" id="table_employee_list">
                                <thead>
                                <tr>
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>phone</th>
                                    <th>Job</th>
                                    <th>Completed Hours</th>
                                    <th>Missing Hours</th>
                                </tr>
                                </thead>
                                <tbody>
                        <?php foreach ($employees->result() as $emp) {?>
                        
                        <?php 
                        
                        $cer = $this->db->get_where('certifications', array('id_employee' => $emp->id_employees, 'status' => '1'));
                        $certifications = $cer->result();
                        
                        $enr = $this->db->get_where('enrollment', array('employee_id' => $emp->id_employees, 'status' => '1'));
                        $enrollments = $enr->result();
                        
                        $today = date( 'Y-m-d H:i:s' );  
                        
                        $actual_scholar_year = $this->db->get_where('scholar_years', array('start <=' => $today, 'finish >=' => $today, 'status' => 1));
                        
                        $scholar_year_id = $actual_scholar_year->result()[0]->id_scholar_years;
                        
                        
                        
                            //$certifications = $workshopmodel->get_employee_certifications($emp->id_employees);
                            $ruleshours=10;
                            // RULES HOURS
		                    //$queryrules = $this->db->select_sum('hours')->get_where('rules', array('type_employee_id' => $emp->type_employee_id,  'status' => '1'));
                            $this->db->select_sum('hours');
                            $this->db->from('rules');
                            $this->db->where('type_employee_id',$emp->type_employee_id);
                            $queryrules = $this->db->get();
                                    // si hay resultados
                            	
                            $ruleshours = $queryrules->result()[0]->hours;
                            
                            		

                            
                            $hoursc = 0;
                            
                                foreach ($enrollments as $i => $enrollment) {
//                                    $workshops[$i] = $this->Workshop_model->get_workshop($certification->id_workshop);
                                    if ($enrollment->scholar_year_id == $scholar_year_id){
                                    $query = $this->db->get_where('workshops', array('id_workshops' => $enrollment->workshop_id));
                                        // si hay resultados
                                        if ($query->num_rows() == 1) {
                                           
                                            $wrkshp = $query->row();
                                            $hoursc = $hoursc + $wrkshp->hours;
                                            
                                        }
                                    }
                                }
                            
                        ?>
                        
                        
                                <tr>
                                    <td><img src="../<?= $emp->profile_picture ?>" class="img-thumbnail" align="center" style="width:75px; height: 75px;"></img></td>
                                    <td><a href="../daycare/employee_workshops/<?= $emp->id_employees ?>"><?= $emp->name ?></a></td>
                                    <td><?= $emp->phone ?></td>
                                    <td><?= $emp->job?></td>
                                    <td class="success"><?= $hoursc ?></td>
                                    <td class="danger"><?= $ruleshours-$hoursc ?></td>
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
    
               <script type="text/javascript">
            $(document).ready(function() {
              $("#btnExport").click(function(e) {
                e.preventDefault();
            
                //getting data from our table
                var data_type = 'data:application/vnd.ms-excel';
                var table_div = document.getElementById('dvData');
                var table_html = table_div.outerHTML.replace(/ /g, '%20');
            
                var a = document.createElement('a');
                a.href = data_type + ', ' + table_html;
                a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
                a.click();
              });
            });
        </script>
      