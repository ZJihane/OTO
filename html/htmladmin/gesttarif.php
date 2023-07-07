<?php
include 'connect.php';
$cin_admin=$_GET['cin'];
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
    <link rel="stylesheet" type="text/css" href="../../css/cssadmin/gest.css">
    <link rel="icon" href="../../images/logo.png">
  <meta charset="utf-8">
  <title>Tarifs</title>
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
                         <a class="navbar-brand" <?php echo'href= "indexadmin.php ? cin='.$cin_admin.' " '?> ><img src="../../images/logo.png"  style="width:42px;height:42px;">&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <li class="nav-item" class="accadmin">
                            <a class="nav-link" <?php echo'href= "indexadmin.php ? cin='.$cin_admin.' " '?>><i class="fa fa-home"  ></i>  Accueil &nbsp;&nbsp;&nbsp;&nbsp;</a>
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
 

  <table class="table table-light">
    <thead>
      <tr>
        <th scope="col">Type Permis</th>
        <th scope="col">Montant à payer</th>
      </tr>
    </thead>
    <tbody>

      <?php
          $sql = 'select * from permis';
          $result = mysqli_query($con, $sql);
         if ($result) {
         while ($row = mysqli_fetch_assoc($result)) {
          $type = $row['type'];
          $tarif = $row['tarif'];
          
          echo '
        <tr>
        
        <td>' . $type . '</td>
        <td>' . $tarif . '</td>
         <td>
         <button class="btn btn-primary"><a href="modiftarif.php? updatetype='. $type .' & cin='. $cin_admin .'" class="text-light"> modifier prix <i class="fa fa-edit"  ></i> </a></button>
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