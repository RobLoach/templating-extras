<?php

/*
 * This file is part of the TemplatingSmarty package.
 *
 * (c) Rob Loach <robloach@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobLoach\TemplatingSmarty\Test;

use RobLoach\TemplatingSmarty\SmartyEngine;
use Symfony\Component\Templating\TemplateNameParser;

/**
 * Tests for SmartyEngine.
 *
 * @see SmartyEngine
 */
class SmartyEngineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The engine instance itself.
     */
    protected $engine;

    /**
     * The name of the template to use.
     */
    protected $template;

    public function setUp()
    {
        parent::setUp();
        $parser = new TemplateNameParser();
        $this->engine = new SmartyEngine($parser, array(
            'cache_dir' => __DIR__ . '/../../../build/smarty-cache',
            'compile_dir' => __DIR__ . '/../../../build/smarty-compile',
            'plugins_dir' => __DIR__ . '/../../../build/smarty-plugins',
            'config_dir' => __DIR__ . '/../../../build/smarty-config',
            'template_dir' => __DIR__ . '/Fixtures',
        ));
        $this->template = 'helloworld.smarty';
    }

    public function testRender()
    {
        $expected = 'Hello, world!';
        $output = $this->engine->render($this->template, array('name' => 'world'));
        $this->assertEquals($expected, $output);
    }

    public function testSupports()
    {
        $supports = $this->engine->supports($this->template);
        $this->assertEquals(true, $supports);
    }

    public function testExists()
    {
        $exists = $this->engine->exists($this->template);
        $this->assertEquals(true, $exists);
    }
}
