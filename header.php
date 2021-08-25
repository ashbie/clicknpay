<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	
</head>
<body>

<nav class="navbar navbar-icon-top fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand pr-5" href="#"><img src="img/badges/logo.png" style="width: 70px; height: 70px; border-radius: 50%;" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <!-- icons from: http://www.iconarchive.com/ -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto pl-5">
      <li class="nav-item pr-3">
        <a class="nav-link" href="flims.php">
        <i class="fa fa-video"></i>
          <span>Flims</span>
          </a>
      </li>
      <li class="nav-item pr-3">
        <a class="nav-link" href="games.php">
        <i class="fa fa-gamepad"></i>
          <span>Jeux</span>
        </a>
      </li>
      <li class="nav-item pr-3">
        <a class="nav-link" href="songs.php">
        <i class="fa fa-music"></i>
          <span>Chansons</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ">
      <li class="nav-item pr-3">
        <a class="nav-link" href="home.php">
        <i class="fa fa-sign-in-alt"></i>
          <span>Se connecter<span>
        </a>
      </li>
      <li class="nav-item pr-3">
        <a class="nav-link" href="register.php">
        <i class="fa fa-user-plus"></i>
          <span>S'inscrire<span>
        </a>
      </li>
    </ul>
  </div>
</nav>

</body>
</html>