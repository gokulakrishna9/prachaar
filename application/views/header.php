<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>TSMIDC</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();  ?>assets/css/bootstrap.css" rel="stylesheet">
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url();  ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
   
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();  ?>assets/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url();  ?>assets/js/ie-emulation-modes-warning.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<div id="wrap">
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background: #33ADFF">
      <div class="container-fluid">
        <div class="navbar-header" style="height: 60px;">
		<a class="navbar-brand">
				  <img src="<?php echo base_url();?>assets/images/telangana.png" width="40" alt="" />
		</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle Navigation</span>           
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>            
          </button>
		  
          <a class="navbar-brand" href="#">
		  Telangana State Medical Services  <br> Infrastructure Development Corporation</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li <?php if(preg_match("^welcome$^",current_url()) || preg_match("^login/logout$^",current_url()) || preg_match("^public_org$^",current_url())) echo 'class="active"'; ?>><a href='<?php echo base_url();?>welcome' <?php if(!preg_match("^welcome$^",current_url()) && !preg_match("^public_org$^",current_url()) && !preg_match("^login/logout$^",current_url())) echo 'style="color: black"'; ?> >Home</a></li>
            <li <?php if(preg_match("^welcome/about_us$^",current_url())) echo 'class="active"';?>><a href='<?php echo base_url();  ?>welcome/about_us' <?php if(!preg_match("^welcome/about_us$^",current_url())) echo 'style="color: black"'; ?> >About Us</a></li>
            <li <?php if(preg_match("^welcome/objectives^",current_url())) echo 'class="active"';?>><a href='<?php echo base_url();  ?>welcome/objectives' <?php if(!preg_match("^welcome/objectives^",current_url())) echo 'style="color: black"'; ?> >Objectives</a></li>         
            <li <?php if(preg_match("^welcome/divisions$^",current_url())) echo 'class="active"';?>><a href='<?php echo base_url();  ?>welcome/divisions' <?php if(!preg_match("^welcome/divisions$^",current_url())) echo 'style="color: black"'; ?> >Wings</a></li>
            <li <?php if(preg_match("^welcome/services^",current_url())) echo 'class="active"';?> ><a href='<?php echo base_url();  ?>welcome/services' <?php if(!preg_match("^welcome/services^",current_url())) echo 'style="color: black"'; ?> >Services</a></li>            
            <li <?php if(preg_match("^welcome/who_is_who^",current_url())) echo 'class="active"';?>><a href='<?php echo base_url();?>welcome/who_is_who' <?php if(!preg_match("^welcome/who_is_who^",current_url())) echo 'style="color: black"'; ?> >Who is Who</a></li>
            <li><a href="#" <?php  echo 'style="color: black"'; ?>>RTI</a></li>
            <li <?php if(preg_match("^welcome/contact$^",current_url())) echo 'class="active"';?>><a href='<?php echo base_url();?>welcome/contact' <?php if(!preg_match("^welcome/contact$^",current_url())) echo 'style="color: black"'; ?> >Contact Us</a></li>
            <li <?php if(preg_match("^login$^",current_url())) echo 'class="active"';?>><a href='<?php echo base_url();?>login' <?php if(!preg_match("^login$^",current_url()) || preg_match("^login/logout$^",current_url())) echo 'style="color: black"'; ?> >Login</a></li>
          </ul>          
        </div>
      </div>
    </nav>
	<div class="container">