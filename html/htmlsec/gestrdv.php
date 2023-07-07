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
  <link rel="stylesheet" type="text/css" href="../../css/csssec/gesr.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link rel="icon" href="../../images/logo.png">
    <title>Gestion Rendez-vous</title>
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
                        <li class="nav-item"  class="emails">
                             <a  class="nav-link"<?php echo'href= "emails.php ? cin='.$cin_sec.' " '?>><i class="fa fa-at"  ></i> E-mails &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../htmlpersonne/index.html"> <i class="fa fa-sign-out" > </i>Déconnexion &nbsp;&nbsp;&nbsp;&nbsp;</a>

                        </li>
                       
                        </ul>
                 </div>
 </nav>

  <button class="btn btn-primary"> <a <?php echo'href= "ajoutrdvprat.php ? cin='.$cin_sec.' " '?> class="text-light">ajouter rendez-vous pour un cours pratique <i class="fa fa-plus"  ></i></a></button>
  <table class="table table-light">
    <thead>
      <tr>
      <th scope="col">id rendez-vous</th>
        <th scope="col">Cin moniteur</th>
        <th scope="col">Cin candidat</th>
        <th scope="col">Matricule vehicule</th>
        <th scope="col">date du rdv</th>
        <th scope="col">heure du rdv</th>
        <th scope="col">Opération</th>
         

      </tr>
    </thead>
    <tbody> 

      <?php
         $sql1="delete from rdv_pratique where date < curdate() or ( date=curdate()and heure<curtime() ) ";
         $result1 = mysqli_query($con, $sql1);

      

         $sql2 = 'select * from rdv_pratique R join moniteur M on (R.cin3=M.cin3) join  candidat C on (R.cin2=C.cin2) join vehicule V on (R.matricule=V.matricule)';
         $result2 = mysqli_query($con, $sql2);
      
      if ($result2) {
        while ($row = mysqli_fetch_assoc($result2)) {
          $idrdv=$row['id_rdv'];
          $idm = $row['cin3'];
          $idc = $row['cin2'];
          $idv = $row['matricule'];
          $date = $row['date'];
          $heure = $row['heure'];
         echo '
        <tr>
        <th scope="row">' . $idrdv  . '</th>
        <td>' . $idm. '</td>
        <td>' . $idc. '</td>
        <td>' . $idv . '</td>
        <td>' . $date . '</td>
        <td>' . $heure . '</td>
        
        <td>

       
        <button class="btn btn-primary"><a href="modifierdvprat.php? updaterdv=' . $idrdv . '& cin='. $cin_sec .'" class="text-light" > Modifier <i class="fa fa-edit"  ></i></a></button>
        <button class="btn btn-danger"><a href="supprdvprat.php? deleterdv=' . $idrdv . '& cin='. $cin_sec .'" class="text-light" > supprimer <i class="fa fa-trash"  ></i></a></button>
        </td>
      </tr>';
        
      }}
       ?>

    </tbody>
</table>

<button class="btn btn-primary"> <a <?php echo'href= "ajoutrdvtheo.php ? cin='.$cin_sec.' " '?> class="text-light">ajouter rendez-vous pour un cours theorique <i class="fa fa-plus"  ></i></a></button>
<table class="table table-light">
    <thead>
      <tr>
         <th scope="col">id rendez-vous</th>
        <th scope="col">Cin moniteur</th>
        <th scope="col">Cin Candidat</th>
        <th scope="col">numéro séance</th>
        <th scope="col">salle de cours</th>
        <th scope="col">nb participants</th>
        <th scope="col">date du rdv</th>
        <th scope="col">heure du rdv</th>
        <th scope="col">Opération</th>
     </tr>
  </thead>
 <tbody>
<?php

$sql3="delete from rdv_theo where date < curdate() or ( date = curdate() and heure<curtime() ) ";
$result3 = mysqli_query($con, $sql3);


$sql4 = 'select * from rdv_theo R join moniteur M on (R.id_moniteur=M.cin3) join  candidat C on (R.id_candidat=C.cin2) ';
$result4= mysqli_query($con, $sql4);

if ($result4) {

   while ($row = mysqli_fetch_assoc($result4)) {

    $nums=$row['num_seance'];
    $idrdv=$row['id_rdv'] ;
    $idm2 = $row['id_moniteur'];
    $idc2 = $row['id_candidat'];
    $salle=$row['salle'];
    $date2 = $row['date'];
    $heure2 = $row['heure'];
    $nbp=$row['nb_part'];

    $sql5="select id_candidat from rdv_theo where num_seance='$nums'";
    $result5=mysqli_query($con,$sql5);
      if ($result5){
        $rowcount = mysqli_num_rows( $result5);
      }

      $sql6="update rdv_theo set nb_part='$rowcount' where num_seance='$nums'";
      $result6=mysqli_query($con,$sql6);
   echo '
  <tr>
   <td>'.$idrdv.'</td>
  <td>' . $idm2. '</td>
  <td>' . $idc2. '</td>
  <td>'.$nums.'</td>
  <td>' . $salle . '</td>
    <td>'.$nbp.'</td>
  <td>' . $date2 . '</td>
  <td>' . $heure2 . '</td>
  
  <td>
  <button class="btn btn-primary"><a href="modifierrdvtheo.php? updaterdv=' . $idrdv . '& cin='. $cin_sec .'" class="text-light" > Modifier <i class="fa fa-edit"  ></i> </a></button>
  <button class="btn btn-danger"><a href="supprdvtheo.php? deleterdv=' . $idrdv . '& cin='. $cin_sec .'" class="text-light" > supprimer <i class="fa fa-trash"  ></i> </a></button>
  </td>
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
