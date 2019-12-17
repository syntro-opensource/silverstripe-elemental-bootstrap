<?php

namespace Syntro\SilverstripeElementalBootstrap\Elements;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use Syntro\SilverstripeElementalBootstrap\Elements\BootstrapElement;
use Syntro\SilverstripeElementalBootstrap\Controllers\BootstrapElementController;

/**
 * Simple bootstrap carousel
 * @author Matthias Leutenegger
 */
class BootstrapCarousel extends BootstrapElement
{
    private static $icon = 'font-icon-block-carousel';

    private static $table_name = 'Syntro_Elemental_BootstrapCarousel';

    private static $title = 'Carousel';

    private static $singular_name = 'Carousel';

    private static $plural_name = 'Carousels';

    private static $description = 'A bootstrap carousel.';

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
    'Controls' => 'Boolean',
    'Indicators' => 'Boolean',
    'Captions' => 'Boolean'
    ];
    /**
     * Many_many relationship
     *
     * @var array
     */
    private static $many_many = [
    'Images' => Image::class,
    ];



    /**
     * getCMSFields - return fields for CMS
     *
     * @return FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(
            function (FieldList $fields) {
                $fields->addFieldToTab(
                    'Root.Main',
                    UploadField::create(
                        'Images',
                        'Images'
                    )
                    ->setIsMultiUpload(true),
                    'Title'
                );
                $fields->addFieldsToTab(
                    'Root.Look',
                    [
                    CheckboxField::create(
                        'Controls',
                        'Controls'
                    ),
                    CheckboxField::create(
                        'Indicators',
                        'Indicators'
                    ),
                    CheckboxField::create(
                        'Captions',
                        'Captions'
                    )
                    ]
                );
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
        return _t(__CLASS__ . '.BlockType', 'Carousel');
    }

    /**
     * Returns the position-argument -1 because bootstrap needs 0 as start
     *
     * @var    Int   $value
     * @return Int
     */

    /**
     * listHelper - Returns the position-argument -1 because bootstrap needs 0 as start
     *
     * @param  integer $value the list length
     * @return integer
     */
    public function listHelper($value)
    {
        return $value-1;
    }
}
