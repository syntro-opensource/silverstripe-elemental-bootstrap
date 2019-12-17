<?php

namespace Syntro\SilverstripeElementalBootstrap\Elements;

use SilverStripe\Forms\FieldList;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use Syntro\SilverstripeElementalBootstrap\Elements\BootstrapElement;
use Syntro\SilverstripeElementalBootstrap\Controllers\BootstrapElementController;

/**
 * A simple Card, containing images on top or bottom, a title and a body.
 * @author Matthias Leutenegger
 */
class BootstrapCard extends BootstrapElement
{
    private static $icon = 'font-icon-block-banner';

    private static $table_name = 'Syntro_Elemental_BootstrapCard';

    private static $title = 'Card';

    private static $singular_name = 'Card';

    private static $plural_name = 'Cards';

    private static $description = 'A simple Card with an image, title and body.';

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
    'Title' => 'Varchar',
    'Body' => 'HTMLText'
    ];
    /**
     * Has_one relationship
     *
     * @var array
     */
    private static $has_one = [
    'CardImageTop' => Image::class,
    'CardImageBottom' => Image::class,
    ];


    /**
     * getCMSFields - return fields for fieldlist
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
                        'CardImageTop',
                        'Card Image Top'
                    )
                    ->setIsMultiUpload(false),
                    'Title'
                );
                $fields->addFieldToTab(
                    'Root.Main',
                    UploadField::create(
                        'CardImageBottom',
                        'Card Image Bottom'
                    )
                    ->setIsMultiUpload(false)
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
        return _t(__CLASS__ . '.BlockType', 'Card');
    }
}
