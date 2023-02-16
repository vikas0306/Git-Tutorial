<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
	<form action="<?=site_url('Welcome/generate_xml')?>" method="post">
	  	<div class="form-group">
		    <label for="exampleInputEmail1">Name</label>
		    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">
		    <small id="emailHelp" class="form-text text-muted"></small>
	  	</div>
	  	<div class="form-group">
		    <label for="exampleInputPassword1">Mobile</label>
		    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile number">
	  	</div> 
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>  
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</body>
</html>
