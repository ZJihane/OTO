<?php
include '../htmladmin/connect.php' ;
$cin_moniteur=$_GET['cin'];

$id=$_GET['updateres'];
$sql1="select * from resultat where id_res = '$id' " ;

$result1=mysqli_query($con,$sql1);
$row=mysqli_fetch_assoc($result1);

$id_candidat=$row['id_candidat'];
$note_ex_theo=$row['note_ex_theo'];
$note_ex_prat=$row['note_ex_prat'];
$res_final=$row['résultat_final'];


if(isset($_POST['submit'])){


$note_ex_theo=$_POST['ret'];
$note_ex_prat=$_POST['rep'];
$res_final=$_POST['ref'];


$sql1="select * from paiement where (id_candidat='$id_candidat' and tranche_3='1') ";
$result1=mysqli_query($con,$sql1);

if (mysqli_num_rows($result1)!=1) {
    echo '<script type="text/javascript"> ';
    echo 'alert("vous ne pouvez pas ajouter le résultat final : frais non payées !") ; ';
    echo' </script>';

    $sql2="update resultat set  note_ex_theo ='$note_ex_theo' , note_ex_prat='$note_ex_prat' where id_res = '$id'";
    $result2=mysqli_query($con,$sql2);
    if($result2){
        echo '<script type="text/javascript"> ';
        echo 'alert("modification reussie") ; ';
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
else {
    $sql = "update resultat set  note_ex_theo ='$note_ex_theo' , note_ex_prat='$note_ex_prat', résultat_final='$res_final'  where id_res = '$id'  ";
    $result=mysqli_query($con,$sql);
    
    if($result){
        echo '<script type="text/javascript"> ';
        echo 'alert("modification reussie") ; ';
        echo 'window.location.href = "gestreslt.php ?cin='.$cin_moniteur.'" ;' ;
        echo' </script>';
    }
    else{
        echo '<script type="text/javascript"> ';
        echo 'alert("echec!") ; ';
        echo 'window.location.href = "gestreslt.php? cin='.$cin_moniteur.'" ;' ;
        echo' </script>'; 
    }

}}



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
    <title>Modifier résultat</title>
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

    <fieldset>

        <form method="POST" > 
        <label>CIN Candidat :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="name" name="idc" value=<?php echo $id_candidat?>><br>


         <label>Résultat d'examen théorique: </label>
        <input type="number" name="ret" value=<?php echo $note_ex_theo ;?>><br>

        <label>Résultat d'examen pratique:&nbsp;&nbsp; </label>
        <input type="number" name="rep" value=<?php echo $note_ex_prat ;?>><br>

        <label>Résultat final :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="number" name="ref" value=<?php echo $res_final ;?> ><br>

        <button type="submit"name="submit" class="btn btn-primary" class="text-light">Enregistrer <i class="fa fa-save"  aria-hidden="true"></i></button>
    </form>
    </fieldset>
</body>
</html>