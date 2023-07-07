<?php
include '../htmladmin/connect.php' ;
$cin_moniteur=$_GET['cin'];
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../../css/cssmoniteur/rdm.css">
  <meta charset="utf-8">
  <link rel="icon" href="../../images/logo.png">
    <title>Mes rendez-vous</title>
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
                            <a class="nav-link" href="../htmlpersonne/index.html"> <i class="fa fa-sign-out"  > </i> Déconnexion  &nbsp;&nbsp;&nbsp;&nbsp;</a>

                        </li>
                    </ul>
                  </div>
</nav>
 <br><br>
 <h1><b>les rendez-vous pour cours pratique :</b></h1>
 <table class="table table-light">
    <thead>
      <tr>
        <th scope="col">Cin candidat</th>
        <th scope="col">Matricule vehicule</th>
        <th scope="col">Date du rdv</th>
        <th scope="col">Heure du rdv</th>
      </tr>
    </thead>
    <tbody>

      <?php
 
     $sql1="select * from rdv_pratique where cin3= '$cin_moniteur' " ;
      $result = mysqli_query($con, $sql1);
      
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $idc = $row['cin2'];
          $idv = $row['matricule'];
          $date = $row['date'];
          $heure = $row['heure'];
         echo '
        <tr></tr>

        <td>' . $idc. '</td>
        <td>' . $idv . '</td>
        <td>' . $date . '</td>
        <td>' . $heure . '</td>
        
      </tr>';
        
      }}
       ?>

    </tbody>
  </table>
  <h1><b>les rendez-vous pour cours theorique :</b></h1>
  <table class="table table-light">
    <thead>
      <tr>
        
         <th scope="col">Numéro séance</th>
         <th scope="col">Salle de cours</th>
         <th scope="col">Nb participants</th>
         <th scope="col">Date du rdv</th>
         <th scope="col">Heure du rdv</th>
     </tr>
  </thead>
 <tbody> 
  <?php
 $sql2="select distinct(num_seance) , salle, date ,heure , nb_part
  from rdv_theo 
  where id_moniteur = '$cin_moniteur'" ;
  $result2= mysqli_query($con, $sql2);

  if ($result2) {
  
   while ($row = mysqli_fetch_assoc($result2)) {
    $nbp=$row['nb_part'];
    $nums=$row['num_seance'] ;
    $salle=$row['salle'];
    $date2 = $row['date'];
    $heure2 = $row['heure'];
   echo '
  <tr>
   <td>'.$nums.'</td>
  <td>' . $salle . '</td>
  <td>'.$nbp.'</td>
  <td>' . $date2 . '</td>
  <td>' . $heure2 . '</td> 
  </tr>'; 
}}
?>


</tbody>
</table>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <footer>
    <small>
      <p> Copyright 2022 OTO </p>
    </small>
  </footer>
</body>


</html>