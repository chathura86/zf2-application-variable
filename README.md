zf2-application-variable
========================

Application level variables for Zend 2

(This is a customized version and not yet suitable for general use.
I'll update this once it is suitable for general use. How ever feel free to use it if you know what you are doing.)

## Requirements

  * Zend Framework 2 (https://github.com/zendframework/zf2). Tested on Zend Framework 2.0.0beta4.
  * PHP 5.3 or gather

## Installation

  1. On your `composer.json` add:
``` json
{
    "require": {
        "chathura86/zf2-application-variable": "dev-master"
    }
}
```
  2. Run `php composer.phar install`
  3. Open ``configs/application.config.php`` and add ``'AppVariableBundle'`` to your ``'modules'`` parameter.


## How to setup
``` php
<?php
// configs/autoload/local.php
return array(
	// other configurations
    'AppVariableBundle' => array(
        'driver' => 'memory',			// available drivers memory|file
		'path' => sys_get_temp_dir()	// requred only for file based driver
    )
);
?>
```
## How to use

``` php
// in controller
$this->getServiceLocator()->get('AppVariable') // VariableManager object
```