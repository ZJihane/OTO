<?php
include  'connect.php';
$cin_admin=$_GET['cin'];

$cinn=$_GET['updatemoni'];
$sql1="select * from moniteur where cin3 = '$cinn' " ;
$result1=mysqli_query($con,$sql1);
$row=mysqli_fetch_assoc($result1);
$cin= $row['cin3'];
$email= $row['email3'];
$mdp=$row['mdp3'];
$nom=$row['nom'];
$prenom=$row['prenom'];
$dt=$row['dtn'];
$adresse=$row['adresse'];
$salaire=$row['salaire'];

if(isset($_POST['submit'])){

    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $nom=$_POST['nom'];
    $prenom=$_POST['pre'];
    $input_date=$_POST['ddn'];
    $date=date("Y-m-d",strtotime($input_date));
    $adresse=$_POST['add'];
    $salaire=$_POST['sal'];

    $sql = "update moniteur set email3 = '$email', mdp3 = '$mdp' , nom ='$nom' , prenom = '$prenom' , dtn='$date' , adresse='$adresse' , salaire= '$salaire' where cin3='$cinn' ";
    $result=mysqli_query($con,$sql);

if($result){
    echo '<script type="text/javascript"> ';
    echo 'alert("modification reussie") ; ';
    echo 'window.location.href = "gestmoni.php ?cin='. $cin_admin .'" ;' ;
    echo' </script>';
}
else{
    echo '<script type="text/javascript"> ';
    echo 'alert("echec!") ; ';
    echo 'window.location.href = "gestmoni.php ?cin='. $cin_admin .'" ;' ;
    echo' </script>'; 
}}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/cssadmin/gesm.css">
    <link rel="icon" href="../../images/logo.png">
    <title>Modifier moniteur</title>
</head>
<body>
<div class="loader" style=" position: absolute;
  margin-left:620px ;
  margin-top:300px;">
 <div class="spinner-grow text-danger" role="status">
 <span class="sr-only">Loading...</span>
 </div>
 <div class="spinner-grow text-warning" role="status">
 <span class="sr-only">Loading...</span>
 </div>
 <div class="spinner-grow text-success" role="status">
<span class="sr-only">Loading...</span>
</div>
</div>
<script src="../../js/animation.js"></script>
<nav  class="navbar navbar-expand-lg navbar-light " style="background-color: #8a888285;" >
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
               
                <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar" >
                    
                    <ul class="navbar-nav">
                         <a class="navbar-brand" <?php echo'href= "indexadmin.php ? cin='.$cin_admin.' " '?> ><img src="../../images/logo.png"  style="width:42px;height:42px;"> &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <li class="nav-item" class="accadmin">
                            <a class="nav-link" <?php echo'href= "indexadmin.php ? cin='.$cin_admin.' " '?>><i class="fa fa-home"  ></i>  Accueil  &nbsp;&nbsp;&nbsp;&nbsp; </a>
                        </li>
                        <li class="nav-item" class="gestvadmin">
                            <a class="nav-link" <?php echo'href="gestveh.php ? cin='.$cin_admin.'" '?>><i class="fa fa-car"  ></i> Gestion Véhicule  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item" class="gestt">
                            <a class="nav-link" <?php echo' href="gesttarif.php ? cin='.$cin_admin.'"' ?>><i class="fa fa-money"  ></i>  Gestion Tarif  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item" class="gestm">
                            <a class="nav-link" <?php echo'href="gestmoni.php ? cin='.$cin_admin.'"'?>><i class="fa fa-user"  ></i>  Gestion Moniteur  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item" class="gesta">
                            <a class="nav-link" <?php echo'href="admindonnees.php ? cin='.$cin_admin.'"'?>><i class="fa fa-id-card-o"  ></i>  Mes données  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../htmlpersonne/index.html"> <i class="fa fa-sign-out" class="déconnexion" ></i> Déconnexion  &nbsp;&nbsp;&nbsp;&nbsp;</a>

                        </li>
                    </ul>
                   
                   </div>
</nav>   

    <fieldset>
    <form method="POST" > 
        
        <label>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="name" name="nom" size="30"value=<?php echo $nom ;?> ><br>

        <label>Prénom:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="name" name="pre"size="30" value=<?php echo $prenom ;?> ><br>


       <label>E-mail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</</label>
       <input type="email" name="email" size="30" value=<?php echo $email ;?>><br>

        <label> Mot de passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="name" name="mdp" size="30" value=<?php echo $mdp ;?> ><br>

        <label>Date de naissance :</label>
        <input type="date" name="ddn" size="30" required value=<?php echo $dt ;?> > <br>

        <label>Adresse:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" name="add"  size="30" value=<?php echo $adresse ;?> ><br>


        <label>Salaire :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="number" name="sal"value=<?php echo $salaire ;?> ><br>

        
        <button type="submit"name="submit" class="btn btn-primary" >enregistrer <i class="fa fa-save"  aria-hidden="true"></i></button>
  </form>
    </fieldset>
</body>
</html>