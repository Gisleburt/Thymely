<?php

	namespace Thymely\Form;

	use \Zend\Form\Form;
    use Zend\Form\View\HelperConfig;
    use Zend\Mvc\Service\ViewHelperManagerFactory;


    abstract class FormAbstract extends Form
	{

		abstract public function generate();

		public function __toString() {

            $serviceManager = new ViewHelperManagerFactory();

            $config = new HelperConfig();
            $config->configureServiceManager($serviceManager);

                    $serviceManager->createService()

			$renderer = new \Zend\Form\View\Helper\Form();
            $renderer->setView($serviceManager);
            return $renderer->render($this);

		}

	}
