<?php
include '../htmladmin/connect.php' ;
$cin_sec=$_GET['cin'];

?>
<!DOCTYPE html>
<html> 

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/csssec/gesd.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta charset="utf-8">
    <link rel="icon" href="../../images/logo.png">
    <title>Mes données</title>
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
                          <a class="navbar-brand" <?php echo'href= "indexsec.php ? cin='.$cin_sec.' " '?> ><img src="../../images/logo.png"  style="width:42px;height:42px;">&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <li class="nav-item" class="accsec">
                            <a  class="nav-link" <?php echo'href= "indexsec.php ? cin='.$cin_sec.' " '?>> <i class="fa fa-home"  ></i> Accueil  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item"  class="lecsec">
                            <a  class="nav-link" <?php echo'href= "gestlec.php ? cin='.$cin_sec.' " '?>><i class="fa fa-file-text"  ></i> leçons &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item"  class="rdvsec">
                            <a  class="nav-link" <?php echo'href= "gestrdv.php ? cin='.$cin_sec.' " '?>><i class="fa fa-calendar"  ></i> Rendez-vous &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item"  class="cand">
                            <a  class="nav-link" <?php echo'href= "gestcandidat.php ? cin='.$cin_sec.' " '?>><i class="fa fa-user"  ></i> candidats &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                         <li class="nav-item"  class="gests">
                             <a  class="nav-link"<?php echo'href= "donneessec.php ? cin='.$cin_sec.' " '?>><i class="fa fa-id-card-o"  ></i> Mes données &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        </li>
                        <li class="nav-item"  class="emails">
                             <a  class="nav-link"<?php echo'href= "emails.php ? cin='.$cin_sec.' " '?>><i class="fa fa-at"  ></i> E-mails &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../htmlpersonne/index.html"> <i class="fa fa-sign-out" > </i>Déconnexion &nbsp;&nbsp;&nbsp;&nbsp;</a>

                       
                        </ul>
                 </div>
 </nav>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">CIN</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">E-mail</th>
        <th scope="col">Opération</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $sql = 'select * from secretaire';
      $result = mysqli_query($con, $sql);
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $CIN = $row['cin4'];
          $Nom = $row['nom_sec'];
          $Prenom = $row['prenom_sec'];
          $email=$row['email4'];
          echo '
        <tr>
        
        <td>' . $CIN . '</td>
        <td>' . $Nom . '</td>
        <td>' . $Prenom . '</td>
        <td>' . $email . '</td>
         <td>
         <button class="btn btn-primary"><a href="modifsec.php? cin='. $cin_sec .'" class="text-light"> modifier mes infos <i class="fa fa-edit"  ></i> </a></button>
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