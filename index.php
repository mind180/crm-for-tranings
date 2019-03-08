<?php

		//FRONT CONTROLLER

		//1. common settings
		ini_set( 'display_errors', 1 );
		error_reporting(E_ALL);

		//2. including files of system
		define( 'ROOT', dirname(__FILE__) );
		require_once(ROOT.'/components/Router.php');


		//3.database connection


		//4.router invocing
		$router = new Router();
		$router->run();






?>
