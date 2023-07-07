<?php
include '../htmladmin/connect.php' ;
$cin_sec=$_GET['cin'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/csssec/gese.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta charset="utf-8">
    <link rel="icon" href="../../images/logo.png">
    <title>E-mails</title>
</head>


<body >
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

<div class="container py-5">

<script src="../../js/animation.js"></script>
        <div class="row">
            <div class="col-md-8 mx-auto bg-white border p-5" >
                <h2 class="text-center fw-bold text-dark mb-3">Envoyez des e-mail :</h2>
                <form action="send.php ? cin='. $cin_sec .'" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="sender_name" class="form-label">Envoyez un e-mail sous le nom de</label>
                            <input type="text" class="form-control" id="sender_name" name="sender_name" value="secretaire OTO" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="sender" class="form-label"> Email</label>
                            <input type="email" class="form-control" id="sender" name="sender"  value="otoautoecole@gmail.com" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="subject" class="form-label">Sujet</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="sujet d'email" required>
                        </div>
                        <div class="col-6">
                            <label for="attachments" class="form-label">Attachments (Multiple)</label>
                            <input type="file" class="form-control" multiple id="attachments" name="attachments[]" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="recipient" class="form-label">Envoyer à :</label>
                        <textarea class="form-control" id="recipient" name="recipient" placeholder=" ajouter une virgule après chaque e-mail exemple :
                        example1@domain.com,
                        example2@domain.com,
                        example3@domain.com" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Message à envoyer</label>
                        <textarea class="form-control" id="body" name="body" placeholder="Bonjour   !" rows="5" required></textarea>
                    </div>
                    <div>
                        <button class="btn btn-primary me-2" name="send" type="submit" >Envoyer</button>
                        <button class="btn btn-danger" type="reset">Initialiser</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Js -->
 
</body>
</html>
