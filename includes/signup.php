<?php
if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['email']))
{
	try {

	require_once('../includes/con.php');
	$stmt= $con->prepare("SELECT 1 FROM user_ver WHERE username=:user LIMIT 1");
	$stmt->bindParam(':user', $_POST['user'], PDO::PARAM_STR, 32);

	$stmt-> execute();
	$count= $stmt->rowCount();

	$host= $_SERVER["HTTP_HOST"];
	$path= rtrim(dirname($_SERVER["PHP_SELF"]),'/\\');

	if ($count==0)
	{
		$name= htmlspecialchars($_POST['user']);
		if (!mkdir("name", 0777)) {
			header("Location: $host$path/signup.php");
		}
		$user=mysql_real_escape_string($_POST['user']);
		$pass=mysql_real_escape_string($_POST['pass']);
		$email=mysql_real_escape_string($_POST['email']);

		$rows= $con->exec("INSERT INTO table(username, password, dir_path, email, time) 
				   VALUES("$user", "$pass", "$user", "$email", "NOW()"))); 
		

		$stmt= $con->prepare("CREATE TABLE :table (
			index BIGINT NOT NULL AUTO_INCREMENT PRIMARY_KEY,
			id    BIGINT INDEX NOT NULL,
			status BOOLEAN NOT NULL
		)");
		$stmt->bindParam(':table', $user, PDO::PARAM_STR, 32);

		$stmt->execute();




		$sq = $con->query($sql);

		$sql1= "CREATE TABLE '$name.chat' (
			index BIGINT NOT NULL AUTO_INCREMENT PRIMARY_KEY,
			f_id BIGINT NOT NULL INDEX,
			msg TEXT,
			time DATETIME )";

		$host= $_SERVER['HTTP_HOST'];
		$path= rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$sq1 = $con->query($sql1);
		header("Location: $host$path/meabc/home.php");

	}


	else
	{
		print("User name already taken");

	}

	}

	catch(PDOException $e)
		{
			print $e->getMessage();
		}
}
