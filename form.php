<?php 
    session_start(); 
    
	include('admin/connect.php');

	if (!isset($_SESSION['cin']) && !isset($_SESSION['name'])) {
		$_SESSION['msg'] = "ACCESS NON AUTORISÉ";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['cin']);
		header("location: login.php");
    }
    
$status="";
// movies
if (isset($_POST['movie_id']) && $_POST['movie_id']!=""){
$movie_id = $_POST['movie_id'];
$result_mov = mysqli_query($con,"SELECT * FROM `movies` WHERE `movie_id`='$movie_id'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$movie_id = $row['movie_id'];
$price = $row['price'];
$video_clip = $row['video_clip'];
$genre = $row['genre'];
$language = $row['language'];
}

// songs
if (isset($_POST['song_id']) && $_POST['song_id']!=""){
    $id = $_POST['id'];
    $result_song = mysqli_query($con,"SELECT * FROM `songs` WHERE `id`='$song_id'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $id = $row['song_id'];
    $price = $row['price'];
    $image = $row['image'];
    $genre = $row['genre'];
    $clip = $row['clip'];
}

//games
if (isset($_POST['id']) && $_POST['id']!=""){
    $id = $_POST['id'];
    $result_game = mysqli_query($con,"SELECT * FROM `games` WHERE `id`='$id'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $id = $row['id'];
    $price = $row['price'];
    $image = $row['image'];
    $platform = $row['platform'];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Commande</title>
  <!-- Font Awesome -->
  <link href="fontawesome/css/all.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="css/mdb.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="ionicons/css/ionicons.min.css">
        <!-- custom styles -->
        <link rel="stylesheet" href="css/partners.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/home.css">
        <style type="text/css">
            .container{
                margin-top: 50px;
            }
            body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-confirm {		
		color: #434e65;
		width: 525px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		font-size: 16px;
		border-radius: 5px;
		border: none;
	}
	.modal-confirm .modal-header {
		background: #47c9a2;
		border-bottom: none;   
        position: relative;
		text-align: center;
		margin: -20px -20px 0;
		border-radius: 5px 5px 0 0;
		padding: 35px;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 36px;
		margin: 10px 0;
	}
	.modal-confirm .form-control, .modal-confirm .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-confirm .close {
        position: absolute;
		top: 15px;
		right: 15px;
		color: #fff;
		text-shadow: none;
		opacity: 0.5;
	}
	.modal-confirm .close:hover {
		opacity: 0.8;
	}
	.modal-confirm .icon-box {
		color: #fff;	
		display: inline-block;
		z-index: 9;
		padding: 15px;
		text-align: center;
		font-size: 30px;
	}
	.modal-confirm.modal-dialog {
		margin-top: 80px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #eeb711;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
		border-radius: 30px;
		margin-top: 10px;
		padding: 6px 20px;
        border: none;
    }
	.modal-confirm .btn:hover, .modal-confirm .btn:focus {
		background: #eda645;
		outline: none;
	}
	.modal-confirm .btn span {
		margin: 1px 3px 0;
		float: left;
	}
	.modal-confirm .btn i {
		margin-left: 1px;
		font-size: 20px;
		float: right;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
        </style>
</head>
<body>
<?php
	$commandNumber=rand(1000000,20000000);
	$productNumber=rand(100,1000);
if(isset($_POST['confirm'])){

        $sql = "INSERT INTO users(product_name,product_price,commandNumber,productNumber)
        VALUES('$name','$price','$commandNumber','$productNumber')";

        if( $con->query($sql) === TRUE){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'> Bien execute
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  </div>";
        }else{
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Erreur: Une erreur s'est produite lors de l'achat du produit
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  </div>";
        }
}
?>

  <!-- Start your project here-->  
 <!-- Default form register -->

 
 <div class="container">
  <!-- Start of row 1-->
  
 <!-- Start of  column -->
 <?php include('index-header.php') ?>
 
 <br><br><br>
 <!-- End of  column -->
 
 <!-- End of row 1-->

 <!-- Start of row 2-->
 <div class="row">
 <div class="col-md-3 mt-9">
 </div>
 <div class="col-md-6 mt-6">
 <form class="text-center border border-light p-5" action="#!">

<p class="h4 mb-4">COMMANDE</p>

<div class="form-row mb-4">
    <div class="col">
        <!-- Nom -->
        <label for="defaultRegisterFormNom">Article</label>
        <!--<input type="text" id="defaultRegisterFormNom" class="form-control" placeholder="Nom">-->
        <select class="browser-default custom-select mb-4" id="choice">
        <option value="" disabled="" selected="">Choose your option</option>
        <?php
        $result_game = mysqli_query($con,"SELECT * FROM `games`");
        $result_mov = mysqli_query($con,"SELECT * FROM `movies`");
        $result_song = mysqli_query($con,"SELECT * FROM `songs`");

        echo "<option value='' disabled='' >==== Les Jeux ====</option>";
while($row = mysqli_fetch_assoc($result_game)){
    echo "<option value='film'>".$row['name']."---------".$row['price']." MAD</option>";


}
echo "<option value='' disabled='' >==== Les Films ====</option>";
while($row = mysqli_fetch_assoc($result_mov)){
    echo "<option value='film'>".$row['name']."---------".$row['price']." MAD</option>";


}
echo "<option value='' disabled='' >==== Les Chansons ====</option>";
while($row = mysqli_fetch_assoc($result_song)){
    echo "<option value='film'>".$row['song']."---------".$row['price']." MAD</option>";


}
mysqli_close($con);?>
        
    </select>
    </div>
    <div class="col">
        <!-- Duree -->
        <label for="defaultRegisterFormNom">Location</label>
       <!-- <input type="text" id="defaultRegisterFormQuantite" class="form-control" placeholder="Quantite"> -->
       <select class="browser-default custom-select mb-4" id="choice">
        <option value="" disabled="" selected="">Choisisez votre choix</option>
        <option value="1_year">Une anne&eacute;</option>
        <option value="2_year">Deux anne&eacute;</option>
        <option value="3_year">Trois anne&eacute;</option>
        </select>
    </div>
</div>


 <!-- <div class="form-row mb-4">
    <div class="col">  -->
        <!-- Prix -->
       <!-- <label for="defaultRegisterFormNom">Prix</label>
        <input type="text" id="defaultRegisterFormPrix" class="form-control" placeholder="Prix">
    </div>
    <div class="col">  -->
        <!-- Total -->
     <!--   <label for="defaultRegisterFormNom">Total</label>
        <input type="text" id="defaultRegisterFormTotal" class="form-control" placeholder="Total">
    </div>
</div> -->


<div class="text-center">
<button class="btn btn-info my-4 btn-block trigger-btn" data-toggle="modal"href="#myModal" id="press">Acheter</button>

</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box" href="#">
					Click n Pay Paiement
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
			</div>
			<div class="modal-body text-center">
				<h2>Merci d'avoir acheté chez nous</h2>
				<h5>Confirmer votre demande</h5> <br/>	
				<p><strong>Numero de Comande: </strong><?php echo $commandNumber;?></p>
				<p><strong>Numero du Produit: </strong><?php echo $productNumber;?></p>
				<button class="btn btn-success" type="submit" name="confirm" data-dismiss="modal"><span>Acheter</span> <i class="fas fa-arrow-right" style="font-size:13px; margin-left:5px;"></i></button>
			</div>
		</div>
	</div>
</div>
<!-- Acheter button -->

<!-- Social register -->


<!-- Terms of service -->

</form>

 </div>
 <!-- End of middle column -->
 <!-- Start of last column -->
 <div class="col-md-3 mt-9">
 </div>
 <!-- End of last column -->
 </div>
 <!-- End of row 2 -->
 <!-- Start of row 3-->
 
 <!-- Start of  column -->

 
 
 <!-- End of  column -->
 
 <!-- End of row 3-->
 </div>
 <!-- End of container -->
 <br><br><br>
 <?php include('footer.php') ?>
 
<!-- Default form register -->
  <!-- End your project here-->

  <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

</body>
</html>
