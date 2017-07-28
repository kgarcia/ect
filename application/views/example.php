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
	<br><br><br>
	<div class="container">
	<div style='height:60px;' ><h1 alisn="center"><?php echo $title; ?></h1></div>  
    <div>
		<?php echo $output; ?>
    </div>
<br><br>
    </div>
</body>

