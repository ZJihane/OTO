<?php
include '../htmladmin/connect.php' ;
$cin_candidat=$_GET['cin'];

$sql="select * from paiement where id_candidat ='$cin_candidat' ";
$result=mysqli_query($con,$sql);

$row=mysqli_fetch_assoc($result);
$t1=$row['tranche_1'];
$t2=$row['tranche_2'];
$t3=$row['tranche_3'];


?>

<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/csscandidat/pai.css">
  <meta charset="utf-8">
  <link rel="icon" href="../../images/logo.png">
  <title>Paiement</title>
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
                      
                        <a class="navbar-brand" <?php echo'href= "indexcandidat.php ? cin='.$cin_candidat.' " '?> ><img src="../../images/logo.png"  style="width:42px;height:42px;"> &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <li class="nav-item" class="accadmin"  >
                            <a class="nav-link" <?php echo'href= "indexcandidat.php ? cin='.$cin_candidat.' " '?> class="text-dark"  > <i class="fa fa-home"  ></i> Accueil  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item" class="gestvadmin" >
                            <a class="nav-link" <?php echo'href= "affichrdv2.php ? cin='.$cin_candidat.' " '?>class="text-dark" > <i class="fa fa-calendar"  ></i> rdvs  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item" class="gestt" >
                        <a class="nav-link" <?php echo'href= "lec.php ? cin='.$cin_candidat.' " '?>class="text-dark" ><i class="fa fa-file-text"  ></i>  Leçons  &nbsp;&nbsp;&nbsp;&nbsp; </a>
                        </li>
                        <li class="nav-item" class="gestm" >
                            <a class="nav-link"<?php echo'href= "affichrslt.php ? cin='.$cin_candidat.' " '?>class="text-dark" ><i class="fa fa-check-square-o"  ></i>  Résultats  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item" class="gestm" >
                            <a class="nav-link"<?php echo'href= "paiement.php ? cin='.$cin_candidat.' " '?>class="text-dark" > <i class="fa fa-money"  ></i> paiement  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../htmlpersonne/index.html" class="text-danger" > <i class="fa fa-sign-out"></i>   Déconnexion   &nbsp;&nbsp;&nbsp;&nbsp; </a>

                        </li>
                    </ul>
                   
                </div>
</nav>
<fieldset id="fiels">
        <form method="POST" > 
           <?php
           if ($t1==0){
           echo'
           <label>première tranche :</label>
           <label>Réglé</label>
           <input type="radio" name="t1" required value="1" disabled>
           <label>Non réglé</label>
           <input type="radio" name="t1" required value="0" checked ><br> 
           ' ;}

           else {
            echo'
            <label>première tranche :</label>
           <label>Réglé</label>
           <input type="radio" name="t1" required value="1" checked >
           <label>Non réglé</label>
           <input type="radio" name="t1" required value="0" disabled><br> 
            ';
            }

           if($t2==0){
             echo '<label>deuxième tranche :</label>
             <label>Réglé</label>
             <input type="radio" name="t2" required value="1" disabled>
             <label>Non réglé</label>
             <input type="radio" name="t2" required value="0" checked ><br>';

           }
           else {
            echo'<label>deuxième tranche :</label>
            <label>Réglé</label>
            <input type="radio" name="t2" required value="1" checked >
            <label>Non réglé</label>
            <input type="radio" name="t2" required value="0" disabled><br>';

           }
           
           if($t3==0){
            echo '<label>troisième tranche :</label>
            <label>Réglé</label>
            <input type="radio" name="t3" required value="1" disabled>
            <label>Non réglé</label>
            <input type="radio" name="t3" required value="0" checked ><br>';

          }
          else {
              echo'<label>troisième tranche :</label>
              <label>Réglé</label>
              <input type="radio" name="t3" required value="1" checked >
              <label>Non réglé</label>
              <input type="radio" name="t3" required value="0" disabled><br>';


          }
?>
        </form>
</fieldset>