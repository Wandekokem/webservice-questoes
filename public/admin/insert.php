<?php
require_once("../../includes/initialize.php");

// if (!$session->is_logged_in()) {	redirect_to("login.php");  	}

$message = "";
if (isset($_POST['submit'])) { // O formuário foi submetido

	$question = new Question();
	$question->title = $_POST['title'];
	foreach ($_POST['choice'] as $key => $title) {
		$choice = Choice::builder($_POST['choice'][$i], false, $key);
		array_pu
	}
	$
	foreach ($_POST['choice'] as choice

?>
<?php include_layout_template('admin_header.php'); ?>

	
		<?php echo output_message($message); ?>
		<form action="login.php" method="post">
		  <table>
		    <tr>
		      <td>Pergunta</td>
		      <td><textarea name="title" cols="30" rows=""<?php echo htmlentities($password); ?>></textarea>
			 <br /><br />
		    </tr>
		    <?php for ($i = 0; $i < 5; $i++) : ?>

		    <tr>
		      <td>Alternativa <?php  echo $i+1;?></td>
		      <td><textarea name="choice[<?php echo $i; ?>]" cols="30" rows=""<?php echo htmlentities($password); ?>></textarea>
				<br />
		      </td>
		    </tr>
		    <?php endfor; ?>?>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Inserir" />
		      </td>
		    </tr>
		  </table>
		</form>
<?php include_layout_template('admin_footer.php'); ?>

<?php if(isset($database)) { $database->close_connection(); } ?>
