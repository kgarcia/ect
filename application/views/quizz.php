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
	<div>
		<a href='<?php echo site_url('examples/customers_management')?>'>Customers</a> |
		<a href='<?php echo site_url('examples/orders_management')?>'>Orders</a> |
		<a href='<?php echo site_url('examples/products_management')?>'>Products</a> |
		<a href='<?php echo site_url('examples/offices_management')?>'>Offices</a> | 
		<a href='<?php echo site_url('examples/employees_management')?>'>Employees</a> |		 
		<a href='<?php echo site_url('examples/film_management')?>'>Films</a> |
		<a href='<?php echo site_url('examples/multigrids')?>'>Multigrid [BETA]</a>
		
	</div>
	<br>
	<div class="container">
	<div style='height:60px;' ><h1 alisn="center">Questions</h1></div>  
    <div>
		<?php echo $output; ?>
    </div>
    <br><br>
    </div>
</body>

