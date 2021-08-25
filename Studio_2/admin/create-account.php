<?php include('../server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Registration Form</title>

    <!-- Font Awesome -->
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../css/mdb.min.css">
    <!-- custom styles -->
    <link rel="stylesheet" href="../css/register.css">

</head>
<body>


<div class="container-fluid">
<div class="row no-gutters">
    <div class="col-8" id="left">
    <h1 id="title">M & G STORE</h1> 
    <div id="text">
    <p>And I'm a Photographer</p>
  </div>
</div>

<div class="col-4" id="right">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Cr&eacute;ez votre compte gratuit !</h4>
	<p class="divider-text">
        <span class="bg-light">OU</span>
    </p>
	<form action="create-account.php" method="post">
            <?php include('errors.php'); ?>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input class="form-control" type="text" name="admin" placeholder="Pr&eacute;nom &ast;" value="<?php echo $admin; ?>" autocomplete="off" required="required">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input class="form-control" type="email" name="email" placeholder="Email &ast;" value="<?php echo $email; ?>" autocomplete="off" required="required">
        </div> <!-- form-group// -->
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" type="password" name="password_1" placeholder="Mot de Passe &ast;" autocomplete="off" required="required">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" type="password" name="password_2" placeholder="Confirmez le Mot de Passe &ast;" autocomplete="off" required="required">
    </div>
     <!-- form-group// --> 

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="reg_admin"> Cr&eacute;ez Mon Account  </button>
    </div> <!-- form-group// -->                                                                      
</form>
</article>
</div> <!-- card.// -->

</div>

</div>

</div> 
<!--container end.//-->

    <!-- Include JS files here -->

        <!-- jQuery -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <!-- Your custom scripts (optional) -->
        <script type="text/javascript"></script>


</body>
</html>    