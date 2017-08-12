<section class="story-section section section-on-bg">
            <div class=" container text-center"> 
                <div class="" >                    
                    <div class="team row">
                        <h3 class="title">Categories List</h3>
                        <div class="text-center"><a href="<?=base_url().'user-section/agency-category/add-new'?>"><button type="button" class="btn btn-cta btn-cta-primary">Add New&nbsp;&nbsp;<i class="fa fa-plus"></i></button></a></div><br><br>

                        <div class="text-center" id="test-list">
                        <i class="fa fa-search"></i>&nbsp;<input type="text" class="search"><br><br><br>
                        <ul style="list-style:none;" class="list">
                        <?php
                        if (is_array($arrCat))
                         {
                         foreach ($arrCat as $k => $n) 
                         {
                        ?>

                        
                        <li>
                        <div class="member col-md-4 col-sm-6 col-xs-12">
                            <div class="member-inner">
                                <figure class="profile">
                                    <img class="img-responsive" src="<?=base_url().'assets/images/team/member-1.png'?>" alt=""/>
                                    <figcaption class="info">
                                        <span class="description"><?=$arrCat[$k]->description?></span><br />
                                        <!--<span class="phone"><?=$arrCat[$k]->phone?></span> -->
                                    </figcaption>
                                </figure><!--//profile-->
                                <div class="social">
                                    <ul class="social-list list-inline">
                                        <li><a href="profile.html"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="<?=base_url().'user-section/agency-category/edit/'.$arrCat[$k]->id_daycares?>"><i class="fa fa-pencil"></i></a></li>
                                        <li><a href="<?=base_url().'user-section/agency-category/delete/'.$arrCat[$k]->id_daycares?>"><i class="fa fa-trash"></i></a></li>
                                    </ul><!--//social-list-->
                                </div><!--//social-->
                            </div><!--//member-inner-->
                            <!--<div><br><a href="<?=base_url().'user-section/agency-category/add-new'?>"><button type="button" class="btn btn-cta btn-primary">Add Director&nbsp;&nbsp;<i class="fa fa-plus"></i></button></a></div>-->
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
                        
                </div><!--//story-container--> 
            </div><!--//container-->
        </section><!--//story-video-->
        <script type="text/javascript">
            $(document).ready(function() { 
            var monkeyList = new List('test-list', {
                  valueNames: ['description'],
                  page: 3,
                  pagination: true
                });
        });
        </script>
