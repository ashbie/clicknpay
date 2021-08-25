<?php 
	session_start(); 

	if (!isset($_SESSION['cin']) && !isset($_SESSION['name'])) {
		$_SESSION['msg'] = "ACCESS NON AUTORISÉ";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['cin']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home: Click n Pay</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link href="fontawesome/css/all.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="css/mdb.min.css">
        <!-- custom styles -->
        <link rel="stylesheet" href="css/index-header.css">
</head>
<body>

<?php include('index-header.php') ?>

	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert" >
				<p>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</p>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['cin'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['name']; ?></strong></p>
		<?php endif ?>

	</div>
		
</body>
</html>