<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: index.php");
}

include_once 'dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM korisnici WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html PUBLIC">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mario Petkovic | Diplomski - Profil</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="bootstrap/js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/validation.min.js"></script>
<link href="bootstrap/css/style1.css" rel="stylesheet" media="screen">


<style>
#toast_message {
    visibility: hidden;
    min-width: 300px;
    margin-left: -125px;
    background-color: #33adff;
    color: #fff;
    text-align: center;
    border-radius: 3px;
    padding: 18px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#toast_message.show {
    visibility: visible; /* Show the snackbar */
}
</style>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
					<a href="home.php"><button type="button" class="btn btn-primary btn-lg navbar-btn pull-left">
		        <span class=" glyphicon glyphicon-chevron-left"></span>
		      </button></a>
          <p class="navbar-brand">&nbsp;&nbsp;MP - Geb Automatizacija</p>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Bok, <?php echo $row['user_name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profil.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Profil</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-check"></span>&nbsp;To do lista</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<div class="body-container">

<div class="container">
    <div class='alert alert-success'>
		<button class='close' data-dismiss='alert'>&times;</button>
			<strong><?php echo $row['ime']; ?> ovo je tvoj profil</strong>
    </div>

    <form id = "mojaFormaProfil">
      <strong>ID korsnika:</strong><br>
      <p name="user_id" id="user_id"> <?php echo $row['user_id']; ?> </p>
      <strong>Korisniko ime:</strong><br>
      <input class="form-control" type="text" value= "<?php echo $row['user_name']; ?>" name="user_name" id="user_name"   />
      <br>
			<strong>Lozinka:</strong><br>
			<input class="form-control" type="password" value= "<?php echo $row['user_password']; ?>"  name="user_password" id="user_password"   />
			<br>
      <strong>Ime:</strong><br>
      <input class="form-control" type="text" value= "<?php echo $row['ime']; ?>" name="ime" id="ime" />
      <br>
      <strong>Prezime:</strong><br>
      <input class="form-control" type="text" value= "<?php echo $row['prezime']; ?>" name="prezime" id="prezime" >
      <br>
      <strong>E-mail:</strong><br>
      <input class="form-control" type="text" value= "<?php echo $row['user_email']; ?>" name="user_email"  id="user_email" >
      <br>
			<div>
        <button id = "submitForm" type="submit"  name="btn-send-form" class="btn btn-primary" >Spremi</button>
      </div>
    <br>
    </form>

</div>

<div id="toast_message">Vaš profil je ažuriran...</div>

</div>
<script>

$('#mojaFormaProfil').submit(function(e) {
	e.preventDefault();
			 $.ajax({
					 url: "updateProfile.php",
					 data: $(this).serialize(),
					 type: "POST",
					// dataType: "xml",
					 success: function(data) {
							 console.log('Submission successful');
							 toastMessage();

							 setTimeout(function(){
							            location.reload();
							       }, 2000);
					 },
					 error: function(xhr, status, error) {
							 console.log('Submission failed: ' + error);
					 }
			 });
	 }
 );

 function toastMessage() {
     var x = document.getElementById("toast_message")

     x.className = "show";

     setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
 }

</script>

</body>


</html>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
