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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="<?=base_url().'assets/plugins/font-awesome/css/font-awesome.css'?>">
    <link rel="stylesheet" href="<?=base_url().'assets/plugins/flexslider/flexslider.css'?>">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="<?=base_url().'assets/css/styles.css'?>">
     <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
    <link id="theme-style" rel="stylesheet" href="<?=base_url().'assets/css/datatables.css'?>">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
    <!--bootstrap -->
    
    
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
                    <a href="<?=base_url().'user-section/home'?>">ETC <span class="sub">Agency</span></a>
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
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Personnel <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url().'daycare/employee_list'?>">List</a></li>
                                    <li><a href="<?= base_url(). 'daycare/personnel_registration'?>">Registration</a></li>             
                                    <li><a href="<?= base_url().'examples/employees_management'?>">Employee Management</a></li>            
                                </ul>                            
                            </li><!--//dropdown-->
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">CRUDS SU <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url().'examples/categories'?>">Categories</a></li>
                                    <li><a href="<?= base_url().'examples/quizztypes'?>">Quizz Types</a></li> 
                                    <li><a href="<?= base_url().'examples/questiontypes'?>">Question Types</a></li> 
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>