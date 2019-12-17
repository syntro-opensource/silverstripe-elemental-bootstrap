<?php

namespace Syntro\SilverstripeElementalBootstrap\Extensions;

use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldGroup;
use DNADesign\Elemental\Models\ElementalArea;
use Syntro\SilverstripeElementalBootstrap\Elements\BootstrapCol;
use Syntro\SilverstripeElementalBootstrap\Elements\BootstrapContent;

/**
 * Extends arbitrary elements with fields for classes necessary for bootstrap
 * to work
 * @author Matthias Leutenegger
 */
class BootstrapExtension extends Extension
{
    /**
     * Database fields
     *
     * @var array
     */
    private static $db = [
    'ColXS' => 'Int(12)',
    'ColSM' => 'Int(0)',
    'ColMD' => 'Int(0)',
    'ColLG' => 'Int(0)',
    'ColXL' => 'Int(0)',
    'InnerClasses' => 'Varchar',
    'OuterClasses' => 'Varchar',
    ];



    /**
     * updateCMSFields - update the fields
     *
     * @param  FieldList $fields the normal list
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        $owner = $this->owner;
        $fields->removeByName(
            [
            'ColXS',
            'ColSM',
            'ColMD',
            'ColLG',
            'ColXL',
            'ExtraClass',
            'InnerClasses',
            'OuterClasses'
            ]
        );

        if ($this->owner->isCol()) {
            $options = [
            0 => 'inherit',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => '10',
            11 => '11',
            12 => '12',
            ];
            $optionsXS = [
            0 => 'flex',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => '10',
            11 => '11',
            12 => '12',
            ];
            $fields->addFieldToTab(
                'Root.Settings',
                FieldGroup::create(
                    DropdownField::create(
                        'ColXS',
                        'XS',
                        $optionsXS
                    ),
                    DropdownField::create(
                        'ColSM',
                        'SM',
                        $options
                    ),
                    DropdownField::create(
                        'ColMD',
                        'MD',
                        $options
                    ),
                    DropdownField::create(
                        'ColLG',
                        'LG',
                        $options
                    ),
                    DropdownField::create(
                        'ColXL',
                        'XL',
                        $options
                    )
                )->addExtraClass('d-flex justify-content-between')
                    ->setTitle('Layout')
            );
            $fields->addFieldToTab(
                'Root.Settings',
                TextField::create(
                    'OuterClasses',
                    _t(__CLASS__ . '.OuterClassesLabel', 'Custom classes on outer container (col):')
                )
                    ->setDescription(_t(__CLASS__ . '.OuterClassesDescription', 'Classes applied to the outer thing'))
                    ->setAttribute('placeholder', 'm-*')
            );
        }
        if (!(is_a($this->owner, BootstrapCol::class) || is_a($this->owner, BootstrapContent::class)&&$this->getOwner()->isCol())) {
            $fields->addFieldToTab(
                'Root.Settings',
                TextField::create(
                    'InnerClasses',
                    _t(__CLASS__ . '.InnerClassesLabel', 'Custom classes on inner container:')
                )
                    ->setDescription(_t(__CLASS__ . '.InnerClassesDescription', 'Classes applied to the inner thing'))
                    ->setAttribute('placeholder', 'shadow')
            );
        }
        return $fields;
    }

    /**
     * returns true if the element is directly below a Row or in top position
     * Used to render col if needed
     *
     * TODO: Add Tests
     *
     * @return Boolean
     */
    public function isCol()
    {
        $parent = $this->owner->Parent;
        if (is_a($this->owner, BootstrapCol::class)) {
            return true;
        }
        return is_a($parent, ElementalArea::class);
    }


    /**
     * Handles Class generation for Layout from the individual sizes
     *
     * @return String  classes
     */
    public function LayoutClasses()
    {
        $owner = $this->owner;
        $classes = array('col');
        if ($owner->ColXS > 0) {
            array_push($classes, 'col-' . $owner->ColXS);
        }
        if ($owner->ColSM > 0) {
            array_push($classes, 'col-sm-' . $owner->ColSM);
        }
        if ($owner->ColMD > 0) {
            array_push($classes, 'col-md-' . $owner->ColMD);
        }
        if ($owner->ColLG > 0) {
            array_push($classes, 'col-lg-' . $owner->ColLG);
        }
        if ($owner->ColXL > 0) {
            array_push($classes, 'col-xl-' . $owner->ColXL);
        }
        return implode(' ', $classes);
    }

    /**
     * Breadcrumbs - Provides Breadcrumbs
     *
     * @return  string
     */
    public function Breadcrumbs()
    {
        return $this->getOwner()->Parent()->Breadcrumbs();
    }
}
