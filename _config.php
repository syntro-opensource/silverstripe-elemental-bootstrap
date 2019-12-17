<?php
use SilverStripe\Core\Manifest\ModuleLoader;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;
use SilverStripe\Forms\HTMLEditor\HtmlEditorConfig;

// This adds the class img-fluid as default class.
// TODO; Find a way to do this via SS and not bruteforced
HtmlEditorConfig::get('cms')->setOption(
  'extended_valid_elements',
  'img[id|dir|longdesc|usemap|class:img-fluid ss-htmleditorfield-file image|src|border|alt=|title|width|height|align|data*]'
);
