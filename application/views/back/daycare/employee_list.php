
     <section class="features-tabbed section">
            <div class="container">
                <h2 class="page-title text-center"><i class="fa fa-archive"></i> Employee List</h2><br><br>
            
                <div class="row">
                    <div class="blog-list blog-category-list">
                        <div id="dvData" class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                </tr>
                        <?php foreach ($employees->result() as $emp) {?>
                                <tr>
                                    <td><a href=""><?= $emp->name; ?></a></td>
                                    <td><?= $emp->gender; ?></td>
                                    <td><?= $emp->phone; ?></td>
                                    <td class="success">Completed</td>
                               </tr>
                            <?php }?>
                            </table>
                        </div>
                        <input class="btn btn-cta btn-cta-primary" type="button" id="btnExport" value=" Export Table data into Excel " />

                    </div>
                </div>
            </div>
        </section>