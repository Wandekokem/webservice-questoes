<?php
require_once('../../includes/initialize.php');

if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include_layout_template('admin_header.php'); ?>

	<h2><a href="insert.php">Inserir nova questão</a></h2>
		

<?php include_layout_template('admin_footer.php'); ?>
		
