<?php declare(strict_types=1);


namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use TelegramBundle\TelegramBundle;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    /**
     * Returns an array of bundles to register.
     *
     * @return iterable|BundleInterface[] An iterable of bundle instances
     */
    public function registerBundles()
    {
        yield new FrameworkBundle;
        yield new TelegramBundle;
    }

    public function configureContainer(ContainerConfigurator $c): void
    {
        $c->import($this->getProjectDir() . '/src/Resources/config/*.yaml');
        $c->import(__DIR__ . '/telegram.yaml');
    }
}
