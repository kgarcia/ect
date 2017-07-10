
     <section class="features-tabbed section">
            <div class="container">
                <h2 class="page-title text-center"><i class="fa fa-archive"></i> Six's Workshops</h2><br><br>
            
                <div class="row">
                    <div class="blog-list blog-category-list">
                        <div id="dvData" class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    
                                    <th>Workshop</th>
                                    <th>Hours</th>
                                    <th>Status</th>
                                </tr>
                        <?php foreach ($employees->result() as $emp) {?>
                                <tr>
                                    
                                    <td><a>Child attendance</a></td>
                                    <td>10</td>
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