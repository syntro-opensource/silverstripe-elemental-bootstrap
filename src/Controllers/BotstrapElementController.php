<?php

namespace Syntro\SilverstripeElementalBootstrap\Controllers;

use SilverStripe\View\SSViewer;
use DNADesign\Elemental\Controllers\ElementController;

/**
 * We have to expand the default ElementController to not wrap every
 * Element in an additional div (this interferes with bootstrap classes)
 * @author Matthias Leutenegger
 */
class BootstrapElementController extends ElementController
{

    /**
     * forTemplate - renders the object for display in html
     *
     * @return string
     */
    public function forTemplate()
    {
        $template = $this->element->config()->get('controller_template');

        $viewer = SSViewer::create(
            [
            'type' => 'Layout',
            'Syntro\\SilverstripeElementalBootstrap\\' . $template
            ]
        );
        $html = $this->renderWith($viewer->setRewriteHashLinks(false));
        return $html;
    }
}
