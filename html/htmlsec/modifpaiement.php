<?php
include '../htmladmin/connect.php';
$cin_sec=$_GET['cin'];

$cinn=$_GET['mpaicandidat'];

$sql="select * from paiement where id_candidat ='$cinn' ";
$result=mysqli_query($con,$sql);



$row=mysqli_fetch_assoc($result);
$t1=$row['tranche_1'];
$t2=$row['tranche_2'];
$t3=$row['tranche_3'];

if(isset($_POST['submit'])){

$t1=$_POST['t1'] ;  
$t2=$_POST['t2'] ;  
$t3=$_POST['t3'] ;

$sql1 = "update paiement set tranche_1='$t1' , tranche_2='$t2' , tranche_3='$t3' where id_candidat='$cinn'";
$result1=mysqli_query($con,$sql1);
    
    if($result1){
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
<html>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/csssec/gesc.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link rel="icon" href="../../images/logo.png">
  <title>Modifier paiement</title>
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
                          <a class="navbar-brand" <?php echo'href= "indexsec.php ? cin='.$cin_sec.' " '?> ><img src="../../images/logo.png"  style="width:42px;height:42px;"></a>
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
 <fieldset id="fiels">
        <form method="POST" > 
           <?php
           if ($t1==0){
           echo'
           <label>première tranche :</label>
           <label>Réglé</label>
           <input type="radio" name="t1" required value="1">
           <label>Non réglé</label>
           <input type="radio" name="t1" required value="0" checked><br> 
           ' ;}

           else {
            echo'
            <label>première tranche :</label>
           <label>Réglé</label>
           <input type="radio" name="t1" required value="1" checked>
           <label>Non réglé</label>
           <input type="radio" name="t1" required value="0" ><br> 
            ';
            }

           if($t2==0){
             echo '<label>deuxième tranche :</label>
             <label>Réglé</label>
             <input type="radio" name="t2" required value="1">
             <label>Non réglé</label>
             <input type="radio" name="t2" required value="0" checked><br>';

           }
           else {
            echo'<label>deuxième tranche :</label>
            <label>Réglé</label>
            <input type="radio" name="t2" required value="1" checked>
            <label>Non réglé</label>
            <input type="radio" name="t2" required value="0"><br>';

           }
           
           if($t3==0){
            echo '<label>troisième tranche :</label>
            <label>Réglé</label>
            <input type="radio" name="t3" required value="1">
            <label>Non réglé</label>
            <input type="radio" name="t3" required value="0" checked><br>';

          }
          else {
              echo'<label>troisième tranche :</label>
              <label>Réglé</label>
              <input type="radio" name="t3" required value="1" checked>
              <label>Non réglé</label>
              <input type="radio" name="t3" required value="0"><br>';
}


           ?>
           <button type="submit"name="submit" class="btn btn-primary" class="text-light">Enregistrer <i class="fa fa-save"  aria-hidden="true"></i></button>
       </form>
    </fieldset>
</body>
</html>
    

