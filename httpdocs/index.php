<?php

	use \Gisleburt\Tools\Router;

	//
	// Application set up
	//
	
	// Load the config. This is kept out of httpdocs as we don't want its contents seen
	require_once __DIR__.'/../config/config.php';
	$config = new \config();
	
	// Load the autoloader. This will be used for loading most classes.
	require_once $config->dir['library'].'/Gisleburt/Tools/Autoloader.php';
	\Gisleburt\Tools\Autoloader::$incDirs[] = $config->dir['library'];
	spl_autoload_register('\Gisleburt\Tools\Autoloader::psr0');
	
	// Set up error handling. We'll handle anything php.ini asks us to and any Exceptions
	use \Gisleburt\Tools\ErrorHandler;
	ErrorHandler::$errorEmail  = $config->errorEmail;
	ErrorHandler::$errorFolder = $config->errorFolder;
	ErrorHandler::$devmode     = $config->devmode;
	ErrorHandler::setErrorDb(
			$config->errorDbServer, 
	        $config->errorDbUser,
	        $config->errorDbPass,
	        $config->errorDbSchema,
	        $config->errorDbTable
		);
	set_error_handler('\Gisleburt\Tools\ErrorHandler::handleError', error_reporting());
	set_exception_handler('\Gisleburt\Tools\ErrorHandler::handleException');
	register_shutdown_function('\Gisleburt\Tools\ErrorHandler::handleShutdown');
	
	//
	// Global Objects Setup
	//

	// Create an instance of the template controller
	$template = new \Gisleburt\Templates\Smarty();
	$template->initialise($config->smarty);
	//spl_autoload_register('\Gisleburt\Templates\Smarty::autoLoad');
	//$template->display('Index/Index.tpl'); die;
	//
	// Application start
	//
	$router = new Router('Thymely\\Controller');
	$router->analyseRequest();
	$router->loadController();


	die;