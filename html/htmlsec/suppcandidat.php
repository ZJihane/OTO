<?php 
include '../htmladmin/connect.php';
$cin_sec=$_GET['cin'];
$cinn=$_GET['deletecandidat'];

$sql0="select * from rdv_theo where id_candidat='$cinn'";
$result0=mysqli_query($con,$sql0);
$sql1="select * from rdv_pratique where cin2='$cinn'";
$result1=mysqli_query($con,$sql1);

if (mysqli_num_rows($result0)!=0 || mysqli_num_rows($result1)!=0){
    echo '<script type="text/javascript"> ';
    echo 'alert("Ce candidat a un rendez-vous veuillez le supprimer !") ; ';
    echo 'window.location.href = "gestcandidat.php ? cin='. $cin_sec .'" ;' ;
    echo' </script>';
}
else{
$sql1="delete from resultat where id_candidat='$cinn'";
$result1=mysqli_query($con,$sql1);
$sql2="delete from paiement where id_candidat='$cinn'";
$result2=mysqli_query($con,$sql2);

$sql = "delete from candidat where cin2='$cinn' "; 
$result=mysqli_query($con,$sql);

if($result){
    echo '<script type="text/javascript"> ';
    echo 'alert("supression reussie") ; ';
    echo 'window.location.href = "gestcandidat.php ? cin='.$cin_sec.'" ;' ;
    echo' </script>';
}
else{
     echo '<script type="text/javascript"> ';
    echo 'alert("echec") ; ';
    echo 'window.location.href = "gestcandidat.php ? cin='.$cin_sec.'" ;' ;
    echo' </script>';
}}
?>