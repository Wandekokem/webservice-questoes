<?php

function strip_zeros_from_date( $marked_string="") {
	// remove os zeros marcados
	$no_zeros = str_replace("*0", '', $marked_string);
	// ent�o remove as marcações que sobram
	$cleaned_string = str_replace('*','', $no_zeros);
	return $cleaned_string;
}

function redirect_to( $location = NULL) {
	if ($location != NULL) {
		header("Location: {$location}");
		exit;
	}
}

function output_message($message="") {
	if (!empty($message)) {
		return "<p class=\"message\">{$message}</p>";
	} else {
		return "";
	}
}

function __autoload($class_name) {
	$class_name = strtolower($class_name);
	$path = "LIB_PATH.{$class_name}.php";
	if (file_exists($path)) {
		require_once($path);
	} else {
		die("A arquivo {$class_name}.php n�o pode ser encontrado.");
	}
}

function include_layout_template($template="") {
	include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);	
}

?>