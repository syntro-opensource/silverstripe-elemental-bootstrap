# Silverstripe Elemental Bootstrap

> This project is still a work-in-progress and will be improved over time. If you feel something is missing, feel free to open an issue or a pull request

[![Build Status](https://travis-ci.org/syntro-opensource/silverstripe-elemental-bootstrap.svg?branch=develop)](https://travis-ci.org/syntro-opensource/silverstripe-elemental-bootstrap)
[![phpstan](https://img.shields.io/badge/PHPStan-enabled-success)](https://github.com/phpstan/phpstan)
[![composer](https://img.shields.io/packagist/dt/syntro/silverstripe-elemental-bootstrap?color=success&logo=composer)](https://packagist.org/packages/syntro/silverstripe-elemental-bootstrap)

This module takes the [dnadesign/silverstripe-elemental](https://github.com/dnadesign/silverstripe-elemental)
module and uses it to simplify bootstrap layouting.

![bootstrap](docs/img/admin.png)

## Grid Layout
[Bootstrap](https://www.getbootstrap.com) is built around its grid layout. Using
this grid gives a content-editor who has experience with bootstrap a very powerful
tool to create responsive layouts.



## Usage:
### Installation
For installation details, see [the docs](docs/en/installation.md).



## Adding Additional Elements
Additional or custom elements can be added by extending the `BootstrapElement`
class. Extending this class ensures the correct handling of positioning in
the grid-layout:
```php
use Syntro\SilverstripeElementalBootstrap\Elements\BootstrapElement;

class BootstrapMedia extends BootstrapElement
{
  ...
}
```
You can also use the `BootstrapExtension` extension on a class extending the
original elemental classes to achieve the same result, but this will require you
to add a template for the Class that
