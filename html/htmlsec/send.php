<?php

include '../htmladmin/connect.php' ;
$cin_sec=$_GET['cin'];

use PHPMailer\PHPMailer\PHPMailer;

require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";
require "PHPMailer/Exception.php";



     
if (isset($_POST["send"])){       
$sender_name=$_POST["sender_name"];
$sender=$_POST["sender"];
$attachments=$_FILES["attachments"]["name"];
$subject=$_POST["subject"];
$recipients=explode(",",$_POST["recipient"]); 
$body=$_POST["body"];


$mail = new PHPMailer(true);

try {
    
  
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'otoautoecole@gmail.com';                     
    $mail->Password   = 'otooooo5o';                               
    $mail->Port       = 465;                                    
    $mail->SMTPSecure = "ssl";
    
    $mail->setFrom($sender,$sender_name);
    foreach($recipients as $recipient){
    $mail->addAddress($recipient) ;
   }
   


    
    
            for ($i=0;$i<count($attachments);$i++){
                    $file_tmp = $_FILES["attachments"]["tmp_name"][$i] ;
                    $file_name = $_FILES["attachments"]["name"][$i] ;
                    move_uploaded_file($file_tmp,"attatchment/".$file_name);
                    $mail->addAttachment("attatchment/".$file_name);         
                    } 
    
    
    

    $mail->isHTML(true);                                 
    $mail->Subject = $subject;
    $mail->Body    = $body ;
   

    $mail->send();
    echo '<script type="text/javascript"> ';
        echo 'alert("E-mail envoyé ") ; ';
        echo 'window.location.href = "emails.php? cin='.$cin_sec.'" ;' ;
        echo' </script>';
} catch (Exception $e) {
    echo '<script type="text/javascript"> ';
        echo 'alert("Echec ! E-mail non envoyé") ; ';
        echo 'window.location.href = "emails.php? cin='.$cin_sec.'" ;' ;
        echo' </script>';
}}

 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>
    
</body>
</html>

