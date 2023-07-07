<?php 
include '../htmladmin/connect.php';
$cin_sec=$_GET['cin'];

$id=$_GET['deleterdv'];
$sql = "delete from rdv_pratique where id_rdv='$id' "; 
$result=mysqli_query($con,$sql);
if($result){
    echo '<script type="text/javascript"> ';
    echo 'alert("supression reussie") ; ';
    echo 'window.location.href = "gestrdv.php ? cin='.$cin_sec.'" ;' ;
    echo' </script>';
}
else{
     echo '<script type="text/javascript"> ';
    echo 'alert("echec") ; ';
    echo 'window.location.href = "gestrdv.php ? cin='.$cin_sec.'" ;' ;
    echo' </script>';
}
?>