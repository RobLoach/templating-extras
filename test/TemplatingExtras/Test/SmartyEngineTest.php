<?php

/*
 * This file is part of the TemplatingExtras package.
 *
 * (c) Rob Loach <robloach@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TemplatingExtras\Test;

use TemplatingExtras\SmartyEngine;

class SmartyEngineTest extends EngineTest
{
    public function setUp()
    {
        parent::setUp();
        $this->engine = new SmartyEngine(array(
            'cache_dir' => __DIR__ . '/../../../build/smarty-cache',
            'compile_dir' => __DIR__ . '/../../../build/smarty-compile',
            'plugins_dir' => __DIR__ . '/../../../build/smarty-plugins',
            'config_dir' => __DIR__ . '/../../../build/smarty-config',
            'template_dir' => __DIR__ . '/Fixtures',
        ));
        $this->template = 'smarty.tpl';
    }
}
