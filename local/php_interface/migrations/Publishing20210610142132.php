<?php

namespace Sprint\Migration;


class Publishing20210610142132 extends Version
{
    protected $description = "";

    protected $moduleVersion = "3.23.4";

    public function up()
    {
        $sql = "CREATE TABLE `publishing` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CITY` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AUTHOR_PROFIT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $helper = $this->getHelperManager();
        $helper->Sql()->query($sql);

        $data = "INSERT INTO `publishing` (`ID`, `TITLE`, `CITY`, `AUTHOR_PROFIT`) VALUES
(1, 'Издательство 1', 'Москва', 200),
(2, 'Издательство 2', 'Санкт-Петербург', 150);";
        $helper->Sql()->query($data);
    }

    public function down()
    {
        //your code ...
    }
}
