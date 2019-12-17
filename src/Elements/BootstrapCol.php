<?php

namespace Syntro\SilverstripeElementalBootstrap\Elements;

use DNADesign\Elemental\Models\ElementContent;
use DNADesign\ElementalList\Model\ElementList;
use Syntro\SilverstripeElementalBootstrap\Controllers\BootstrapElementController;
use Syntro\SilverstripeElementalBootstrap\Extensions\BootstrapExtension;

/**
 * A simple Column field, allowing the user to add arbitrary text, images, carousels
 * and more inside a column with defined width.
 * @author Matthias Leutenegger
 */
class BootstrapCol extends ElementList
{
    private static $icon = 'font-icon-block-layout';
    private static $table_name = 'Syntro_Elemental_BootstrapColumn';
    private static $title = 'Column';
    private static $singular_name = 'column';
    private static $plural_name = 'columns';
    private static $description = 'Simple column, allows to add simple fields to a column';
    private static $allowed_elements = array(
    BootstrapRow::class,
    BootstrapContent::class,
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
        return _t(__CLASS__ . '.BlockType', 'Column');
    }
}
