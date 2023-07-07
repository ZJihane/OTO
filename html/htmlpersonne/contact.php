<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">   
    <link rel="stylesheet" type="text/css" href="../../css/csspersonne/co.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <meta charset="utf-8">
     <link rel="icon" href="../../images/logo.png">
     <title>Contacter-nous</title>
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
                           <a class="navbar-brand" href="index.html" ><img src="../../images/logo.png"  style="width:42px;height:42px;">&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        
                            <li class="nav-item" class="acc">
                                <a  class="nav-link" href="index.html"><i class="fa fa-home"  ></i> Accueil &nbsp;&nbsp;&nbsp;&nbsp;</a>
                            </li>
                            <li class="nav-item" class="auth">
                                <a  class="nav-link" href="authentification.php"><i class="fa fa-id-badge"  ></i> S'authentifier &nbsp;&nbsp;&nbsp;&nbsp;</a>
                            </li>
                            <li class="nav-item" class="cont">
                                <a  class="nav-link" href="contact.php"><i class="fa fa-envelope"  ></i> Contactez-nous &nbsp;&nbsp;&nbsp;&nbsp; </a> 
                            </li>
                            <li class="nav-item" class="apro">
                                <a  class="nav-link" href="apropos.html"><i class="fa fa-info-circle"  ></i> à propos &nbsp;&nbsp;&nbsp;&nbsp; </a>
                            </li>
                        </ul>
                 </div>
    </nav>
    
   

		<h4 class="sent-notification"></h4>
<fieldset>
		<form id="myForm">
			<h2>Envoyer un e-mail</h2>

			<label>Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input id="name" type="text" placeholder="Entrer votre nom">
			<br><br>

			<label>E-mail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input id="email" type="text" placeholder="Entrer votre E-mail">
			<br><br>

			<label>Sujet de votre message</label>
			<input id="subject" type="text" placeholder=" Entrer sujet de l'E-mail">
			<br><br>

			<p>Message :</p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<textarea id="body" rows="3" cols="23" placeholder="Votre Message"></textarea> 
			<br><br>

			<button type="button" onclick="sendEmail()" value="Send An Email" class="btn btn-primary" class="text-light">Envoyer</button>
            </fieldset>	</form>


	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message envoyé.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="text-center text-lg-start bg-light text-muted">
    <div class="me-5 d-none d-lg-block">
      <span>Contactez-nous à travers nos comptes sur les réseaux sociaux suivants :</span>
    </div>
    <div class="container pt-4">
    <section class="mb-4">
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fa fa-facebook-f"></i
      ></a>
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fa fa-twitter"></i
      ></a>
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fa fa-google"></i
      ></a>
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fa fa-instagram"></i
      ></a>

      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fa fa-linkedin"></i
      ></a>

  </section>

  <section class="">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>OTO 
          </h6>
          <p>
          L'auto-ecole qui vous garantira l'obtention de votre permis de conduite .
          </p>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fa fa-home me-3"></i> Kénitra,Rue 123, Maroc</p>
          <p>
            <i class="fa fa-envelope me-3"></i>
            otoautoecole@gmail.com
          </p>
          <p><i class="fa fa-phone me-3"></i> + 212 6 42 76 59 23</p>
          <p><i class="fa fa-print me-3"></i> + 212 6 87 88 13 23</p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="#!">OTOautoecole.com</a>
  </div>

</footer>
</body>
</html>
      
   