<?php
require_once("../../includes/initialize.php");

if (!$session->is_logged_in()) {redirect_to("login.php");  	}

$message = "";
if (isset($_POST['submit'])) { // O formulário foi submetido

	$question = new Question();
	$question->title = $_POST['title'];
	foreach ($_POST['choice'] as $key => $title) {
		$choice = Choice::builder($_POST['choice'][$key], false, $key+1);
		array_push($question->choices, $choice);
	}
	if ($question->save()) {
		$message = "Alternativa foi criada com sucesso.";
	}
}

?>
<?php include_layout_template('admin_header.php'); ?>

	
		<?php echo output_message($message); ?>
		<form action="insert.php" method="post">
		  <table>
		    <tr>
		      <td>Pergunta</td>
		      <td><textarea name="title" cols="30" rows=""></textarea>
			 <br /><br />
		    </tr>
		    <?php for ($i = 0; $i < 5; $i++) : ?>

		    <tr>
		      <td>Alternativa <?php  echo $i+1;?></td>
		      <td><textarea name="choice[<?php echo $i; ?>]" cols="30" rows=""></textarea>
				<br />
		      </td>
		    </tr>
		    <?php endfor; ?>
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