<?php include('server.php') ?>

<?php 
/*$db = mysqli_connect('localhost', 'root', '', 'registration');
	$query="";
	$results2="";
	$query2 = "SELECT * from `panel` where admin = 'Rabson'";
	$results2 = mysqli_query($db, $query2);
	$row2 = mysqli_fetch_array($results2,MYSQLI_ASSOC);
	$pass =$row2['password'];
	$pass = md5($pass);
	#echo $pass;
	echo $row2['password'];
	echo '<br>'.$pass;  */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Sign In: M & G STORE</title>

    <!-- Font Awesome -->
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- custom styles -->
    <link rel="stylesheet" href="css/login.css">
	

	</head>
<body>

<div class="row no gutters">

<div class="col-3"></div>

<div class="col-6">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 800px;">
	<h1 class="card-title mt-3 text-center">CLICK & PAY</h1>
	<p class="text-center">Vous pouvez vous connecter avec...</p>
	<p>
		<div class="row">
			<div class="col-6">
		<a href="" class="btn btn-block btn-google"> <i class="fab fa-google"></i>   Google</a>
</div>
<div class="col-6">
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>  &nbsp;&nbsp;&nbsp; facebook</a>
</div>
</div>	
	</p>

	<p class="divider-text">
        <span class="bg-light">OU <strong>:</strong> utilisez vos informations d'identification</span>
    </p>
	
	<form method="post" action="login.php">

		<?php include 'errors.php'; ?>

		<div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		 </div>
        <input class="form-control" type="number" name="cin" placeholder="CIN &ast;" autocomplete="off" required="required">
    </div> <!-- form-group// -->

		 <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-key"></i> </span>
		</div>
        <input class="form-control" type="password" name="password" placeholder="Mot de Passe &ast;" autocomplete="off" required="required">
    </div> <!-- form-group// -->

    <p class="divider-text">
        <span class="bg-light">SE CONNECTER COMME...</span>
    </p>
     <div class="row" id="signin-buttons">

	 <div class="col-6">
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block" name="login_user">CLIENT <i class="fas fa-user"></i> </button>
		</div>
	  </div>
	  
      <div class="col-6">
        <div class="form-group">
			<button type="submit" class="btn btn-primary btn-block" name="login_admin">ADMIN <i class="fas fa-user-cog"></i> </button>
		</div>
      </div>
     </div>

		<p id="member-question">
		Pas encore membre? 
		</p>
		<div class="form-group" id="create-account-button">
			<a type="button" href="register.php" class="btn btn-primary btn-block">CR&Eacute;ER VOTRE COMPTE</a>
		</div>

		<p class="text-center">Copyright @ <?php echo date("Y"); ?> &nbsp; | &nbsp;<a href="index.php" style="font-weight: 400; text-decoration:none; color: #000; letter-spacing:1px; font-size:1.3em;">
            CLICK & PAY
        </a>
        </p>
	</form>
</article>
	</div>

	<div class="col-3"></div>
</div>
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