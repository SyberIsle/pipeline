<?php
return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::PSR12_LEVEL)
    ->finder(Symfony\CS\Finder\DefaultFinder::create()
        ->in(__DIR__.'/src'));