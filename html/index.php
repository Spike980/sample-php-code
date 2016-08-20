<?php
require_once('../login/login.php');
require_once('../includes/header.php');
?>



<h1> Secure Chat </h1>

<form method="get" action="<?= $_SERVER["PHP_SELF"] ?>" class="loginform">
<fieldset>
<legend> Sign-In </legend>

<h4> Please Sign in to continue </h4>

<div>
<label for="user"> Username : </label>
<input type="text" name="user" id="user"/>
</div>

<div>
<label for="password"> Password : </label>
<input type="password" name="password" id="pass"/>
</div>

<div>
<input type="submit" name="login" id="login" value="Log-In"/>
</div>

</fieldset>
</form>

<?php
require_once('../includes/footer.php');
?>
