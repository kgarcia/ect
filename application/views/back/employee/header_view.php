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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head> 

<body class="blog-page blog-archive-page">
<div class="wrapper">
        <!-- ******HEADER****** --> 
        <header class="header header-blog">  
            <div class="container">       
                <h1 class="logo">
                    <a href="<?=base_url().'user-section/home'?>">STC <span class="sub"><?=$this->session->userdata('employee_label')?></span></a>
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
                            <li class="nav-item"><a href="<?=base_url().'user-section/language/index/english'?>"><img src="<?=base_url().'assets/images/Usa.png'?>" alt=""></a></li>
                            <li class="nav-item"><a href="<?=base_url().'user-section/language/index/spanish'?>"><img src="<?=base_url().'assets/images/Spain.png'?>" alt=""></a></a></li>
                            <li class="nav-item"><a href="<?=base_url().'user-section/home'?>"><?=$this->session->userdata('home_item')?></a></li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#"><?=$this->session->userdata('workshops_item')?> <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url().'workshops/completed'?>"><?=$this->session->userdata('workshops_completed_item')?></a></li>
                                    <li><a href="<?=base_url().'workshops/all'?>"><?=$this->session->userdata('workshops_all_item')?></a></li>             
                                </ul>                            
                            </li><!--//dropdown-->
                            <li class="nav-item"><a href="<?=base_url().'quiz/preservice'?>"><?=$this->session->userdata('quiz_item')?></a></li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#"><?=$this->session->userdata('reports_item')?> <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url().'workshops/per_year'?>"><?=$this->session->userdata('reports_work_per_year_item')?></a></li>           
                                </ul>                            
                            </li><!--//dropdown-->
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#"><i class="fa fa-user"></i>  <?=$this->session->userdata('name')?> <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url().'profile'?>"><?=$this->session->userdata('profile_item')?></a></li>
                                    <li><a href="<?=base_url().'change_password'?>"><?=$this->session->userdata('change_password_item')?></a></li>
                                    <li><a href="<?=base_url().'certification/upload'?>"><?=$this->session->userdata('up_cert_item')?></a></li>
                                    <li><a href="<?=base_url().'login/logout_ci'?>"><?=$this->session->userdata('signoff_item')?></a></li>             
                                </ul>                            
                            </li><!--//dropdown-->
                        </ul><!--//nav-->                                               
                        
                    </div><!--//navabr-collapse-->
                </nav><!--//main-nav-->         
            </div><!--//container-->
        </header><!--//header-->   