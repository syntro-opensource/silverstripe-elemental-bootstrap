<?php

namespace Syntro\SilverstripeElementalBootstrap\Extensions;

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\Form;
use SilverStripe\Core\Extension;

/**
 * We want to remove the forced width and height on embedded Images,
 * so they are not rendered in the final html.
 *
 * TODO: We want to find a way to inhibit the default rendering of height and
 *       width attributes while keeping the height and width formfield.
 *       The functionality of setting a width and height is still useful for
 *       SEO purposes.
 *
 * @author Matthias Leutenegger
 */
class BootstrapEditorImageExtension extends Extension
{

    /**
     * updateForm - updates the form
     *
     * @param  Form $form the original form
     * @return void
     */
    public function updateForm($form)
    {
        $fields = $form->Fields();
        $fields->removeByName('Dimensions');
    }
}
