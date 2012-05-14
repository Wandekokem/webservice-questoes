<?php
require_once("../../includes/initialize.php");
if($session->is_logged_in()) {
  redirect_to("index.php");
}

$message = "";
if (isset($_POST['submit'])) { // O formu�rio foi submetido

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
  
  // Checa o banco de dados para ver se o username/password existe.
	$found_user = User::authenticate($username, $password);
	
	if ($found_user) {
		$session->login($found_user);
		//redireciona para a p�gina principal se o login for feito.
		redirect_to("index.php");
	} else {
		// a combinaçãoo username/password n�o foi encontrada no banco de dados
		$message = "Username/password incorretos.";
	}
} else { // O formul�rio n�o foi submetido.
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
