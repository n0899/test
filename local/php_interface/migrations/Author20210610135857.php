<?php

namespace Sprint\Migration;


class Author20210610135857 extends Version
{
    protected $description = "";

    protected $moduleVersion = "3.23.4";

    public function up()
    {
        $sql = "CREATE TABLE `authors` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LAST_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SECOND_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CITY` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $helper = $this->getHelperManager();
        $helper->Sql()->query($sql);

        $data = "INSERT INTO `authors` (`ID`, `FIRST_NAME`, `LAST_NAME`, `SECOND_NAME`, `CITY`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', 'Москва'),
(2, 'Петров', 'Петр', 'Петрович', 'Калининград'),
(3, 'Андреев', 'Андрей', 'Андреевич', 'Вожонеж'),
(4, 'Дмитриев', 'Дмитрий', 'Дмитриевич', 'Екатеринбург');";
        $helper->Sql()->query($data);
    }

    public function down()
    {
        //your code ...
    }
}
