<?php
require_once('../../includes/initialize.php'); ?>

<?php include_layout_template('admin_header.php'); ?>

	<h2>Banco de dados</h2>
	<pre>
	<code>
------------------------------------
-- Estrutura da tabela `questions`
------------------------------------

CREATE TABLE IF NOT EXISTS `questions` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
	
	
-----------------------------------
-- Estrutura da tabela `choices` --
-----------------------------------
	
CREATE TABLE IF NOT EXISTS `choices` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`question_id` int(11) NOT NULL,
	`title` text NOT NULL,
	`correct` tinyint(1) NOT NULL,
	`sequence` int(11) NOT NULL,
	PRIMARY KEY (`id`),
	KEY `question_id` (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

---------------------------------
-- Estrutura da tabela `users` --
---------------------------------

CREATE TABLE IF NOT EXISTS `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL,
	`password` varchar(30) NOT NULL,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`),
	KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
	</code>
	</pre>
		

<?php include_layout_template('admin_footer.php'); ?>
		

	