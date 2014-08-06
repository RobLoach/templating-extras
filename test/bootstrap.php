<?php

/*
 * This file is part of the TemplatingExtras package.
 *
 * (c) Rob Loach <robloach@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$autoloadFile = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($autoloadFile)) {
    throw new RuntimeException('Install dependencies to run phpunit.');
}
require_once $autoloadFile;

$loader = new \Composer\Autoload\ClassLoader();
$loader->add('TemplatingExtras\Test', 'test');
$loader->register();
