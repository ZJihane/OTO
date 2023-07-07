<?php
include '../htmladmin/connect.php';
$cin_sec=$_GET['cin'];

$cinn=$_GET['updatecandidat'];
$sql1="select * from candidat where cin2 = '$cinn' " ;

$result1=mysqli_query($con,$sql1);
$row=mysqli_fetch_assoc($result1);
$email = $row['email2'];
$mdp = $row['mdp2'];
$nom = $row['nom_candidat'];
$prenom = $row['prenom_candidat'];



if(isset($_POST['submit'])){
$email=$_POST['email'];
$mdp=$_POST['mdp'];
$nom=$_POST['nom'];
$prenom=$_POST['pre'];


    $sql = "update candidat set  email2 = '$email', mdp2 = '$mdp' , nom_candidat ='$nom' , prenom_candidat = '$prenom'   where cin2='$cinn' ";
    $result=mysqli_query($con,$sql);

if($result){
    echo '<script type="text/javascript"> ';
    echo 'alert("modification reussie") ; ';
    echo 'window.location.href = "gestcandidat.php ? cin='.$cin_sec.' " ;' ;
    echo' </script>';
}
else{
    echo '<script type="text/javascript"> ';
    echo 'alert("echec!") ; ';
    echo 'window.location.href = "gestcandidat.php ? cin='.$cin_sec.'" ;' ;
    echo' </script>'; 
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
    <link rel="stylesheet" type="text/css" href="../../css/csssec/gesc.css">
    <link rel="icon" href="../../images/logo.png">
    <title>Modifier candidat</title>
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
    <fieldset>
    <form method="POST" >         

           <label>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="name" name="nom" value=<?php echo $nom ?>><br>

           <label>Prénom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="name" name="pre" value=<?php echo $prenom ?>><br>


          <label>E-mail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
          <input type="email" name="email" value=<?php echo $email ?>><br>

           <label>Mot de passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
           <input type="name" name="mdp" value=<?php echo $mdp ?>><br>

           

        <button type="submit"name="submit" class="btn btn-primary" >Enregistrer <i class="fa fa-save"  aria-hidden="true"></i></button>
  </form>
    </fieldset>
</body>
</html> 