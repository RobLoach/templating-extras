# Templating Smarty

[![Build Status](https://travis-ci.org/RobLoach/templating-smarty.png)](https://travis-ci.org/RobLoach/templating-smarty)
[![Total Downloads](https://poser.pugx.org/robloach/templating-smarty/downloads.png)](https://packagist.org/packages/robloach/templating-smarty)
[![Latest Stable Version](https://poser.pugx.org/robloach/templating-smarty/v/stable.png)](https://packagist.org/packages/robloach/templating-extras)

[Smarty](http://www.smarty.net) support for [Symfony's Templating component](http://symfony.com/doc/current/components/templating/introduction.html).


## Installation

*Templating Smarty* can be installed with [Composer](http://getcomposer.org)
by adding it as a dependency to your project's composer.json file.

```json
{
    "require": {
        "robloach/templating-smarty": "*"
    }
}
```

Please refer to [Composer's documentation](https://github.com/composer/composer/blob/master/doc/00-intro.md#introduction)
for more detailed installation and usage instructions.


## Usage

Instantiate the engine:

``` php
use RobLoach\TemplatingExtras\SmartyEngine;

$templating = new SmartyEngine(array(
    'template_dir' => '.'
));

echo $templating->render('hello.smarty', array('firstname' => 'Fabien'));
```

#### hello.smarty
``` smarty
Hello, {$firstname}!
```

See [Symfony's documentation on Templating](http://symfony.com/doc/current/components/templating/introduction.html#usage) for more information about using the different template engines available.
