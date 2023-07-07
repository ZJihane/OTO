<?php
include '../htmladmin/connect.php';
$cin_sec=$_GET['cin'];

$id=$_GET['updaterdv'];
$sql1="select * from rdv_pratique where id_rdv = '$id' " ;
$result1=mysqli_query($con,$sql1);
$row=mysqli_fetch_assoc($result1);

$idm = $row['cin3'];
$idv = $row['matricule'];
$date = $row['date'];
$heure = $row['heure'];

if(isset($_POST['submit'])){

    $idm=$_POST['id_moniteur'];
    $idv=$_POST['id_vehicule'];
    $input_date=$_POST['date'];
    $date=date("Y-m-d",strtotime($input_date));
    $input_heure=$_POST['heure'];
    $heure=date("H:i:s",strtotime($input_heure));

  
    
    $sql1="select * from moniteur where cin3 = '$idm' " ;
    $result1=mysqli_query($con,$sql1);
    
    $sql2="select * from vehicule where matricule='$idv'";
    $result2=mysqli_query($con,$sql2);

    $sql3="select cin3 from rdv_pratique where  id_rdv !='$id' and cin3='$idm' and date='$date' and heure='$heure'";
    $result3=mysqli_query($con,$sql3);

    $sql4="select id_moniteur from rdv_theo where id_rdv != '$id' and  id_moniteur='$idm'and date='$date' and heure='$heure' ";
    $result4=mysqli_query($con,$sql4);

    $sql5="select matricule from rdv_pratique where id_rdv != '$id'  and  matricule='$idv'and date='$date' and heure='$heure' ";
    $result5=mysqli_query($con,$sql5);
   
  
    if (mysqli_num_rows($result1)!=1){
        echo '<script type="text/javascript"> ';
        echo 'alert("Moniteur inexistant") ; ';
        echo' </script>';
    }
    elseif (mysqli_num_rows($result2)!=1){
        echo '<script type="text/javascript"> ';
        echo 'alert("Véhicule inexistante") ; ';
        echo' </script>';
    }
    elseif (mysqli_num_rows($result3)!=0||mysqli_num_rows($result4)!=0){
        echo '<script type="text/javascript"> ';
        echo 'alert("Moniteur choisi a un autre rdv choisissez un autre moniteur") ; ';
        echo' </script>';
    }
    elseif(mysqli_num_rows($result5)){
        echo '<script type="text/javascript"> ';
        echo 'alert("Véhicule utilisée pour un autre rendez-vous!") ; ';
        echo' </script>';
    }
    elseif($date< date('Y-m-d')||$date==date('Y-m-d') and $heure<date("H:i:s")){
        echo '<script type="text/javascript"> ';
        echo 'alert("la date ou heure choisie est absolète") ; ';
        echo' </script>';
    }
    else {
    $sql = "update rdv_pratique set cin3 = '$idm' , matricule ='$idv'  , date='$date' ,heure='$heure' where id_rdv='$id' ";
    $result=mysqli_query($con,$sql);

if($result){
    echo '<script type="text/javascript"> ';
    echo 'alert("modification reussie") ; ';
    echo 'window.location.href = "gestrdv.php? cin='.$cin_sec.'" ;' ;
    echo' </script>';
}
else{
    echo '<script type="text/javascript"> ';
    echo 'alert("echec!") ; ';
    echo 'window.location.href = "gestrdv.php ? cin='.$cin_sec.'" ;' ;
    echo' </script>'; 
}} }

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
    <link rel="stylesheet" type="text/css" href="../../css/csssec/gesr.css">
    <link rel="icon" href="../../images/logo.png">
    <title>Modifier rdv</title>
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
                            <a  class="nav-link" <?php echo'href= "gestcandidat.php ? cin='.$cin_sec.' " '?>><i class="fa fa-user"  ></i> candidats &nbsp;&nbsp;&nbsp;&nbsp; </a>
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
    <fieldset>
    <form method="POST" > 

           <label>CIN moniteur :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="name" name="id_moniteur" value=<?php echo $idm ?> ><br>


           <label>Matricule véhicule :</label>
           <input type="name" name="id_vehicule"  value=<?php echo $idv ?>><br>


            <label>Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="date" name="date" value=<?php echo $date ?> ><br>

           <label> Heure: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="time" name="heure"  value=<?php echo $heure ?>><br>

        
        <button type="submit"name="submit" class="btn btn-primary">Enregistrer <i class="fa fa-save"  aria-hidden="true"></i></button>
  </form>
    </fieldset>
</body>
</html>  