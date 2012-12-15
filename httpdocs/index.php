<?php

	use Thymely\LazyData\Timing;

	//
	// Application set up
	//
	
	// Load the config. This is kept out of httpdocs as we don't want its contents seen
	require_once __DIR__.'/../config/config.php';
	$config = new \config();
	
	// Load the autoloader. This will be used for loading most classes.
	require_once $config->dir['library'].'/Autoloader.php';
	\Autoloader::$incDirs[] = $config->dir['library'];
	spl_autoload_register('Autoloader::psr0');
	
	// Set up error handling. We'll handle anything php.ini asks us to and any Exceptions
	\Gisleburt\Tools\ErrorHandler::$errorEmail  = $config->errorEmail;
	\Gisleburt\Tools\ErrorHandler::$errorFolder = $config->errorFolder;
	\Gisleburt\Tools\ErrorHandler::$devmode     = $config->devmode;
	\Gisleburt\Tools\ErrorHandler::setErrorDb(
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
	
	// Smarty
	$smartyFolder = $config->dir['library'].'/Smarty';
	require_once $smartyFolder.'/Smarty.class.php';

	// Create an instance of the template controller
	$smarty = new Smarty();
	$smarty->setTemplateDir($config->dir['templates']       )
	       ->setCompileDir($config->dir['templatesC'])
	       ->setCacheDir(  $smartyFolder.'/cache'      )
	       ->setConfigDir( $smartyFolder.'/configs'    );
	$smarty->error_reporting = E_ERROR;
	$smarty->assign('devMode', $config->devmode);
	
	$timing = Timing::startTiming('Hello');
	var_dump($timing);
	
	echo 'oh hai';

	