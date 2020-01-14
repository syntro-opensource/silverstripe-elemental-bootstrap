<?php

namespace Syntro\SilverstripeElementalBootstrap\Elements;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\FieldType\DBField;
use Syntro\SilverstripeElementalBootstrap\Elements\BootstrapElement;
use Syntro\SilverstripeElementalBootstrap\Controllers\BootstrapElementController;

/**
 * A simple content block.
 * @author Matthias Leutenegger
 */
class BootstrapContent extends BootstrapElement
{
    private static $icon = 'font-icon-block-content';

    private static $table_name = 'Syntro_Elemental_BootstrapContent';

    private static $title = 'Alert';

    private static $singular_name = 'Alert';

    private static $plural_name = 'Alerts';

    private static $description = 'A bootstrap alert.';

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
    'Content' => 'HTMLText'
    ];


    /**
     * getCMSFields - return the fieldlist rendered in the cms
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
        return _t(__CLASS__ . '.BlockType', 'Content');
    }

    /**
     * provideBlockSchema - provide the summary to the block
     *
     * @return array
     */
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
    }

    /**
     * Return a Summary string
     *
     * @return null|string
     */
    public function getSummary()
    {
        return DBField::create_field('HTMLText', $this->Content)->Summary(20);
    }
}
