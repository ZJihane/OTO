<?php 
include'connect.php';
$cin_admin=$_GET['cin'];
$matt=$_GET['deletemat'];

$sql1="select * from rdv_pratique where matricule='$matt'";
$result1=mysqli_query($con,$sql1);

if (mysqli_num_rows($result1)!=0){
    echo '<script type="text/javascript"> ';
    echo 'alert("Ce véhicule sera utilisé pour un ou plusieurs rendez-vous pratique  ") ; ';
    echo 'window.location.href = "gestveh.php ? cin='. $cin_admin .'" ;' ;
    echo' </script>';
}
else{
$sql = "delete from vehicule where matricule='$matt' "; 
$result=mysqli_query($con,$sql);
if($result){
    echo '<script type="text/javascript"> ';
    echo 'alert("supression reussie") ; ';
    echo 'window.location.href = "gestveh.php ?cin='. $cin_admin .'" ;' ;
    echo' </script>';
}
else{
     echo '<script type="text/javascript"> ';
    echo 'alert("echec") ; ';
    echo 'window.location.href = "gestveh.php ?cin='. $cin_admin .'" ;' ;
    echo' </script>';
}}
?>

