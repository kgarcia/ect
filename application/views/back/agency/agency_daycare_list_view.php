<section class="story-section section section-on-bg">
            <div class=" container text-center"> 
                <div class="" >                    
                    <div class="team row">
                        <h3 class="title">Daycare List</h3>
                        <div class="text-center"><a href="<?=base_url().'user-section/agency-daycare/add-new'?>"><button type="button" class="btn btn-cta btn-cta-primary">Add New&nbsp;&nbsp;<i class="fa fa-plus"></i></button></a></div><br><br>

                        <div class="text-center" id="test-list">
                        <i class="fa fa-search"></i>&nbsp;<input type="text" class="search"><br><br><br>
                        <ul style="list-style:none;" class="list">
                        <?php
                        if (is_array($arrDay))
                         {
                         foreach ($arrDay as $k => $n) 
                         {
                        ?>

                        
                        <li>
                        <div class="member col-md-4 col-sm-6 col-xs-12">
                            <div class="member-inner">
                                <figure class="profile">
                                    <img class="img-responsive" src="<?=base_url().'assets/images/team/member-1.png'?>" alt=""/>
                                    <figcaption class="info">
                                        <span class="name"><?=$arrDay[$k]->name?></span><br />
                                        <span class="phone"><?=$arrDay[$k]->phone?></span> 
                                    </figcaption>
                                </figure><!--//profile-->
                                <div class="social">
                                    <ul class="social-list list-inline">
                                        <li><a href="profile.html"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="<?=base_url().'user-section/agency-daycare/edit/'.$arrDay[$k]->id_daycares?>"><i class="fa fa-pencil"></i></a></li>
                                        <li><a href="<?=base_url().'user-section/agency-daycare/delete/'.$arrDay[$k]->id_daycares?>"><i class="fa fa-trash"></i></a></li>
                                    </ul><!--//social-list-->
                                </div><!--//social-->
                            </div><!--//member-inner-->
                            <!--<div><br><a href="<?=base_url().'user-section/agency-daycare/add-new'?>"><button type="button" class="btn btn-cta btn-primary">Add Director&nbsp;&nbsp;<i class="fa fa-plus"></i></button></a></div>-->
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
                        <!--<div class="member col-md-4 col-sm-6 col-xs-12">
                            <div class="member-inner">
                                <figure class="profile">
                                    <img class="img-responsive" src="<?=base_url().'assets/images/team/member-2.png'?>" alt=""/>
                                    <figcaption class="info">
                                        <span class="name">Jack Tang</span><br />
                                        <span class="job-title">Childcare Director</span>
                                    </figcaption>
                                </figure><!--//profile
                                <div class="social">
                                    <ul class="social-list list-inline">
                                        <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pencil"></i></a></li>
                                    </ul><!--//social-list
                                </div><!--//social
                            </div><!--//member-inner
                        </div><!--//member
                        <div class="member col-md-4 col-sm-6 col-xs-12">
                            <div class="member-inner">
                                <figure class="profile">
                                    <img class="img-responsive" src="<?=base_url().'assets/images/team/member-3.png'?>" alt=""/>
                                    <figcaption class="info">
                                        <span class="name">Anna Perry</span><br />
                                        <span class="job-title">0 - 3 month Room  Care provider</span>
                                    </figcaption>
                                </figure><!--//profile
                                <div class="social">
                                    <ul class="social-list list-inline">
                                        <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pencil"></i></a></li>
                                    </ul><!--//social-list
                                </div><!--//social
                            </div><!--//member-inner
                        </div><!--//member
                        <div class="member col-md-4 col-sm-6 col-xs-12">
                            <div class="member-inner">
                                <figure class="profile">
                                    <img class="img-responsive" src="<?=base_url().'assets/images/team/member-4.png'?>" alt=""/>
                                    <figcaption class="info">
                                        <span class="name">Tim Robertson</span><br />
                                        <span class="job-title">Toddler Room Teacher</span>
                                    </figcaption>
                                </figure><!--//profile
                                <div class="social">
                                    <ul class="social-list list-inline">
                                        <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pencil"></i></a></li>
                                    </ul><!--//social-list
                                </div><!--//social
                            </div><!--//member-inner
                        </div><!--//member
                        <div class="member col-md-4 col-sm-6 col-xs-12">
                            <div class="member-inner">
                                <figure class="profile">
                                    <img class="img-responsive" src="<?=base_url().'assets/images/team/member-5.png'?>" alt=""/>
                                    <figcaption class="info">
                                        <span class="name">Rachel Wu</span><br />
                                        <span class="job-title">Childcare Director</span>
                                    </figcaption>
                                </figure><!--//profile
                                <div class="social">
                                    <ul class="social-list list-inline">
                                        <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pencil"></i></a></li>
                                    </ul><!--//social-list
                                </div><!--//social
                            </div><!--//member-inner
                        </div><!--//member
                        <div class="member col-md-4 col-sm-6 col-xs-12">
                            <div class="member-inner">
                                <figure class="profile">
                                    <img class="img-responsive" src="<?=base_url().'assets/images/team/member-6.png'?>" alt=""/>
                                    <figcaption class="info">
                                        <span class="name">Carl Allison</span><br />
                                        <span class="job-title">0 - 3 month Room  Care provider</span>
                                    </figcaption>
                                </figure><!--//profile
                                <div class="social">
                                    <ul class="social-list list-inline">
                                        <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pencil"></i></a></li>
                                    </ul><!--//social-list
                                </div><!--//social
                            </div><!--//member-inner
                        </div><!--//member

                        -->


                    </div><!--//team-->
                   <!--<div class="pagination-container text-center">
                        <ul class="pagination">
                            <li class="disabled"><a href="#">&laquo;</a></li>
                            <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div><!--//pagination-container-->
                </div><!--//story-container--> 
            </div><!--//container-->
        </section><!--//story-video-->
        <script type="text/javascript">
            $(document).ready(function() { 
            var monkeyList = new List('test-list', {
                  valueNames: ['name', 'phone'],
                  page: 3,
                  pagination: true
                });
        });
        </script>