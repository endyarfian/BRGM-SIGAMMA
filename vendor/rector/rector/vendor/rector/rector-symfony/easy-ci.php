<?php

declare (strict_types=1);
namespace RectorPrefix202210;

use Rector\Core\Contract\Rector\RectorInterface;
use Rector\Set\Contract\SetListInterface;
use Rector\Symfony\Contract\Bridge\Symfony\Routing\SymfonyRoutesProviderInterface;
use RectorPrefix202210\Symplify\EasyCI\Config\EasyCIConfig;
return static function (EasyCIConfig $easyCIConfig) : void {
    $easyCIConfig->typesToSkip([SymfonyRoutesProviderInterface::class, SetListInterface::class, RectorInterface::class]);
};
