<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Registration Form</title>

    <!-- Font Awesome -->
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- custom styles -->
    <link rel="stylesheet" href="css/register.css">

</head>
<body>


<div class="container-fluid">
<div class="row no-gutters">
    <div class="col-8" id="left">
    <h1 id="title"><a href="home.php" style="color:#fff;">CLICK & PAY</a></h1>
    <div id="text">
    <p id="description">
    Acheter des films, des jeux ou des chansons
    <br/>
    <i class="fa fa-video"></i>
    <i class="fa fa-gamepad"></i>
    <i class="fa fa-music"></i>
    </p>
  </div>
  <div class="badges">
      <p>Notre nouvelle application est maintenant disponible</p>
      <a href="#"><img src="img/badges/windows.png"></a> <a href="#"><img src="img/badges/google.png"></a> <a href="#"><img src="img/badges/apple.png"></a>
  </div>
</div>

<div class="col-4" id="right">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
    <h4 class="card-title py-3 text-center">Cr&eacute;er votre compte gratuit !</h4>
    <p>
    <div class="row">

    <div class="col-6">
		<a href="" class="btn btn-block btn-google mb-1"> <i class="fab fa-google"></i>   S'ENREGISTRER</a>
    </div>
    <div class="col-6">
		<a href="" class="btn btn-block btn-facebook mb-1"> <i class="fab fa-facebook-f"></i>   S'ENREGISTRER</a>
    </div>
    </p>

    </div>
	<p class="divider-text">
        <span class="bg-light">OU</span>
    </p>
	<form action="register.php" method="post">
            <?php include('errors.php'); ?>

            
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input class="form-control" type="text" name="name" placeholder="Nom &ast;" value="<?php echo $name; ?>" autocomplete="off" required="required">
    </div><!-- form-group// -->

    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		 </div>
        <input class="form-control" type="number" name="telephone" placeholder="Num&eacute;ro de telephone &ast;" value="<?php echo $telephone; ?>" autocomplete="off" required="required">
    </div><!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-key"></i> </span>
		 </div>
        <input class="form-control" type="number" name="cin" placeholder="CIN &ast;" value="<?php echo $cin; ?>" autocomplete="off" required="required">
        </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-lock"></i> </span>
		</div>
        <input class="form-control" type="password" name="password_1" placeholder="Mot de Passe &ast;" autocomplete="off" required="required">
    </div> <!-- form-group// -->
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-lock"></i> </span>
		</div>
        <input class="form-control" type="password" name="password_2" placeholder="Confirmez le Mot de Passe &ast;" autocomplete="off" required="required">
    </div><!-- form-group// -->  
     
     <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> J'accepte les <a href="#">conditions d'utilisation</a> &amp; <a href="#">la politique de confidentialit&eacute;</a></label>
		</div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="reg_user"> S'ENREGISTRER  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Avez-vous un compte? <a href="login.php">SE CONNECTER</a> </p>  
    
</div>

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