# Silverstripe Elemental Bootstrap

[![phpstan](https://img.shields.io/badge/PHPStan-enabled-success)](https://github.com/phpstan/phpstan)

This module takes the [dnadesign/silverstripe-elemental](https://github.com/dnadesign/silverstripe-elemental)
module and uses it to simplify bootstrap layouting.

## Usage:
```
composer require syntro/silverstripe-elemental-bootstrap
```
For installation details, see [dnadesign/silverstripe-elemental](https://github.com/dnadesign/silverstripe-elemental).

To enable Elements, you have to add the following to your config:

```yaml
Page:
  extensions:
    - DNADesign\Elemental\Extensions\ElementalPageExtension
```


Then, instead of `$Content`, use the following:
```html
<div class="row">
  $ElementalArea
</div>
```


### Grid Layout
Bootstrap is built around its grid layout. To make use of this, classes like
`col-12` or `col-12 col-md-6 col-lg-4` can be added to objects inside a row
element. Silverstripe-elemental-bootstrap expects a parent Row to be present
outside of the internal Roles:
```html
<div class="row">
  $ElementalArea
</div>
```
The Logic behind this is to allow users to easily manage content elements on
pages which do not need an elaborate, multirow layout. Multiple rows can still
be used by creating a row and setting its widthfor xs to 12 and let all other sizes inherit.
This will lead to a full width row which can be handled like any other row.

## Additional Elements
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
original elemental classes to achieve the same result.
