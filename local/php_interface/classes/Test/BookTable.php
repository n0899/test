<?php
namespace Test;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\DateField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Relations\ManyToMany;
use Bitrix\Main\ORM\Query\Join;


class BookTable extends DataManager
{
    public static function getTableName()
    {
        return 'books';
    }

    public static function getMap()
    {
        return array(
            new IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new StringField('TITLE'),
            new DateField('YEAR'),
            new IntegerField('COPIES_CNT'),
            new IntegerField('PUB_ID'),
            new Reference(
                'PUBLISH',
                \Test\PublishingTable::class,
                Join::on('this.PUB_ID', 'ref.ID')
            ),
            (new ManyToMany('AUTHORS', \Test\AuthorTable::class))
                ->configureTableName('author_book')
                ->configureLocalPrimary('ID', 'BOOK_ID')
                ->configureLocalReference('BOOK')
                ->configureRemotePrimary('ID', 'AUTHOR_ID')
                ->configureRemoteReference('AUTHOR')
        );
    }
}
