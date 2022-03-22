<?php

namespace ContainerMzZQBr8;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_4zNuSpaService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.4zNuSpa' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.4zNuSpa'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\DataInputController::invoerReisgegevens' => ['privates', '.service_locator.T7xmfzk', 'get_ServiceLocator_T7xmfzkService', true],
            'App\\Controller\\LoginController::index' => ['privates', '.service_locator.UDgw6Ol', 'get_ServiceLocator_UDgw6OlService', true],
            'App\\Controller\\RegistrationController::reg' => ['privates', '.service_locator.SJsOE7m', 'get_ServiceLocator_SJsOE7mService', true],
            'App\\Controller\\WeergaveReisgegevensController::exportcsv' => ['privates', '.service_locator.F4n.Gxr', 'get_ServiceLocator_F4n_GxrService', true],
            'App\\Controller\\WeergaveReisgegevensController::groupbyid' => ['privates', '.service_locator.F4n.Gxr', 'get_ServiceLocator_F4n_GxrService', true],
            'App\\Controller\\WeergaveReisgegevensController::index' => ['privates', '.service_locator.F4n.Gxr', 'get_ServiceLocator_F4n_GxrService', true],
            'App\\Controller\\WeergaveReisgegevensController::indexbyid' => ['privates', '.service_locator.F4n.Gxr', 'get_ServiceLocator_F4n_GxrService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'App\\Kernel::terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel::terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
            'App\\Controller\\DataInputController:invoerReisgegevens' => ['privates', '.service_locator.T7xmfzk', 'get_ServiceLocator_T7xmfzkService', true],
            'App\\Controller\\LoginController:index' => ['privates', '.service_locator.UDgw6Ol', 'get_ServiceLocator_UDgw6OlService', true],
            'App\\Controller\\RegistrationController:reg' => ['privates', '.service_locator.SJsOE7m', 'get_ServiceLocator_SJsOE7mService', true],
            'App\\Controller\\WeergaveReisgegevensController:exportcsv' => ['privates', '.service_locator.F4n.Gxr', 'get_ServiceLocator_F4n_GxrService', true],
            'App\\Controller\\WeergaveReisgegevensController:groupbyid' => ['privates', '.service_locator.F4n.Gxr', 'get_ServiceLocator_F4n_GxrService', true],
            'App\\Controller\\WeergaveReisgegevensController:index' => ['privates', '.service_locator.F4n.Gxr', 'get_ServiceLocator_F4n_GxrService', true],
            'App\\Controller\\WeergaveReisgegevensController:indexbyid' => ['privates', '.service_locator.F4n.Gxr', 'get_ServiceLocator_F4n_GxrService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel:terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
        ], [
            'App\\Controller\\DataInputController::invoerReisgegevens' => '?',
            'App\\Controller\\LoginController::index' => '?',
            'App\\Controller\\RegistrationController::reg' => '?',
            'App\\Controller\\WeergaveReisgegevensController::exportcsv' => '?',
            'App\\Controller\\WeergaveReisgegevensController::groupbyid' => '?',
            'App\\Controller\\WeergaveReisgegevensController::index' => '?',
            'App\\Controller\\WeergaveReisgegevensController::indexbyid' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::terminate' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'kernel::terminate' => '?',
            'App\\Controller\\DataInputController:invoerReisgegevens' => '?',
            'App\\Controller\\LoginController:index' => '?',
            'App\\Controller\\RegistrationController:reg' => '?',
            'App\\Controller\\WeergaveReisgegevensController:exportcsv' => '?',
            'App\\Controller\\WeergaveReisgegevensController:groupbyid' => '?',
            'App\\Controller\\WeergaveReisgegevensController:index' => '?',
            'App\\Controller\\WeergaveReisgegevensController:indexbyid' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:terminate' => '?',
        ]);
    }
}
