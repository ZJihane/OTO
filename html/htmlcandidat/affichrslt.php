<?php
include '../htmladmin/connect.php' ;
$cin_candidat=$_GET['cin'];
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
  <link rel="stylesheet" type="text/css" href="../../css/csscandidat/re.css">
  <meta charset="utf-8">
  <link rel="icon" href="../../images/logo.png">
  <title>Afficher résultat </title>
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
<table class="table table-light">
    <thead>
      <tr>
        <th scope="col">Résultat d'examen théorique </th>
        <th scope="col">Résultat d'examen pratique </th>
        <th scope="col">Résultat final </th>
        

      </tr>
    </thead>
    <tbody>


      <?php
      $sql = "select * from resultat  where id_candidat='$cin_candidat'";
      $result = mysqli_query($con, $sql);
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
        
          $ret = $row['note_ex_theo'];
          $rep = $row['note_ex_prat'];
          $ref = $row['résultat_final'];
         echo '
         <tr>
         <td>' . $ret . '</td>
         <td>' . $rep . '</td>
         <td>' . $ref . '</td>
         </tr>'; } }
      ?>
          </tbody>
  </table>
      <?php 
      $sql2="select résultat_final from resultat where id_candidat='$cin_candidat' ";
      $result2 = mysqli_query($con, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      $ref = $row2['résultat_final'];
      if ($ref>=60){
        echo '<h3 style="text-align: center ; color : white ;">La localisation du test pratique final :</h3>  <br>';
        echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                             
        <iframe style="margin-left=200px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3297.7103692585897!2d-6.6093456852949855!3d34.255933414416845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x34c1e88c9040534a!2zMzTCsDE1JzIxLjMiTiA2wrAzNicyNS44Ilc!5e0!3m2!1sfr!2sma!4v1652744350698!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
      }
      ?>


  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <footer>
    <small>
      <p> Copyright 2022 OTO </p>
    </small>
  </footer>
</body>


</html>