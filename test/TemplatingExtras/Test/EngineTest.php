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

abstract class EngineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The engine instance itself.
     */
    protected $engine;

    /**
     * The name of the template to use.
     */
    protected $template;

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
