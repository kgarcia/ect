<section class="story-section section section-on-bg">
            <div class=" container text-center"> 
                <div class="" >                    
                    <div class="team row">
                        <h3 class="title">Vendors List</h3>
                        <div class="text-center"><a href="<?=base_url().'user-section/admin-vendor/add-new'?>"><button type="button" class="btn btn-cta btn-cta-primary">Add New&nbsp;&nbsp;<i class="fa fa-plus"></i></button></a></div><br><br>

                        <div class="text-center" id="test-list">
                        <i class="fa fa-search"></i>&nbsp;<input type="text" class="search"><br><br><br>
                        <ul style="list-style:none;" class="list">
                        <?php
                        if (is_array($vendor))
                         {
                         foreach ($vendor as $k => $n) 
                         {
                        ?>

                        
                        <li>
                        <div class="member col-md-4 col-sm-6 col-xs-12">
                            <div class="member-inner">
                                <figure class="profile">
                                    <img class="img-responsive" src="<?=base_url().'assets/images/team/member-2.png'?>" alt=""/>
                                    <figcaption class="info">
                                        <span class="name"><?=$vendor[$k]->name?></span><br />
                                        <span class="phone"><?=$vendor[$k]->phone?></span> 
                                    </figcaption>
                                </figure><!--//profile-->
                                <div class="social">
                                    <ul class="social-list list-inline">
                                        <li><a href="profile.html"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="<?=base_url().'user-section/admin-vendor/edit/'.$vendor[$k]->id_vendor?>"><i class="fa fa-pencil"></i></a></li>
                                        <li><a href="<?=base_url().'user-section/admin-vendor/delete/'.$vendor[$k]->id_vendor?>"><i class="fa fa-trash"></i></a></li>
                                    </ul><!--//social-list-->
                                </div><!--//social-->
                            </div><!--//member-inner-->
                            <!--<div><br><a href="<?=base_url().'user-section/admin-daycare/add-new'?>"><button type="button" class="btn btn-cta btn-primary">Add Director&nbsp;&nbsp;<i class="fa fa-plus"></i></button></a></div>-->
                        </div>
                        </li>
                        
                        
                         <?php
                          }

                         }?>
                        </ul>
                        <br style="clear: both !important;">
                        <div class="text-center">
                     
                        <ul class="pagination">
                            
                        </ul><!--//member-->

      
                         </div>
                         
                </section>
        <script type="text/javascript">
            $(document).ready(function() { 
            var monkeyList = new List('test-list', {
                  valueNames: ['name', 'phone'],
                  page: 3,
                  pagination: true
                });
        });
        </script>