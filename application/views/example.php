<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>
<!-- ******Features Section****** -->       
        <section class="features-tabbed section">
            <div class="container"><br>
                <h2 class="page-title text-center"><i class="fa fa-users"></i> <?= $title ?></h2><br><br>
                <div class="row">
                    <div class="blog-list blog-category-list">
                        <article>
    <div>
		<?php echo $output; ?>
    </div>
</article>                  
                    </div><!--//blog-list--> 
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//features-tabbed-->       
    </div><!--//wrapper-->

</body>

