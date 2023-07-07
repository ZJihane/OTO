<?php 
include'connect.php';
$cin_admin=$_GET['cin'];

$cinn=$_GET['deletemoni'];

$sql0="select * from rdv_theo where id_moniteur='$cinn'";
$result0=mysqli_query($con,$sql0);
$sql1="select * from rdv_pratique where cin3='$cinn'";
$result1=mysqli_query($con,$sql1);

if (mysqli_num_rows($result0)!=0 || mysqli_num_rows($result1)!=0 ){
    echo '<script type="text/javascript"> ';
    echo 'alert("Ce moniteur a un ou plusieurs rendez-vous , veuillez trouver un remplaçant ! ") ; ';
    echo 'window.location.href = "gestmoni.php ? cin='. $cin_admin .'" ;' ;
    echo' </script>';
}
else{
$sql = "delete from moniteur where cin3='$cinn' "; 
$result=mysqli_query($con,$sql);
if($result){
    echo '<script type="text/javascript"> ';
    echo 'alert("supression reussie") ; ';
    echo 'window.location.href = "gestmoni.php ? cin='. $cin_admin .'" ;' ;
    echo' </script>';
}
else{
     echo '<script type="text/javascript"> ';
    echo 'alert("echec") ; ';
    echo 'window.location.href = "gestmoni.php ? cin='. $cin_admin .'" ;' ;
    echo' </script>';
}
}
?>