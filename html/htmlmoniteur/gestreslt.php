<?php
include '../htmladmin/connect.php' ;
$cin_moniteur=$_GET['cin'];
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="../../css/cssmoniteur/rsm.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="../../images/logo.png">
    <title>Gestion résultat</title>
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
                            <a class="nav-link" href="../htmlpersonne/index.html"> <i class="fa fa-sign-out"  > </i>      Déconnexion    &nbsp;&nbsp;&nbsp;&nbsp;</a>

                        </li>
                    </ul>
                  </div>
</nav>

  <button class="btn btn-primary"> <a <?php echo'href= "ajoutrslt.php ? cin='.$cin_moniteur.' " '?> class="text-light"> <i class="fa fa-plus"> </i>Ajouter résultat pour : </a></button>
  <table class="table table-light">
    <thead>
      <tr>
        <th scope="col">CIN Candidat</th>
        <th scope="col">Résultat d'examen théorique </th>
        <th scope="col">Résultat d'examen pratique </th>
        <th scope="col">Résultat final </th>
        <th scope="col">Modifier résultats  </th>

      </tr>
    </thead>
    <tbody>

      <?php
      $sql = 'select * from resultat';
      $result = mysqli_query($con, $sql);
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id_rslt= $row['id_res'];
          $id_candidat = $row['id_candidat'];
          $ret = $row['note_ex_theo'];
          $rep = $row['note_ex_prat'];
          $ref=$row['résultat_final'];
          echo '
          <tr>
          <th scope="row">' . $id_candidat . '</th>
          <td>' . $ret . '</td>
          <td>' . $rep . '</td>
          <td>' . $ref . '</td>
         <td>
        <button class="btn btn-primary"><a href="modifrslt.php? updateres=' . $id_rslt . '& cin='.$cin_moniteur.' " class="text-light"> Modifier  <i class="fa fa-edit"  > </i> </a></button>
        </td>
      </tr>';
        }
      }
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