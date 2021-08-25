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
</style>
</head>
<body>
<?php include('../includes/admin-header.php') ?>

<div class="container">
        <h3 class="text-center font-weight-bold text-uppercase py-4">Ajouter un nouvel administrateur</h3>


        <div class="container">
<?php
if(isset($_POST['addnew'])){
    if( empty($_POST['admin']) || empty($_POST['cin']) || empty($_POST['password1']) || empty($_POST['password2']))
    {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Veuillez remplir tous les champs</strong>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
              </div>";
    }
    elseif(($_POST['password1'])!=($_POST['password2'])) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                 <strong>Les deux mots de passe ne correspondent pas</strong>
                 <button type='button' class='close' data-dismiss='alert'>&times;</button>
              </div>";
            

    }else{
        $admin = ($_POST['admin']);
        $cin = ($_POST['cin']);
        $password1 = ($_POST['password1']);
        $password2 = ($_POST['password2']);

        $password = md5($password1); //encrypt the password before saving in the database

        
        $sql = "INSERT INTO panel(admin,cin,image,password1)
        VALUES('$admin','$cin','$password')";

        if( $con->query($sql) === TRUE){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Le nouvel administrateur a été ajouté avec succès
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  </div>";
        }else{
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Erreur: Une erreur s'est produite lors de l'ajout du nouvel administrateur
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  </div>";
        }
    }
}
?>

        <form action="" method="POST"  enctype="multipart/form-data" class="form-horizontal">

    <div class="table-responsive">     
    <table id="mytable" class="table table-bordered table-responsive-md table-striped text-center">

    <thead>
       <th><label for="admin">Nom</label></th>
       <th><label for="cin">CIN</label></th>
       <th><label for="password1">Mot de passe</label></th>
       <th><label for="password2">Confirmez le mot de passe</label></th>
       <th>Ajouter</th>
    </thead>
    <tbody>
    <tr>
        <td><input type="text" id="admin" name="admin" class="form-control" placeholder="Ex: Rabson" /></td>
        <td><input type="number" name="cin" id="cin" class="form-control" placeholder="Ex: 907438261" /></td>
        <td><input type="password" name="password1" id="password1" class="form-control" placeholder="Ex: uniCASA1234" /></td>
        <td><input type="password" name="password2" id="password2" class="form-control" placeholder="Ex: uniCASA1234" /></td>
        <td><button class="btn btn-success btn-sm" type="submit" name="addnew"><i class="fas fa-plus"></button></td>
    </tr>
    </tbody>
    </div>
    </table>
    </form>
    </div>

</div>


<h3 class="text-center font-weight-bold text-uppercase py-4">Liste de tous les administrateurs</h3>

<?php

echo "<div class='container'>";


if( isset($_POST['delete'])){
    $sql = "DELETE FROM panel WHERE id=" . $_POST['id'];
    if($con->query($sql) === TRUE){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                L'administrateur a été supprimé avec succès
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
              </div>";
    }
}


$sql = "SELECT * FROM panel";
$result = $con->query($sql);


if( $result->num_rows > 0)
{
?>

<div class="table-responsive">
             
<table id="mytable" class="table table-bordered table-responsive-md table-striped text-center">
     
     <thead class="black white-text">
     <th>Nom</th>
     <th>CIN</th>
     <th>Mot de Passe</th>
     <th>Éditer</th>   
     <th>Supprimer</th>
     </thead>
<tbody>
    <?php
    while( $row = $result->fetch_assoc()){
        echo "<form action='' method='POST' enctype='multipart/form-data'>"; //added
        echo "<input type='hidden' value='". $row['id']."' name='id' />"; //added
        echo "<tr>";
        echo "<td>".$row['admin'] . "</td>";
        echo "<td>".$row['cin'] . "</td>";
        echo "<td>".$row['password'] . "</td>";
        echo "<td><p data-placement='top'><a href='edit.php?id=".$row['id']."' class='btn btn-info btn-sm'><i class='fas fa-edit'></i></a></p></td>";
        echo "<td><p data-placement='top'><button class='btn btn-danger btn-sm' type='submit' name='delete' data-title='Delete' data-toggle='modal' data-telephone='#delete' ><i class='fas fa-trash-alt'></i></button></p></td>";
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
    echo "<br/><div class='alert alert-dark' role='alert'>Aucun Administrateur trouvé</div>";
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