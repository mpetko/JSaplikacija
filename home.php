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
<title>Mario Petkovic | Diplomski - Pocetna</title>
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
    z-index: 7000;
    left: 50%;
    bottom: 30px;
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#toast_message.show {
    visibility: visible;
}
</style>

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <p class="navbar-brand">MP - Geb Automatizacija</p>
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
			<strong>Pozdrav <?php echo $row['ime']. " ".$row['prezime']."!"; ?></strong>  Dobrodosao na korisnicku stranicu.
    </div>
</div>

<div class="container">
<h3>Prije početka rada molimo vas da ispunite naš kratki upitnik! </h3>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Ispuni upitnik
</button>
<br>
<br>

<div style = "visibility: hidden;" id = "sakriveno" class='alert alert-success'>
<button class='close' data-dismiss='alert'>&times;</button>
	<strong>Upitnik uspješno ispunjen!</strong>
</div>



    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upitnik o prometu</h4>
      </div>
      <div class="modal-body">
		<h3>Osobni podaci:</h3>

	<form id = "mojaForma">
	<div class="row">
	<div class="col-sm-6">
		<strong>Ime:</strong><br>
	  <input class="form-control" type="text" name="imekorisnika" id="imekorisnika" />
	  <br>
	</div>
	<div class="col-sm-6">
		<strong>Prezime:</strong><br>
	  <input class="form-control" type="text" name="prezimekorisnika"  id="prezimekorisnika">
		<br>
	</div>
</div>
<br>

<div class="row">
<div class="col-sm-6">
	<strong>Spol:</strong><br>
	<input id = "spol" type="radio" name="spol" value="zena">Zena<br>
	<input id = "spol" type="radio" name="spol" value="muskarac"> Muskarac<br>
  <br>
	</div>

	<div class="col-sm-6">
	<strong>Grad:</strong><br>
	<select id = "grad" name = "grad" class="form-control">
		<option value="Zagreb">Zagreb</option>
		<option value="Rijeka">Rijeka</option>
		<option value="Osijek">Osijek</option>
		<option value="Split">Split</option>
</select>
<br><br>
	</div>
</div>

<div class="row">
<div class="col-sm-6">
<strong>Što vozite?</strong><br>
<input id ="vozilo"  type="checkbox" name="vozilo" value="bicikl"> Bicikl<br>
<input id ="vozilo"  type="checkbox" name="vozilo" value="auto"> Auto <br>
<input id ="vozilo" type="checkbox" name="vozilo" value="auto"> Motor
<br><br>
</div>

<div class="col-sm-6">
<!-- <strong>Pošajite nam sliku vašeg vozila:</strong><br> -->
 <!-- <input id="slika" class="input-group" type="file" name="slika" accept="image/*"> -->
<br><br>
</div>
  </div>

Komenatar:<br>
  <textarea class="form-control" name="komentar" id = "komentar" rows="5" cols="40"></textarea>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
        <button id = "submitForm" type="submit"  name="btn-send-form" class="btn btn-primary" >Pošalji</button>
      </div>

</div>
</form>

    </div>
  </div>
</div>

<div id="toast_message">Hvala na odgovorima!</div>


<script>
$('#mojaForma').submit(function(e) {
	e.preventDefault();
			 $.ajax({
					 url: "insertForm.php",
					 data: $(this).serialize(),
					 type: "POST",
					dataType: "text",
					 success: function(data) {
							 console.log('Submission successful');
							 toastMessage();
							 setTimeout(function(){
													location.reload();
										 }, 3000);
					 },
					 error: function(xhr, status, error) {
							 console.log('Submission failed: ' + error);
					 }
			 });
	 }
 );

 function toastMessage() {
 		// Get the snackbar DIV
 		var x = document.getElementById("toast_message")

 		// Add the "show" class to DIV
 		x.className = "show";

 		// After 3 seconds, remove the show class from DIV
 		setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
 }

</script>


</body>


</html>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
