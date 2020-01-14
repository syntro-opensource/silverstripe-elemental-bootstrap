<?php

namespace Syntro\SilverstripeElementalBootstrap\Elements;

use SilverStripe\Forms\FieldList;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use DNADesign\Elemental\Models\BaseElement;
use Syntro\SilverstripeElementalBootstrap\Elements\BootstrapElement;
use Syntro\SilverstripeElementalBootstrap\Controllers\BootstrapElementController;

/**
 * A simple Card, containing images on top or bottom, a title and a body.
 * @author Matthias Leutenegger
 */
class BootstrapImage extends BootstrapElement
{
    private static $icon = 'font-icon-image';

    private static $table_name = 'Syntro_Elemental_BootstrapImage';

    private static $title = 'Image';

    private static $singular_name = 'Image';

    private static $plural_name = 'Images';

    private static $description = 'A bootstrap image.';

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
     * Has_one relationship
     *
     * @var array
     */
    private static $has_one = [
    'Image' => Image::class,
    ];
    /**
     * Relationship version ownership
     * @var array
     */
    private static $owns = [
        'Image'
    ];


    /**
     * getCMSFields - return the fields for cms
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
                        'Image',
                        'Image'
                    )
                    ->setIsMultiUpload(false),
                    'Title'
                );
                $fields->removeByName([
                    'Title'
                ]);
            }
        );
         return parent::getCMSFields();
    }


    /**
     * getTitle - generate the Title from the Image
     *
     * @return null|string
     */
    public function getTitle()
    {
        if ($this->Image) {
            return $this->Image->getTitle();
        }
        return null;
    }

    /**
     * getType - get the translated name
     *
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Image');
    }

    /**
     * Return file title and thumbnail for summary section of ElementEditor
     *
     * @return array
     */
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        if ($this->Image() && $this->Image()->exists() && $this->Image()->getIsImage()) {
            $blockSchema['fileURL'] = $this->Image()->CMSThumbnail()->getURL();
            $blockSchema['fileTitle'] = $this->Image()->getTitle();
        }
        return $blockSchema;
    }
}
