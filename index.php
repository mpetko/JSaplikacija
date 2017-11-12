<?php

session_start();

if(isset($_SESSION['user_session'])!="")
{
	header("Location: home.php");
}

?>
<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mario Petkovic | Diplomski - Prijava</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">

<script type="text/javascript" src="bootstrap/js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/validation.min.js"></script>
<link href="bootstrap/css/style1.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="bootstrap/js/script.js"></script>

</head>

<body>

	<div class="jumbotron text-center">
	  <h1>Mario Petković | Diplomski rad </h1>
	  <p>Automatsko testiranje web aplikacija uz podršku Geb web drivera

	</p>
	</div>

	<div class="container">
       <form class="form-signin" method="post" id="login-form">

        <h2 class="form-signin-heading">Logirajte se</h2>
				<hr />

        <div id="error">
        <!-- error will be shown here ! -->
        </div>

        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_emaila" />
        <span id="check-e"></span>
        </div>

        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>

     	<hr />

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary btn-block" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Prijava
			</button>
        </div>

      </form>

    </div>


<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
