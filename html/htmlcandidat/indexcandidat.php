<?php
include '../htmladmin/connect.php' ;
$cin_candidat=$_GET['cin'];
$temps ;
date_default_timezone_set("Africa/Casablanca");  
//G	24-hour format of an hour without leading zeros
        $h = date('G');

        if($h>=5 && $h<=17)
        {
           $temps="Bonne journée";
        }
    
        else
        {
            $temps="Bonne soirée";
        }
        $sql1="select * from candidat where cin2 = '$cin_candidat' " ;
        $result1=mysqli_query($con,$sql1);
        $row=mysqli_fetch_assoc($result1);
        
        $nom=$row['nom_candidat'];
        $prenom=$row['prenom_candidat'];

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
    <link rel="stylesheet" type="text/css" href="../../css/csscandidat/indcand.css">
    <meta charset="utf-8">
    <link rel="icon" href="../../images/logo.png">
    <title>Espace candidat</title>
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
                        <a class="nav-link" <?php echo'href= "lec.php ? cin='.$cin_candidat.' " '?>class="text-dark" ><i class="fa fa-file-text"  ></i>  Leçons  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item" class="gestm" >
                            <a class="nav-link"<?php echo'href= "affichrslt.php ? cin='.$cin_candidat.' " '?>class="text-dark" ><i class="fa fa-check-square-o"  ></i>Résultats  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item" class="gestm" >
                            <a class="nav-link"<?php echo'href= "paiement.php ? cin='.$cin_candidat.' " '?>class="text-dark" > <i class="fa fa-money"  ></i> paiement  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../htmlpersonne/index.html" class="text-danger" > <i class="fa fa-sign-out"></i>   Déconnexion    &nbsp;&nbsp;&nbsp;&nbsp;</a> 

                        </li>
                    </ul>
                   
                </div>
</nav>
<div id="box">
<h2 id="introcan">ESPACE CANDIDAT</h2>
<p id="introcan2"><?php echo" $temps $nom $prenom" ?></p>
</div>
<br><br><br><br><br><br><br><br><br><br>
             <footer>
               <small> <p> Copyright 2022 OTO  </p></small>
            </footer>
    </body>


</html>