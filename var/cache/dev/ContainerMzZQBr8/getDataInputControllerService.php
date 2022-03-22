<?php

namespace ContainerMzZQBr8;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDataInputControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\DataInputController' shared autowired service.
     *
     * @return \App\Controller\DataInputController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/DataInputController.php';

        $container->services['App\\Controller\\DataInputController'] = $instance = new \App\Controller\DataInputController();

        $instance->setContainer(($container->privates['.service_locator.l1ae.Qz'] ?? $container->load('get_ServiceLocator_L1ae_QzService'))->withContext('App\\Controller\\DataInputController', $container));

        return $instance;
    }
}
