<?php

namespace Sprint\Migration;


class Author_book20210611103744 extends Version
{
    protected $description = "";

    protected $moduleVersion = "3.23.4";

    public function up()
    {
        $sql = "CREATE TABLE `author_book` (
  `ID` int(11) NOT NULL,
  `AUTHOR_ID` int(11) NOT NULL,
  `BOOK_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $helper = $this->getHelperManager();
        $helper->Sql()->query($sql);

        $data = "INSERT INTO `author_book` (`ID`, `AUTHOR_ID`, `BOOK_ID`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 3, 3),
(4, 2, 3),
(5, 2, 4),
(6, 1, 6),
(7, 3, 7);";
        $helper->Sql()->query($data);
    }

    public function down()
    {
        //your code ...
    }
}
