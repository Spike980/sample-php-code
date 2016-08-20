<?php
require_once('../includes/header.php');
require_once('../includes/signup.php');
?>

<form method="post" action="signup.php">
<fieldset>
<legend> Sign-Up </legend>

<div>
<label for="user"> User_Name </label>
<input type="text" name="user" id="user"/>
</div>

<div>
<label for="password"> Password </label>
<input type="password" name="pass" id="pass"/>
</div>

<div>
<label for="email"> E-mail </label>
<input type="email" name="email" id="email"/>
</div>

<div>
<input type="submit" name="signup" value="signup"/>
</div>

</fieldset>
</form>

<?php
require_once('../includes/footer.php');
?>

