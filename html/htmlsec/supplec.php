<?php 
include '../htmladmin/connect.php';
$cin_sec=$_GET['cin'];

$id=$_GET['deletelec'];
$sql = "delete from leçon where id_lec='$id' "; 
$result=mysqli_query($con,$sql);
if($result){
    echo '<script type="text/javascript"> ';
    echo 'alert("supression reussie") ; ';
    echo 'window.location.href = "gestlec.php ? cin='.$cin_sec.'" ;' ;
    echo' </script>';
}
else{
     echo '<script type="text/javascript"> ';
    echo 'alert("echec") ; ';
    echo 'window.location.href = "gestlec.php ? cin='.$cin_sec.'" ;' ;
    echo' </script>';
}
?>