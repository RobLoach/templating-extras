<?php

/*
 * This file is part of the TemplatingSmarty package.
 *
 * (c) Rob Loach <robloach@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RobLoach\TemplatingSmarty;

use Symfony\Component\Templating\EngineInterface;

use Smarty;

/**
 * Symfony Templating bridge to Smarty.
 */
class SmartyEngine implements EngineInterface
{
    /**
     * The Smarty template engine instance.
     */
    protected $smarty;

    /**
     * Build the Smarty engine.
     *
     * @param array $options An array of parameters used to set up the Smarty
     *   configuration. Available configuration values include:
     *     - cache_dir
     *     - compile_dir
     *     - config_dir
     *     - plugins_dir
     *     - template_dir
     */
    public function __construct($options)
    {
        // Create the Smarty template engine.
        $this->smarty = new Smarty();

        // Set any of the required configuration.
        if (isset($options['cache_dir'])) {
            $this->smarty->setCacheDir($options['cache_dir']);
        }
        if (isset($options['compile_dir'])) {
            $this->smarty->setCompileDir($options['compile_dir']);
        }
        if (isset($options['config_dir'])) {
            $this->smarty->setConfigDir($options['config_dir']);
        }
        if (isset($options['plugins_dir'])) {
            $this->smarty->setPluginsDir($options['plugins_dir']);
        }
        if (isset($options['template_dir'])) {
            $this->smarty->setTemplateDir($options['template_dir']);
        }
    }

    /**
     * Renders a template.
     *
     * @param string|TemplateReferenceInterface $name       A template name or a TemplateReferenceInterface instance
     * @param array                             $parameters An array of parameters to pass to the template
     *
     * @return string The evaluated template as a string
     *
     * @throws \RuntimeException if the template cannot be rendered
     *
     * @api
     */
    public function render($name, array $parameters = array())
    {
        foreach ($parameters as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        // Render the template using Smarty.
        $output = $this->smarty->fetch($this->nameToString($name));

        return trim($output);
    }

    /**
     * Returns true if the template exists.
     *
     * @param string|TemplateReferenceInterface $name A template name or a TemplateReferenceInterface instance
     *
     * @return bool    true if the template exists, false otherwise
     *
     * @throws \RuntimeException if the engine cannot handle the template name
     *
     * @api
     */
    public function exists($name)
    {
        return $this->smarty->templateExists($this->nameToString($name));
    }

    /**
     * Returns true if this class is able to render the given template.
     *
     * @param string|TemplateReferenceInterface $name A template name or a TemplateReferenceInterface instance
     *
     * @return bool    true if this class supports the given template, false otherwise
     *
     * @api
     */
    public function supports($name)
    {
        // @todo Figure out what to do here.
        return true;
    }

    /**
     * Converts a template name to string if it is anything other than a string.
     */
    private function nameToString($name)
    {
        return is_string($name) ? $name : $name->toString();
    }
}
