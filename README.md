# Templating Extras

[![Build Status](https://travis-ci.org/RobLoach/templating-extras.png)](https://travis-ci.org/RobLoach/templating-extras)
[![Coverage Status](https://coveralls.io/repos/RobLoach/templating-extras/badge.png?branch=master)](https://coveralls.io/r/RobLoach/templating-extras?branch=master)
[![Total Downloads](https://poser.pugx.org/robloach/templating-extras/downloads.png)](https://packagist.org/packages/robloach/templating-extras)
[![Latest Stable Version](https://poser.pugx.org/robloach/templating-extras/v/stable.png)](https://packagist.org/packages/robloach/templating-extras)

Extra template engines for [Symfony's Templating component](http://symfony.com/doc/current/components/templating/introduction.html).

## Supported template engines

* [Smarty](http://smarty.net) ([SmartyEngine](src/TemplatingExtras/SmartyEngine.php))


## Installation

Templating Extras can be installed with [Composer](http://getcomposer.org)
by adding it as a dependency to your project's composer.json file.

```json
{
    "require": {
        "robloach/templating-extras": "*"
    }
}
```

Please refer to [Composer's documentation](https://github.com/composer/composer/blob/master/doc/00-intro.md#introduction)
for more detailed installation and usage instructions.


## Usage

Instantiate one of the engines:

``` php
use TemplatingExtras\SmartyEngine;

$templating = new SmartyEngine(array(
    'template_dir' => '.'
));

echo $templating->render('hello.tpl', array('firstname' => 'Fabien'));
```

#### hello.tpl
``` smarty
Hello, {$firstname}!
```

See [Symfony's documentation on Templating](http://symfony.com/doc/current/components/templating/introduction.html#usage) for more information about using the different template engines available.
