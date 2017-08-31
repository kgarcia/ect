</div><!--//wrapper-->
    
    <!-- ******FOOTER****** --> 
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">                    
                    <div class="footer-col links col-md-2 col-sm-4 col-xs-12">
                        <div class="footer-col-inner">
                            <h3 class="title"><?=$this->session->userdata('aboutus_footer')?></h3><!--
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-caret-right"></i>Who we are</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>Press</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>Blog</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>Jobs</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>Contact us</a></li>
                            </ul>-->
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->    
                    <div class="footer-col links col-md-2 col-sm-4 col-xs-12">
                        <div class="footer-col-inner">
                            <h3 class="title"><?=$this->session->userdata('product_footer')?></h3><!--
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-caret-right"></i>How it works</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>API</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>Download Apps</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>Pricing</a></li>
                            </ul>-->
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->              
                    <div class="footer-col links col-md-2 col-sm-4 col-xs-12 sm-break">
                        <div class="footer-col-inner">
                            <h3 class="title"><?=$this->session->userdata('others_footer')?></h3><!--
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-caret-right"></i>Help</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>Documentation</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>Terms of services</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>Privacy</a></li>
                            </ul>-->
                        </div><!--//footer-col-inner-->            
                    </div><!--//foooter-col-->   
                    <div class="footer-col connect col-xs-12 col-md-6">
                        <div class="footer-col-inner">
                            <ul class="social list-inline">
                                <li><a href="https://twitter.com/3rdwave_themes" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>                    
                            </ul>
                            <div class="form-container">
                                <p class="intro"><?=$this->session->userdata('stay_footer')?></p>
                                <form class="signup-form navbar-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?=$this->session->userdata('enteremail_footer')?>">
                                    </div>   
                                    <button type="submit" class="btn btn-cta btn-cta-primary"><?=$this->session->userdata('subscribe_footer')?></button>                                 
                                </form>                               
                            </div><!--//subscription-form-->
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                    <div class="clearfix"></div> 
                </div><!--//row-->
            </div><!--//container-->
        </div><!--//footer-content-->
        <div class="bottom-bar">
            <div class="container">
                <small class="copyright"><?=$this->session->userdata('copyright_footer')?> @ <a href="http://DiazApps.com/" target="_blank">DiazApps</a></small>                
            </div><!--//container-->
        </div><!--//bottom-bar-->
    </footer><!--//footer-->
 
    <!-- Javascript -->          
    <script type="text/javascript" src="<?=base_url().'assets/plugins/jquery-1.12.3.min.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'assets/plugins/bootstrap/js/bootstrap.min.js'?>"></script> 
    <script type="text/javascript" src="<?=base_url().'assets/plugins/list/dist/list.min.js'?>"></script> 
    <script type="text/javascript" src="<?=base_url().'assets/plugins/bootstrap-hover-dropdown.min.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'assets/plugins/back-to-top.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'assets/plugins/jquery-placeholder/jquery.placeholder.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'assets/plugins/FitVids/jquery.fitvids.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'assets/plugins/flexslider/jquery.flexslider-min.js'?>"></script> 
               
    
    <script type="text/javascript" src="<?=base_url().'assets/js/main.js'?>"></script>
    <script src="<?=base_url().'assets/vendors/datatables/js/jquery.dataTables.js'?>"></script>
    <script src="<?=base_url().'assets/js/DT_bootstrap.js'?>"></script>
    
            
</body>
</html> 