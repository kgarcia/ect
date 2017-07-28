
     <section class="features-tabbed section">
            <div class="container">
                <h2 class="page-title text-center"><i class="fa fa-archive"></i> Employee List</h2><br><br>
            
                <div class="row">
                    <div class="blog-list blog-category-list">
                        <div id="dvData" class="table-responsive">
                            <table class="table table-bordered display" id="my_table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>phone</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                        <?php foreach ($employees->result() as $emp) {?>
                                <tr>
                                    
                                    <td><a href="show_employee/<?= $emp->id_employees ?>"><?= $emp->name ?></a></td>
                                    <td><?= $emp->phone ?></td>
                                    <td><?= $emp->gender ?></td>
                                    <td class="success">Completed</td>
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
    
            
      