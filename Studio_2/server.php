<?php 
	session_start();

	// variable declaration
	$admin = "";
	$name = "";
	$telephone = "";
	$cin = "";
	$password = "";
	$password_1 = "";
	$password_2 = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to user database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$telephone = mysqli_real_escape_string($db, $_POST['telephone']);
		$cin = mysqli_real_escape_string($db, $_POST['cin']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($name)) { array_push($errors, "Le Nom est requis"); }
		if (empty($telephone)) { array_push($errors, "Le numéro de telephone est requis"); }
		if (empty($cin)) { array_push($errors, "Le CIN est requis"); }
		if (empty($password_1)) { array_push($errors, "Le mot de passe est requis"); }

		if ($password_1 != $password_2) {
			array_push($errors, "Les deux mots de passe ne correspondent pas");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (cin, name, telephone, password) 
					  VALUES('$cin', '$name', '$telephone', '$password')";
			mysqli_query($db, $query);

			$_SESSION['name'] = $name;
			$_SESSION['cin'] = $cin;
			$_SESSION['telephone'] = $telephone;
			$_SESSION['success'] = "Vous êtes maintenant connecté: " .$name. ", ".$telephone;
			header('location: index.php');
		}

	}



		// REGISTER ADMIN
		if (isset($_POST['reg_admin'])) {
			// receive all input values from the form
			$admin = mysqli_real_escape_string($db, $_POST['admin']);
			$cin = mysqli_real_escape_string($db, $_POST['cin']);
			$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
			$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	
			// form validation: ensure that the form is correctly filled
			if (empty($admin)) { array_push($errors, "Le nom est requis"); }
			if (empty($cin)) { array_push($errors, "E-mail est requis"); }
			if (empty($password_1)) { array_push($errors, "Le mot de passe est requis"); }
	
			if ($password_1 != $password_2) {
				array_push($errors, "Les deux mots de passe ne correspondent pas");
			}
	
			// register admin if there are no errors in the form
			if (count($errors) == 0) { 

				$password = md5($password_1);//encrypt the password before saving in the database
				$query = "INSERT INTO panel (admin, cin, password) 
						  VALUES('$admin', '$cin', '$password')";
				mysqli_query($db, $query);
	
				$_SESSION['admin'] = $admin;
				$_SESSION['cin'] = $cin;
				$_SESSION['success'] = "Vous êtes maintenant connecté: " .$admin. ", ".$cin;
				header('location: dashboard.php');
			}
	
		}
	


	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$cin = mysqli_real_escape_string($db, $_POST['cin']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($cin)) {
			array_push($errors, "CIN est requis");
		}
		if (empty($password)) {
			array_push($errors, "Le mot de passe est requis");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE cin='$cin' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['cin'] = $cin;
				$_SESSION['name'] = $name;
				$_SESSION['telephone'] = $telephone;
				$_SESSION['success'] = "Vous êtes maintenant connecté: " .$name. ", ".$telephone;
				header('location: index.php');
			}else {
				array_push($errors, "Mauvaise combinaison CIN / mot de passe");
			}
		}
	}



	// LOGIN ADMIN
	if (isset($_POST['login_admin'])) {
		$cin = mysqli_real_escape_string($db, $_POST['cin']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($cin)) {
			array_push($errors, "CIN est requis");
		}
		if (empty($password)) {
			array_push($errors, "le mot de passe est requis");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM panel WHERE cin='$cin' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['admin'] = $admin;
				$_SESSION['cin'] = $cin;
				$_SESSION['success'] = "Vous êtes maintenant connecté: " .$_SESSION['admin'];
				header('location: admin/dashboard.php');
			}else {
				array_push($errors, "Mauvaise combinaison CIN / mot de passe");
			}
		}
	}


?>