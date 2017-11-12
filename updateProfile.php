<?php
require_once 'dbconfig.php';

session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: index.php");
}

$user_name = trim($_POST['user_name']);
$user_password = trim($_POST['user_password']);
$password = md5($user_password);
$ime = trim($_POST['ime']);
$prezime = trim($_POST['prezime']);
$user_email = trim($_POST['user_email']);

  $stmt = $db_con->prepare ( " UPDATE korisnici SET
    user_name = :user_name,
		user_password = :user_password,
    ime = :ime,
    prezime = :prezime,
    user_email = :user_email
    WHERE user_id = " . $_SESSION['user_session'] . " ");


		$stmt->bindParam(':user_name', $user_name);
		$stmt->bindParam(':user_password', $password);
    $stmt->bindParam(':ime', $ime);
    $stmt->bindParam(':prezime', $prezime);
    $stmt->bindParam(':user_email', $user_email);

		if($stmt->execute()){

			$result =1;

		}

		echo $result;

		$db_con = null;

?>
