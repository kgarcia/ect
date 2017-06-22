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
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'> 
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
</head> 

<body class="home-page">   
    <!-- ******HEADER****** --> 
    <header id="header" class="header navbar-fixed-top">  
        <div class="container">
                <a href="<?=base_url().'page'?>"><img src="assets/images/logo.png" height="70" alt=""></a>
      			<!--//logo-->
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

                     <!-- Home -->

                    <?php if ($active == 'home') { ?>
                      <li class="active nav-item"><a href="<?=base_url().'page'?>">Home</a></li>          
                     
                    <?php } else { ?>
                     <li class="nav-item"><a href="<?=base_url().'page'?>">Home</a></li>  
                    <?php }?>

                     <!-- About Us -->

                    <?php if ($active == 'about') { ?>
                      <li class="active nav-item"><a href="<?=base_url().'about'?>">About Us</a></li>          
                     
                    <?php } else { ?>
                     <li class="nav-item"><a href="<?=base_url().'about'?>">About Us</a></li>  
                    <?php }?>

                    <!-- Pricing -->
                    
                    <?php if ($active == 'pricing') { ?>
                      <li class="active nav-item"><a href="<?=base_url().'pricing'?>">Pricing</a></li>          
                     
                    <?php } else { ?>
                     <li class="nav-item"><a href="<?=base_url().'pricing'?>">Pricing</a></li>  
                    <?php }?>

                    <!-- Contact Us -->
                    
                    <?php if ($active == 'contact') { ?>
                      <li class="active nav-item"><a href="<?=base_url().'contact'?>">Contact Us</a></li>          
                     
                    <?php } else { ?>
                     <li class="nav-item"><a href="<?=base_url().'contact'?>">Contact Us</a></li>  
                    <?php }?>

                     <!-- Log in -->
                    
                    <?php if ($active == 'login') { ?>
                      <li class="active nav-item"><a href="<?=base_url().'login'?>">Log In</a></li>          
                     
                    <?php } else { ?>
                     <li class="nav-item"><a href="<?=base_url().'login'?>">Log In</a></li>  
                    <?php }?>

                    <!-- Sign Up -->
                    
                    <?php if ($active == 'signup') { ?>
                      <li class="active nav-item"><a href="<?=base_url().'signup'?>">Sign Up</a></li>          
                     
                    <?php } else { ?>
                     <li class="nav-item"><a href="<?=base_url().'signup'?>">Sign Up</a></li>  
                    <?php }?>
                    

                        <!--<li class="active nav-item"><a href="index.html">Home</a></li>
                        <li class="nav-item"><a href="about.html">About Us</a></li>
                        <li class="nav-item"><a href="pricing.html">Pricing</a></li>
                        <li class="nav-item"><a href="contact.html">Contact Us</a></li>                        
                        <li class="nav-item"><a href="login.html">Log in</a></li>
                        <li class="nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href="signup.html">Sign Up</a></li>-->
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->                     
        </div><!--//container-->
    </header><!--//header-->