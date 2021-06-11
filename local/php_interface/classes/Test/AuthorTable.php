<?php
namespace Test;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Relations\ManyToMany;

class AuthorTable extends DataManager
{
    public static function getTableName()
    {
        return 'authors';
    }

    public static function getMap()
    {
        return array(
            new IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new StringField('FIRST_NAME'),
            new StringField('LAST_NAME'),
            new StringField('SECOND_NAME'),
            new StringField('CITY'),
            (new ManyToMany('BOOKS', \Test\BookTable::class))
                ->configureTableName('author_book')
                ->configureLocalPrimary('ID', 'AUTHOR_ID')
                ->configureLocalReference('AUTHOR')
                ->configureRemotePrimary('ID', 'BOOK_ID')
        ->configureRemoteReference('BOOK')

        );
    }
}
