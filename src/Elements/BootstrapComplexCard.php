<?php

namespace Syntro\SilverstripeElementalBootstrap\Elements;

use DNADesign\Elemental\Models\ElementContent;
use DNADesign\ElementalList\Model\ElementList;
use Syntro\SilverstripeElementalBootstrap\Controllers\BootstrapElementController;
use Syntro\SilverstripeElementalBootstrap\Extensions\BootstrapExtension;

/**
 * A complex Card, allowing the user to create cards with any
 * content inside
 * @author Matthias Leutenegger
 */
class BootstrapComplexCard extends ElementList
{
    private static $icon = 'font-icon-block-banner';
    private static $table_name = 'Syntro_Elemental_BootstrapComplexCard';
    private static $title = 'ComplexCard';
    private static $singular_name = 'complex cards';
    private static $plural_name = 'complex cards';
    private static $description = 'Complex Card, allows adding of multiple content blocks';
    private static $allowed_elements = array(
    BootstrapRow::class,
    ElementContent::class,
    BootstrapImage::class,
    BootstrapAlert::class,
    BootstrapCarousel::class
    );

    /**
     * Defines extension names and parameters to be applied
     * to this object upon construction.
     *
     * @var array
     */
    private static $extensions = [
    BootstrapExtension::class,
    ];

    /**
     * @var string
     */
    private static $controller_class = BootstrapElementController::class;


    /**
     * getType - get the translated name
     *
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Complex Card');
    }
}
