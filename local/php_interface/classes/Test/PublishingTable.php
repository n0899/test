<?php
namespace Test;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;

class PublishingTable extends DataManager
{
    public static function getTableName()
    {
        return 'publishing';
    }

    public static function getMap()
    {
        return array(
            new IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new StringField('TITLE'),
            new StringField('CITY'),
            new IntegerField('AUTHOR_PROFIT')
        );
    }
}