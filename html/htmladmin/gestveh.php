<?php 
include'connect.php';
$cin_admin=$_GET['cin'];
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/cssadmin/gesv.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta charset="utf-8">
    <link rel="icon" href="../../images/logo.png">
    <title>Véhicules</title>
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
                            <a class="nav-link" <?php echo'href="admindonnees.php ? cin='.$cin_admin.'"'?>><i class="fa fa-id-card-o"  ></i>  Mes données  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../htmlpersonne/index.html"> <i class="fa fa-sign-out" class="déconnexion" ></i> Déconnexion  &nbsp;&nbsp;&nbsp;&nbsp;</a>

                        </li>
                    </ul>
                   
                   </div>
</nav>  
<button class="btn btn-primary"> <a  <?php echo'href= "ajoutveh.php ? cin='.$cin_admin.' " '?>class="text-light"> Ajouter véhicule <i class="fa fa-plus"  ></i></a></button>
<table class="table table-light">
  <thead>
    <tr>
      <th scope="col">Matricule</th>
      <th scope="col">Puissance</th>
      <th scope="col">Enérgie</th>
      <th scope="col">Marque</th>
      <th scope="col">Opération</th>
    </tr>
  </thead>
  <tbody>

  <?php
  $sql='select * from vehicule' ;
  $result=mysqli_query($con,$sql);
  if($result){
      while($row=mysqli_fetch_assoc($result)){
        $matricule= $row['matricule'];
        $puissance= $row['puissance'];
        $energie=$row['energie'];
        $marque=$row['marque'];
        echo'
        <tr>
        <th scope="row">'.$matricule.'</th>
        <td>'.$puissance.'</td>
        <td>'.$energie.'</td>
        <td>'.$marque.'</td>
        <td>
        <button class="btn btn-primary"><a href="modifveh.php? updatemat='.$matricule.' & cin='. $cin_admin .'" class="text-light"> modifier <i class="fa fa-edit"  ></i>  </a></button>
        <button class="btn btn-danger"><a href="suppveh.php? deletemat='.$matricule.' & cin='. $cin_admin .'" class="text-light" > supprimer <i class="fa fa-trash"  ></i> </a></button>
        </td>
      </tr>';

      }
  }
?>

</tbody>
</table>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
             <footer>
               <small> <p> Copyright 2022 OTO  </p></small>
            </footer>
    </body>


</html>