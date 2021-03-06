<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\DoctrineBundle\DoctrineBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
		new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
        	new Io\TcpdfBundle\IoTcpdfBundle(),
        	new Ideup\SimplePaginatorBundle\IdeupSimplePaginatorBundle(),
        	new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
        	new Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle(),
        	new Knp\Bundle\MenuBundle\KnpMenuBundle(),
        	new WhiteOctober\BreadcrumbsBundle\WhiteOctoberBreadcrumbsBundle(),
            new dlaser\AdminBundle\AdminBundle(),
            new dlaser\ParametrizarBundle\ParametrizarBundle(),
            new dlaser\AgendaBundle\AgendaBundle(),
            new dlaser\UsuarioBundle\UsuarioBundle(),
            new dlaser\HcBundle\HcBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
