<?php 
	session_start(); 

	if (!isset($_SESSION['admin'])) {
		$_SESSION['msg'] = "Il faut se connecter";
		header('location: ../login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['admin']);
		header("location: ../login.php");
	}
	require_once 'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
<style>
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    text-align: center;
}
::-moz-placeholder { /* Firefox 19+ */
    text-align: center;
}
:-ms-input-placeholder { /* IE 10+ */
    text-align: center;
}
:-moz-placeholder { /* Firefox 18- */
    text-align: center;
}
ul {
    display: inline;
}
li {
    list-style-type: lower-roman;
    display: inline;
    padding-right: 20px;
}
li form {
    display: inline !important;
}
.filters form {
    display: inline;
}
</style>
</head>
<body>
<?php include('../includes/admin-header.php') ?>


<h3 class="text-center font-weight-bold text-uppercase py-4">Liste de tous les utilisateurs</h3>

<?php

echo "<div class='container'>";


if( isset($_POST['delete'])){
    $sql = "DELETE FROM users WHERE id=" . $_POST['id'];
    if($con->query($sql) === TRUE){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>L'utilisateur a été supprimé avec succès de la base de données</strong>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
              </div>";
    }
}

if(isset($_POST['name_asc'])){
    $sql = "SELECT * FROM users ORDER BY name ASC"; 
}
elseif(isset($_POST['name_desc'])){
    $sql = "SELECT * FROM users ORDER BY name DESC"; 
}
elseif(isset($_POST['cin_asc'])){
    $sql = "SELECT * FROM users ORDER BY cin ASC"; 
}
elseif(isset($_POST['cin_desc'])){
    $sql = "SELECT * FROM users ORDER BY cin DESC"; 
}
elseif(isset($_POST['all'])){
    $sql = "SELECT * FROM users"; 
}
else{
    $sql = "SELECT * FROM users";
}

$result = $con->query($sql);


if( $result->num_rows > 0)
{
?>
<div class="filters">
<strong>Filtrer par...</strong>
<form method="post">
<ul>
    <li><button class="btn btn-success btn-sm" name="all">Tous</button></li>
    <li><button class="btn btn-info btn-sm" name="name_asc"> Nom <i class="fas fa-arrow-up pl-2"></i></button></li>
    <li><button class="btn btn-info btn-sm" name="name_desc"> Nom <i class="fas fa-arrow-down pl-2"></i></button></li>
    <li><button class="btn btn-info btn-sm" name="cin_asc"> CIN <i class="fas fa-arrow-up pl-2"></i></button></li>
    <li><button class="btn btn-info btn-sm" name="cin_desc"> CIN <i class="fas fa-arrow-down pl-2"></i></button></li>
    <li>
         <!-- Search form -->
        <div class="form-inline mr-0" style="float: right;">
            <input class="form-control form-control-sm mr-3 w-30" type="text" placeholder="Chercher" aria-label="Chercher">
            <button class="btn btn-sm btn-success ml-0" name="search"><i class="fas fa-search" aria-hidden="true"></i></button>
        </div>
    </li>
</ul>
</form>
</div>
 
<div class="table-responsive mt-4">
             
<table id="mytable" class="table table-bordered table-responsive-md table-striped text-center">
     
     <thead class="black white-text">
      <th>Nom</th>
      <th>CIN</th>
      <th>Telephone</th>
      <th>Éditer</th>
      <th>Supprimer</th>
     </thead>
<tbody>
    <?php
    while( $row = $result->fetch_assoc()){
        echo "<form action='' method='POST' enctype='multipart/form-data'>"; //added
        echo "<input type='hidden' value='". $row['cin']."' name='cin' />"; //added
        echo "<tr>";
        echo "<td>".$row['name'] . "</td>";
        echo "<td>".$row['cin'] . "</td>";
        echo "<td>".$row['telephone'] . "</td>";
        echo "<td><p data-placement='top'><a href='edit.php?cin=".$row['cin']."' class='btn btn-info btn-sm'><i class='fas fa-edit'></i></a></p></td>";
        echo "<td><p data-placement='top'><button class='btn btn-danger btn-sm' type='submit' name='delete' data-title='Delete' data-toggle='modal' data-target='#delete' ><i class='fas fa-trash-alt'></i></button></p></td>";
        echo "</tr>";
        echo "</form>"; //added
    }
    
?>
</tbody>
</table>
<?php
}
else
{
    echo "<br/><div class='alert alert-dark' role='alert'>Aucun produit trouvé</div>";
}
?>
</div>

 <!-- Include JS files here -->

        <!-- jQuery -->
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="../js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="../js/mdb.min.js"></script>
        <!-- Your custom scripts (optional) -->
        <script type="text/javascript"></script>
		
</body>
</html>

</body>
</html>