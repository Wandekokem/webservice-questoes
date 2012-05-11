<?php
require_once('../../includes/initialize.php');

if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include_layout_template('header.php'); ?>

	<h2>Opções</h2>
		

<?php include_layout_template('footer.php'); ?>
		
