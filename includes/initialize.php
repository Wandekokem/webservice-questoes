<?php
//Define os caminhos do nucleo
 
//DIRECTORY_SEPARATOR é uma constante predefinida do PHP
// (\ para Windows, / para Unix
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//SITE_ROOT é C:\sites\webservice-questoes\ - Raiz do projeto
defined('SITE_ROOT') ? null : define ('SITE_ROOT','C:'.DS.'sites'.DS.'webservice-questoes');
//LIB_PATH � C:\sites\webservice-questoes\includes\ - Livraria
defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'includes');

//carrega o arquivo de configurações primeiro
require_once(LIB_PATH.DS."config.php");

//Textos e títulos
require_once(LIB_PATH.DS."captions.php");

//carrega as funções b�sicas para que o resto use-as
require_once(LIB_PATH.DS."functions.php");

//carrega os objetos principais
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."database.php");
require_once(LIB_PATH.DS."database_object.php");

//carrega classes
require_once(LIB_PATH.DS."user.php");
require_once(LIB_PATH.DS."question.php");
require_once(LIB_PATH.DS."choice.php");
?>