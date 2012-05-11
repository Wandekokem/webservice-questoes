<?php
require_once("../../includes/initialize.php");
if($session->is_logged_in()) {
  redirect_to("index.php");
}

$message = "";
// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
  
  // Check database to see if username/password exist.
	$found_user = User::authenticate($username, $password);
	
	if ($found_user) {
		$session->login($found_user);
		redirect_to("index.php");
	} else {
		// username/password combo was not found in the database
		$message = "Username/password combination incorrect.";
	}
} else { // Form has not been submitted.
  $username = "";
  $password = "";
}

?>
<?php include_layout_template('admin_header.php'); ?>

		<h2><?php echo $label['login']; ?></h2>
		<?php echo output_message($message); ?>

		<form action="login.php" method="post">
		  <table>
		    <tr>
		      <td>Usuário:</td>
		      <td>
		        <input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Senha:</td>
		      <td>
		        <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Entrar" />
		      </td>
		    </tr>
		  </table>
		</form>
<?php include_layout_template('admin_footer.php'); ?>

<?php if(isset($database)) { $database->close_connection(); } ?>
