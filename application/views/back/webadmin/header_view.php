<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title><?=$title?></title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'> <?=base_url().''?>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="<?=base_url().'assets/plugins/bootstrap/css/bootstrap.min.css'?>">   
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="<?=base_url().'assets/plugins/font-awesome/css/font-awesome.css'?>">
    <link rel="stylesheet" href="<?=base_url().'assets/plugins/flexslider/flexslider.css'?>">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="<?=base_url().'assets/css/styles.css'?>">
    <link id="theme-style" rel="stylesheet" href="<?=base_url().'assets/plugins/ui/jquery-ui.css'?>">
    <script type="text/javascript" src="<?=base_url().'assets/plugins/jquery-1.12.3.min.js'?>"></script>
    <script type="text/javascript" src="<?=base_url().'assets/plugins/ui/jquery-ui.min.js'?>"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body class="blog-page blog-archive-page">
<div class="wrapper">
        <!-- ******HEADER****** --> 
        <header class="header header-blog">  
            <div class="container">       
                <h1 class="logo">
                    <a href="<?=base_url().'user-section/home'?>">ECT <span class="sub"><?=$title?></span></a>
                </h1><!--//logo-->
                <nav class="main-nav navbar-right" role="navigation">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button><!--//nav-toggle-->
                    </div><!--//navbar-header-->
                    <div id="navbar-collapse" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a href="<?=base_url().'user-section/home'?>">Home</a></li>
                            <li class="nav-item"><a href="<?=base_url().'user-section/admin-daycare'?>">DayCares</a></li>
                            <li class="nav-item"><a href="<?=base_url().'user-section/admin-vendor'?>">Vendors</a></li>
                            <li class="nav-item"><a href="<?=base_url().'user-section/admin-workshop'?>">Workshops</a></li>                  
                            <!--//dropdown-->

                             <!--<li class="nav-item dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="" > Workshops<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url().'user-section/admin-category'?>">Categories</a></li>
                                    <li><a href="<?=base_url().'user-section/admin-workshop'?>">Workshops</a></li> 
                                               
                                </ul>                            
                            </li>-->
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="">Reports <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">Daycare Certifications</a></li>
                                    <li><a href="">Personnel Certifications.</a></li> 
                                    <li><a href="reportexcel.html">To Export</a></li>            
                                </ul>                            
                            </li><!--//dropdown-->
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#"><i class="fa fa-user"></i>  <?=$this->session->userdata('name')?> <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Upload certificate</a></li>
                                    <li><a href="<?=base_url().'login/logout_ci'?>">Sign Off</a></li>             
                                </ul>                            
                            </li><!--//dropdown-->
                        </ul><!--//nav-->                                               
                        
                    </div><!--//navabr-collapse-->
                </nav><!--//main-nav-->         
            </div><!--//container-->
        </header><!--//header-->   