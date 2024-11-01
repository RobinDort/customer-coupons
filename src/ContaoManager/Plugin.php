<?php
namespace RobinDort\CustomerCoupons\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\CoreBundle\ContaoCoreBundle;
use RobinDort\CustomerCoupons\RobinDortCustomerCouponsBundle;


// use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
// use Symfony\Component\Config\Loader\LoaderResolverInterface;
// use Symfony\Component\HttpKernel\KernelInterface;

class Plugin implements BundlePluginInterface {
    public function getBundles(ParserInterface $parser): array {
        return [
            BundleConfig::create(RobinDortCustomerCouponsBundle::class)
                ->setLoadAfter([
                    ContaoCoreBundle::class,
                    'isotope',
                ]),
            ];
    }

    // public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
    // {
    //     $file = __DIR__.'/../../config/routes.yaml';
    //     return $resolver->resolve($file)->load($file);
    // }
}

?>