<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \Symfony\Bundle\MonologBundle\MonologBundle(),
            new \Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new \Cnerta\MailingBundle\CnertaMailingBundle(),
        );
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config_test.yml');
    }

    /**
     * @return string
     */
    public function getCacheDir()
    {
        $cacheDir = sys_get_temp_dir() . '/cnertamailingbundle/cache';
        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0777, true);
        }

        return $cacheDir;
    }

    /**
     * @return string
     */
    public function getLogDir()
    {
        $logDir = sys_get_temp_dir() . '/cnertamailingbundle/logs';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        return $logDir;
    }
}