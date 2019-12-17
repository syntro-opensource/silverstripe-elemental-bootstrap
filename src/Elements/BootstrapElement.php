<?php

namespace Syntro\SilverstripeElementalBootstrap\Elements;

use SilverStripe\Forms\FieldList;
use DNADesign\Elemental\Models\BaseElement;
use Syntro\SilverstripeElementalBootstrap\Elements\BootstrapRow;
use Syntro\SilverstripeElementalBootstrap\Controllers\BootstrapElementController;
use Syntro\SilverstripeElementalBootstrap\Extensions\BootstrapExtension;

/**
 * The base building block for any Bootstrap element.
 * This Element is intended to provide all additional fields needed for a
 * good bootstrap integration
 * @author Matthias Leutenegger
 */
class BootstrapElement extends BaseElement
{
    private static $table_name = 'Syntro_Elemental_BootstrapElement';

    private static $title = 'Element';

    private static $singular_name = 'Element';

    private static $plural_name = 'Elements';

    private static $description = 'A bootstrap element';

    /**
     * @var string
     */
    private static $controller_class = BootstrapElementController::class;

    /**
     * Database fields
     *
     * @var array
     */
    private static $db = [
    ];

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
     * getCMSFields - return the fields rendered in cms
     *
     * @return FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(
            function (FieldList $fields) {
            }
        );
         return parent::getCMSFields();
    }

    /**
     * getType - get the translated name
     *
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Bootstrap Element');
    }
}
