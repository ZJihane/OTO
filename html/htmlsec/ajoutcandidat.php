<?php
include '../htmladmin/connect.php';
$cin_sec=$_GET['cin'];

if(isset($_POST['submit'])){

$email=$_POST['email'];
$mdp=$_POST['mdp'];
$cin=$_POST['cin'];
$nom=$_POST['nom'];
$prenom=$_POST['pre'];
$tp=$_POST['tp'];
$tarif=$_POST['tarif'];
$tranche_1=$_POST['t1'];
$tranche_2=$_POST['t2'];
$tranche_3=$_POST['t3'];

$sql0="select * from candidat where cin2='$cin'";
$result0=mysqli_query($con,$sql0) ;  

$sql1="select * from permis where type='$tp' AND tarif='$tarif'";
$result1=mysqli_query($con,$sql1);

if (mysqli_num_rows($result0)!=0){
    echo '<script type="text/javascript"> ';
    echo 'alert("Ce candidat existe déjà !") ; ';
    echo' </script>';}

elseif(mysqli_num_rows($result1)!=1){
    echo '<script type="text/javascript"> ';
    echo 'alert("type permis ou montant erroné !") ; ';
    echo' </script>';

}
else{
$sql2="insert into candidat (email2,mdp2,cin2,nom_candidat,prenom_candidat,type_permis) values ('$email','$mdp','$cin','$nom','$prenom' ,'$tp') ";
$sql3="insert into paiement (id_candidat,type_permis,tarif,tranche_1,tranche_2,tranche_3) values ('$cin','$tp','$tarif','$tranche_1','$tranche_2','$tranche_3') ";

$result2=mysqli_query($con,$sql2);
$result3=mysqli_query($con,$sql3);
       if($result2 & $result3){
        echo '<script type="text/javascript"> ';
        echo 'alert("ajout reussi") ; ';
        echo 'window.location.href = "gestcandidat.php? cin='.$cin_sec.'" ;' ;
        echo' </script>';
                               }
        else{
         echo '<script type="text/javascript"> ';
         echo 'alert("echec!") ; ';
         echo 'window.location.href = "gestcandidat.php?cin='.$cin_sec.'" ;' ;
         echo' </script>';
          }}
        
        }
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
    <title>Ajout candidat</title>
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
                            <a  class="nav-link" <?php echo'href= "indexsec.php ? cin='.$cin_sec.' " '?>> <i class="fa fa-home"  ></i> Accueil &nbsp;&nbsp;&nbsp;&nbsp; </a>
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
    <fieldset id="fiels">
        <form method="POST" > 
        
           <label>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="name" name="nom" /><br>

           <label>Prénom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="name" name="pre" /><br>

           <label>CIN : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="name" name="cin" /><br>


           <label>E-mail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="email" name="email" /><br>

           <label> Mot de passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           <input type="name" name="mdp" /><br>

           <label> Type permis:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

           <select name="tp">
            <?php 
             $sql1="select type from permis";
             $result1=mysqli_query($con,$sql1);
             while($row=mysqli_fetch_array($result1)):; ?>
             <option><?php echo $row[0] ;?></option>
             <?php endwhile ;?>
            </select> <br>
            
            <label> Montant:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            
            <select name="tarif">
             <?php 
             $sql2="select tarif from permis ";
             $result2=mysqli_query($con,$sql2);
             while($row2=mysqli_fetch_array($result2)):; ?>
             <option ><?php echo $row2[0] ;?></option>
             <?php endwhile ;?>
            </select> <br>

           <label>première tranche :</label>
           <label>Réglée</label>
           <input type="radio" name="t1" required value="1">
           <label>Non réglée</label>
           <input type="radio" name="t1" required value="0"><br>
           <label>deuxième tranche :</label>
           <label>Réglée</label>
           <input type="radio" name="t2" required value="1">
           <label>Non réglée</label>
           <input type="radio" name="t2" required value="0"><br>
           <label>troisième tranche :</label>
           <label>Réglée</label>
           <input type="radio" name="t3" required value="1">
           <label>Non réglée</label>
           <input type="radio" name="t3" required value="0"><br>

           <button type="submit"name="submit" class="btn btn-primary" class="text-light">Enregistrer<i class="fa fa-save"  aria-hidden="true"></i> </button>
       </form>
    </fieldset>
</body>
</html>