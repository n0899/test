<?php

namespace Sprint\Migration;


class Book20210610141626 extends Version
{
    protected $description = "";

    protected $moduleVersion = "3.23.4";

    public function up()
    {
        $sql = "CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `YEAR` date NOT NULL,
  `COPIES_CNT` int(11) NOT NULL,
  `PUB_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $helper = $this->getHelperManager();
        $helper->Sql()->query($sql);

        $data = "INSERT INTO `books` (`ID`, `TITLE`, `YEAR`, `COPIES_CNT`, `PUB_ID`) VALUES
(1, 'Книга 1', '2021-06-10', 100, 1),
(2, 'Книга 2', '2021-06-01', 200, 2),
(3, 'Книга 3', '2021-06-10', 1000, 1),
(4, 'Книга 4', '2021-06-10', 50, 1),
(5, 'Книга 5', '2021-06-10', 300, 2),
(6, 'Книга 6', '2021-06-03', 150, 2),
(7, 'Книга 7', '2021-06-04', 100, 2);";
        $helper->Sql()->query($data);
    }

    public function down()
    {
        //your code ...
    }
}
