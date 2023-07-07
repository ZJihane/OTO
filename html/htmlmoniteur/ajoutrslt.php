<?php
include '../htmladmin/connect.php';
$cin_moniteur=$_GET['cin'];
if(isset($_POST['submit'])){

$id_candidat=$_POST['idc'];

$sql0="select * from candidat where cin2 = '$id_candidat'";
$result0=mysqli_query($con,$sql0);

$sql1="select * from resultat where id_candidat = '$id_candidat'";
$result1=mysqli_query($con,$sql1);



if (mysqli_num_rows($result0)!=1){
    echo '<script type="text/javascript"> ';
    echo 'alert("Candidat inexistant") ; ';
    echo' </script>';
}
if (mysqli_num_rows($result1)==1){
    echo '<script type="text/javascript"> ';
    echo 'alert("Résultat déjà défini pour ce candidat !") ; ';
    echo' </script>';
}

else{
$sql="insert into resultat values ('','$id_candidat','','','') ";
$result=mysqli_query($con,$sql);

if($result){
    echo '<script type="text/javascript"> ';
    echo 'alert("ajout reussi") ; ';
    echo 'window.location.href = "gestreslt.php ? cin='.$cin_moniteur.'" ;' ;
    echo' </script>';
}
else{
    echo '<script type="text/javascript"> ';
    echo 'alert("echec!") ; ';
    echo 'window.location.href = "gestreslt.php ? cin='.$cin_moniteur.'" ;' ;
    echo' </script>';
}
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/cssmoniteur/rsm.css">
    <link rel="icon" href="../../images/logo.png">
    <title>Ajouter résultat </title>
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
<nav>
<nav  class="navbar navbar-expand-lg navbar-light " style="background-color: #8a888285;" >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
               
                <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar" >
                    <ul class="navbar-nav">
                          <a class="navbar-brand" <?php echo'href= "indexmoniteur.php ? cin='.$cin_moniteur.' " '?> ><img src="../../images/logo.png"  style="width:42px;height:42px;"> &nbsp;&nbsp;&nbsp;&nbsp;</a>
                         <li class="nav-item" class="accmoni">
                            <a class="nav-link" <?php echo'href= "indexmoniteur.php ? cin='.$cin_moniteur.' " '?>><i class="fa fa-home"  ></i> Accueil  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                         </li>
                        <li class="nav-item" class="rdvmoni">
                            <a class="nav-link" <?php echo'href= "affichrdv.php ? cin='.$cin_moniteur.' " '?>> <i class="fa fa-calendar"  ></i> Mes Rendez-vous  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item" class="rsltmoni">
                            <a class="nav-link" <?php echo'href= "gestreslt.php ? cin='.$cin_moniteur.' " '?>> <i class="fa fa-check-square-o"  ></i>   Resultats  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../htmlpersonne/index.html"> <i class="fa fa-sign-out"  > </i>      Déconnexion   &nbsp;&nbsp;&nbsp;&nbsp; </a>

                        </li>
                    </ul>
                  </div>
</nav>
    <fieldset id="fiels">
        <form method="POST" > 
        
           <label>CIN Candidat :</label>
           <input type="name" name="idc" /><br>

           <button type="submit"name="submit" class="btn btn-primary" class="text-light"> Enregistrer <i class="fa fa-save"  aria-hidden="true"></i></button>
       </form>
    </fieldset>
</body>
</html>