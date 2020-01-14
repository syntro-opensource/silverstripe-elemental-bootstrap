# Configuration

`syntro/silverstripe-elemental-bootstrap` by itself requires no configuration to
function. However, you will have to configure [dnadesign/silverstripe-elemental](https://github.com/dnadesign/silverstripe-elemental).

The simplest way to start using `dnadesign/silverstripe-elemental` is to add the
following to your config:

```yaml
Page:
  extensions:
    - DNADesign\Elemental\Extensions\ElementalPageExtension
```

For your content to actually show up on pages, you have to, instead of
`$Content`, use the following in your templates:
```html
<div class="row">
  $ElementalArea
</div>
```
Silverstripe-elemental-bootstrap expects a parent Row to be present!
