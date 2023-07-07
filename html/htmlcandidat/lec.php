<?php
include '../htmladmin/connect.php' ;
$cin_candidat=$_GET['cin'];

$sql='select *from leçon ;';
$result=mysqli_query($con,$sql);

if(isset($_GET['file_id']))
{
    $id=$_GET['file_id'];
    $sql2="select * from leçon where id_lec='$id'";
    $result2=mysqli_query($con,$sql2);
    $filee=mysqli_fetch_assoc($result2);
    $filepath= '../../uploads/' . $filee['nom_leçon'];
    if(file_exists($filepath)){
        header('Content-Type: application/octet-stream');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachement; filename='. basename($filepath) );
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma:public');
        header('Content-Length: '.filesize('../../uploads/'.$filee['nom_leçon']));
        readfile('../../uploads/'.$filee['nom_leçon']);
        exit ;
    }
}



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
    <link rel="stylesheet" type="text/css" href="../../css/csscandidat/les.css">
    <meta charset="utf-8">
    <link rel="icon" href="../../images/logo.png">
    <title>Mes leçons </title>
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
                            <a class="nav-link"<?php echo'href= "affichrslt.php ? cin='.$cin_candidat.' " '?>class="text-dark" ><i class="fa fa-check-square-o"  ></i> Résultats  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item" class="gestm" >
                            <a class="nav-link"<?php echo'href= "paiement.php ? cin='.$cin_candidat.' " '?>class="text-dark" > <i class="fa fa-money"  ></i> paiement  &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../htmlpersonne/index.html" class="text-danger" > <i class="fa fa-sign-out"></i>   Déconnexion   &nbsp;&nbsp;&nbsp;&nbsp; </a>

                        </li>
                    </ul>
                   
                </div>
</nav>
            <table class="table table-light">
            <thead>
                <tr>
                <th scope="col">leçons à télécharger</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
               $sql = "select * from leçon where type_permis in (select type_permis from candidat where cin2 ='$cin_candidat')";
               $result = mysqli_query($con, $sql);
               if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                $file = $row['nom_leçon'];
                echo'
                <tr>
                <th scope="row"> '.$file.' </th> 
                <td><a href=" lec.php ? file_id='.$row['id_lec'].' & cin='. $cin_candidat .' "><i class="fa fa-file-pdf-o"  ></i>   télécharger </a></td>
                </tr> ';
                 
            }}?>
        </tbody>
       </table>
        

            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
             <footer>
               <small> <p> Copyright 2022 OTO  </p></small>
            </footer>
    </body>


</html>