<?php

namespace Syntro\SilverstripeElementalBootstrap\Elements;

use DNADesign\ElementalList\Model\ElementList;
use Syntro\SilverstripeElementalBootstrap\Controllers\BootstrapElementController;
use Syntro\SilverstripeElementalBootstrap\Extensions\BootstrapExtension;

/**
 * A Row field, the basic field in the bootstrap-based editing.
 * A row contains several Objects with the BootstrapColExtension.
 * @author Matthias Leutenegger
 */
class BootstrapRow extends ElementList
{
    private static $icon = 'font-icon-block-layout';
    private static $table_name = 'Syntro_Elemental_BootstrapRow';
    private static $title = 'Row';
    private static $description = 'Orderable row of elements';
    private static $singular_name = 'row';
    private static $plural_name = 'rows';
    private static $allowed_elements = array(
    BootstrapCol::class,
    BootstrapCard::class,
    BootstrapComplexCard::class,
    BootstrapAlert::class,
    BootstrapCarousel::class,
    BootstrapImage::class,
    BootstrapRow::class,
    BootstrapContent::class,
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
        return _t(__CLASS__ . '.BlockType', 'Row');
    }
}
