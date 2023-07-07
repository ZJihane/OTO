<?php
include 'connect.php';
$cin_admin=$_GET['cin'];

$sql1="select * from admin " ;
$result1=mysqli_query($con,$sql1);
$row=mysqli_fetch_assoc($result1);
    $cinn=$row['cin1'];
    $nom=$row['nom_admin'];
    $prenom=$row['prenom_admin'];
    $email=$row['email1'];
    $mdp=$row['mdp1'];
if(isset($_POST['submit'])){

    $cinn=$_POST['cinn'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    
    $sql = "update admin  set   cin1 ='$cinn',nom_admin ='$nom',prenom_admin ='$prenom',email1 ='$email',mdp1 ='$mdp' where cin1='$cin_admin' ";
    $result=mysqli_query($con,$sql);
    
    if($result){
        echo '<script type="text/javascript"> ';
        echo 'alert("modification reussie") ; ';
        echo 'window.location.href = "admindonnees.php? cin='.$cinn.'" ;' ;
        echo' </script>';
    }
    else{
        echo '<script type="text/javascript"> ';
        echo 'alert("echec!") ; ';
        echo 'window.location.href = "admindonnees.php? cin='.$cinn.'" ;' ;
        echo' </script>'; 
    }}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/cssadmin/gest.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link rel="icon" href="../../images/logo.png">
  <title> Modifier mes données</title>
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
                            <a class="nav-link" <?php echo'href= "indexadmin.php ? cin='.$cin_admin.' " '?>><i class="fa fa-home"  ></i>  Accueil  &nbsp;&nbsp;&nbsp;&nbsp;</a>
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
                            <a class="nav-link" <?php echo'href="admindonnees.php ? cin='.$cin_admin.'"'?>><i class="fa fa-id-card-o"  ></i>  Mes données  &nbsp;&nbsp;&nbsp;&nbsp; </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../htmlpersonne/index.html"> <i class="fa fa-sign-out"></i> Déconnexion</a>

                        </li>
                    </ul>
                   
                   </div>
</nav>        </div>
</nav> 
            <fieldset>
        <form method="POST" > 

           <label>CIN :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="name" name="cinn" required size="30" value=<?php echo $cinn ;?>> <br>
           <label>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="name" name="nom" required size="30" value=<?php echo $nom ;?>> <br>
           <label>Prenom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="name" name="prenom" required size="30" value=<?php echo $prenom ;?>> <br>
           <label>E-mail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="email" name="email" required size="30" value=<?php echo $email ;?>> <br>
           <label>Mot de passe :</label>
           <input type="name" name="mdp" required size="30" value=<?php echo $mdp ;?>> <br>

          <button type="submit"name="submit" class="btn btn-primary">Enregistrer <i class="fa fa-save"  aria-hidden="true"></i></button>
         </form>
    </fieldset>
    </body>
</html>