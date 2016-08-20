<?php
session_start();

if (isset($_GET['user']) && isset($_GET['password']))
	try{
		require_once('../includes/con.php');
		$stmt=$con->prepare("SELECT * FROM user_ver WHERE username=:username AND password=:password LIMIT 1");
		$stmt->bindParam(':username', $_GET['user'],PDO::PARAM_STR,32);
		$stmt->bindParam(':password', $_GET['password'],PDO::PARAM_STR,32);

		$stmt->execute();
		$count= $stmt->rowCount();

		if($count==1)
		{
			$_SESSION["authenticated"]= true;
			echo 'Connected';
			echo $_SERVER['PHP_SELF'];
			$host = $_SERVER["HTTP_HOST"];
			$path = rtrim(dirname($_SERVER["PHP_SELF"]),'/\\');
			$userdir=$_GET['user']."abc";
			
			header("Location: $userdir/home.php");
		}
		else
		{
			header("Location: $host$path/signup.php");
		}
 
		$con=null;
	}

	catch(PDOException $e)
	{
		echo 'hello';
		echo $e->getMessage();
		
	}		
?>

